<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class GroupController extends Controller
{

    public function index()
    {
        $id = Auth::id();
        $myGroups = \App\Group::with('user')->where('admin_id', $id)->get();
        return view('assets.group.mygroups', \compact('myGroups'));
    }

    public function create()
    {
        return view('assets.group.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'code' => 'required|unique:groups',
            'description' => 'required',
        ]);

        $group = \App\Group::create([
            'admin_id' => \auth::id(),
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'max_member' => $request->maxMember,
            'tags' => $request->tag
        ]);

        \App\Log::create([
            'group_id' => $group->id,
            'user_id' => \auth::id(),
            'action' => 'Group Creation',
        ]);

        Session::flash('groupCreated', 'New Group Has been Created');
        return $this->index();
    }

    public function show(Group $group)
    {
        //
    }

    public function edit(Group $group)
    { }

    public function update(Request $request, Group $group)
    {
        //
    }

    public function destroy(Group $group)
    {
        //
    }

    public function groupTask(Group $group)
    {
        $activeTasks = $group->tasks()->where('type', 'active')->where('archived', 0)->get();
        $progressTasks = $group->tasks()->where('type', 'progress')->where('archived', 0)->get();
        $completedTasks = $group->tasks()->where('type', 'completed')->where('archived', 0)->get();
        $requests = $group->requests()->with('user')->where('approval', false)->get();
        $members = $group->requests()->with('user')->where('approval', true)->get();

        return view('assets.group.onegroup', [
            'group' => $group,
            'activeTasks' => $activeTasks,
            'progressTasks' => $progressTasks,
            'completedTasks' => $completedTasks,
            'requests' => $requests,
            'members' => $members
        ]);
    }
}
