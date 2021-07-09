<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AttachmentController extends Controller
{
    public function groupTask(Group $group)
    {
        $activeTasks = $group->tasks()->where('type', 'active')->where('archived', 0)->get();
        $progressTasks = $group->tasks()->where('type', 'progress')->where('archived', 0)->get();
        $completedTasks = $group->tasks()->where('type', 'completed')->where('archived', 0)->get();

        return view('assets.group.onegroup', [
            'group' => $group,
            'activeTasks' => $activeTasks,
            'progressTasks' => $progressTasks,
            'completedTasks' => $completedTasks
        ]);
    }

    public function index(Group $group)
    {
        $attachments = $group->attachments()->with('user', 'task')->get();
        $requests = $group->requests()->with('user')->get();

        return view('assets.docs.attachments', [
            'group' => $group,
            'attachments' => $attachments,
            'requests' => $requests
        ]);
    }

    public function upload(Group $group, Request $request)
    {
        $attachment = $request->file;
        $attachmentName = time() . $attachment->getClientOriginalName();
        $attachment->move('upload\files', $attachmentName);

        Attachment::create([
            'group_id' => $group->id,
            'user_id' => Auth::id(),
            'attachment' => 'upload\\files\\' . $attachmentName,
            'name' => $request->file->getClientOriginalName(),
            'task_id' => $request->task_id
        ]);

        \App\Log::create([
            'group_id' => $group->id,
            'user_id' => \auth::id(),
            'task' => $request->file->getClientOriginalName(),
            'action' => 'Created By',
        ]);

        Session::flash('uploaded', 'The File has been uploaded succefully');
        return \redirect('attachments/' . $group->id);
    }

    public function delete(Attachment $attachment)
    {
        \App\Log::create([
            'group_id' => $attachment->group_id,
            'user_id' => \auth::id(),
            'task' => $attachment->name,
            'action' => 'Deleted',
        ]);

        $attachment->delete();
        unlink($attachment->attachment);
        Session::flash('attachmentDeleted', 'The File has been Deleted succefully');
        return \redirect()->back();
    }
}
