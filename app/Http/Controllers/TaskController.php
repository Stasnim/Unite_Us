<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class TaskController extends Controller
{

    public function index()
    { }

    public function create()
    { }

    public function store(Request $request)
    {
        $task = Task::create([
            'group_id' => $request->group_id,
            'task' => $request->task,
            'creator_id' => Auth::id(),
        ]);

        \App\Log::create([
            'group_id' => $request->group_id,
            'user_id' => \auth::id(),
            'task' => $request->task,
            'action' => 'Created By',
        ]);

        Session::flash('taskAdded', 'New Task has been added');
        return \redirect()->back();
    }

    public function show(Task $task)
    {
        //
    }


    public function edit(Task $task)
    {

        $task->update(['archived' => true]);

        \App\Log::create([
            'group_id' => $task->group_id,
            'user_id' => \auth::id(),
            'task' => $task->task,
            'action' => 'Archived',
        ]);

        Session::flash('taskArchived', 'Task Has been Succefully Archived');
        return \redirect()->back();
    }

    public function update(Request $request, Task $task)
    {
        //
    }


    public function destroy(Task $task)
    {
        \App\Log::create([
            'group_id' => $task->group_id,
            'user_id' => \auth::id(),
            'task' => $task->task,
            'action' => 'Deleted',
        ]);
        $task->delete();
        Session::flash('taskDeleted', 'Task Has been Succefully Deleted');
        return \redirect()->back();
    }
}
