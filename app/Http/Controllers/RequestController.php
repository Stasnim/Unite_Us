<?php

namespace App\Http\Controllers;

use App\Group;
use App\Task;
use App\Request;
use App\TaskDetail;
use App\User;
use Illuminate\Http\Request as FormRequest;
use Illuminate\Support\Facades\Auth;
use Session;

class RequestController extends Controller
{
    public function moveTask(\App\Task $task, $type)
    {
        $task->update(['type' => $type]);
        \App\Log::create([
            'group_id' => $task->group_id,
            'user_id' => \auth::id(),
            'task' => $task->task,
            'action' => 'moved to ' . $type,
        ]);
        Session::flash('taskMovedToProgress', 'Now Task is in Progress');
        return \redirect()->back();
    }

    public function archived(Group $group)
    {
        $archived = $group->tasks()->with('user')->where('archived', 1)->get();
        $requests = $group->requests()->with('user')->get();

        return view('assets.tasks.archived', [
            'group' => $group,
            'archived' => $archived,
            'requests' => $requests
        ]);
    }

    public function undoArchived(Group $group, Task $task)
    {
        $task->update(['archived' => false]);

        \App\Log::create([
            'group_id' => $group->id,
            'user_id' => \auth::id(),
            'task' => $task->task,
            'action' => 'Undo Archived',
        ]);

        return $this->archived($group);
    }

    public function groupLogs(Group $group)
    {
        $logs = $group->logs()->with('user', 'group')->get();
        $requests = $group->requests()->with('user')->get();

        return view('assets.group.logs', [
            'group' => $group,
            'logs' => $logs,
            'requests' => $requests
        ]);
    }

    public function exploreGroup()
    {
        $groups = Group::all()->where('admin_id', '!==', Auth::id());

        $requested = Request::all()->where('sender_id', Auth::id())->toArray();

        $approved = Request::where('sender_id', Auth::id())->where('approval', true)->get()->toArray();

        // dd($requested);

        $inRequest = [];
        $wasApproved = [];

        foreach ($approved as $approve) {
            array_push($wasApproved, $approve['group_id']);
        }

        foreach ($requested as $request) {
            array_push($inRequest, $request['group_id']);
        }

        return view('assets.group.othergroups', [
            'groups' => $groups,
            'inRequest' => $inRequest,
            'wasApproved' => $wasApproved
        ]);
    }

    public function searchedGroup(FormRequest $search)
    {

        $reqGroupName = $search->search;

        $groups = Group::where('name', 'like', '%' . $reqGroupName . '%')->orWhere('code', 'like', '%' . $reqGroupName . '%')->get();

        $requested = Request::all()->where('sender_id', Auth::id())->toArray();

        $approved = Request::where('sender_id', Auth::id())->where('approval', true)->get()->toArray();

        $inRequest = [];
        $wasApproved = [];

        foreach ($approved as $approve) {
            array_push($wasApproved, $approve['group_id']);
        }

        foreach ($requested as $request) {
            array_push($inRequest, $request['group_id']);
        }

        return view('assets.group.othergroups', [
            'groups' => $groups,
            'inRequest' => $inRequest,
            'wasApproved' => $wasApproved
        ]);
    }

    public function requestToJoin($group_id)
    {
        Request::create([
            'group_id' => $group_id,
            'sender_id' => Auth::id()
        ]);

        Session::flash('requested', 'Request has been sent');
        return \redirect('exploreGroup');
    }

    /**
     * User Those who requested to join a group for a particular group
     */
    public function requestUser(Group $group)
    {
        $requests = $group->requests()->with('user')->where('approval', '!=', 1)->get();

        return view('assets.group.grouprequest', [
            'group' => $group,
            'requests' => $requests
        ]);
    }

    public function deleteRequest(Group $group, Request $request)
    {
        $request->delete();
        Session::flash('reqDeleted', 'User Join request Has been Removed');
        return \redirect('group/' . $group->id);
    }

    public function acceptRequest(Group $group, Request $request)
    {
        $group->update(['active_members' => $group->active_members + 1]);
        $request->update(['approval' => true]);
        Session::flash('reqAccepted', 'User Join request Has been Removed');
        return \redirect('group/' . $group->id);
    }

    /**
     * Members of a group
     */
    public function members(Group $group)
    {
        $members = $group->requests()->with('user')->where('approval', true)->get();
        $requests = $group->requests()->with('user')->where('approval', '!=', 1)->get();

        return view('assets.group.groupmembers', [
            'group' => $group,
            'members' => $members,
            'requests' => $requests
        ]);
    }

    public function requestGroup()
    {
        $requestedGroups = Request::where('sender_id', Auth::id())->with('group', 'user')->get();
        return view('assets.group.requestedgroup', [
            'requestedGroups' => $requestedGroups
        ]);
    }

    public function cancelGroupRequest(Request $request)
    {
        $request->delete();
        Session::flash('cancelled', 'The Join request has been cancelled');
        return \redirect('requestGroup');
    }

    public function collaborationGroups()
    {
        $collaborationGroups = Request::where('sender_id', Auth::id())->where('approval', 1)->with('group', 'user')->get();

        return view('assets.group.collaborationgroups', [
            'collaborationGroups' => $collaborationGroups
        ]);
    }

    public function assignTask(Task $task, FormRequest $data)
    {
        if ($data->assigned_to !== null) {
            TaskDetail::create([
                'task_id' => $task->id,
                'assined_id' => $data->assigned_to
            ]);

            Session::flash('taskAssigened', 'Task has been Assigend');
        }

        return \redirect()->back();
    }

    public function profile(User $user)
    {
        // dd(substr($user->name, 0, 1));
        return view('assets.profile.profile', [
            'user' => $user
        ]);
    }

    public function removeMember(Request $member)
    {
        $member->group->update(['active_members' => $member->group->active_members - 1]);
        $member->delete();
        Session::flash('removed', 'The member has been Removed');
        return \redirect()->back();
    }
}
