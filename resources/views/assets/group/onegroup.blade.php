@extends('layouts.group')

@section('content')
<div class="card _main">
    <div class="row mx-1 my-1">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Create a Task
                </div>
                <div class="card-body">
                    <form action="{{route('task.store')}}" method="POST">
                        @csrf
                        <input type="number" name="group_id" value="{{$group->id}}" hidden>
                        <input type="text" class="_inp form-control" id="task" name="task" placeholder="Assign a task"
                            required>
                        <button type="submit" class="btn btn-success float-right btn-sm my-1 ml-1">Sumbit</button>
                    </form>

                    <ul class="list-group mt-2">
                        @foreach ($activeTasks as $key => $activeTask)
                        <li class="list-group-item">
                            {{$key + 1}}. {{$activeTask->task}}
                            <br>
                            @if ($group->admin_id == Auth::id() || $activeTask->creator_id == Auth::id())
                            <form action="{{route('task.destroy', $activeTask->id)}}" style="display: inline"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger float-right" type="submit">Delete</button>
                            </form>
                            @endif
                            <button type="button" class="btn btn-dark btn-sm float-right mr-1" data-toggle="modal"
                                data-target="#popup{{$activeTask->id}}">
                                Assign
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="popup{{$activeTask->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="popupCenter" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title pop_title" id="taskTitle">
                                                {{$activeTask->task}}
                                                <br>
                                                <small class="text-muted">Created By {{$activeTask->user->name}}</small>
                                                <br>
                                                <small class="text-muted">Assigned to
                                                    {{$activeTask->taskdetail ? $activeTask->taskdetail->user->name
                                                    : '``open for all``'}}</small>
                                            </h5>

                                            <small class="text-muted">Created #
                                                {{$activeTask->created_at->diffForHumans()}}</small>
                                        </div>
                                        @if ($group->admin_id == Auth::id() && ($activeTask->taskdetail) == null)
                                        <div class="modal-body">
                                            <small class="text-muted">
                                                Assign Task To
                                            </small>
                                            <form action="{{route('assignTask', $activeTask->id)}}" method="POST"
                                                style="display: inline">
                                                @csrf
                                                <select class="custom-select w-50 ml-3" id="assigned_to"
                                                    name="assigned_to">
                                                    <option selected value="{{null}}">Choose...</option>
                                                    @if (count($members) > 0)
                                                    @foreach ($members as $member)
                                                    <option value="{{$member->user->id}}">{{$member->user->name}}
                                                    </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                @if (count($members) > 0)
                                                <button type="submit" class="btn btn-sm btn-dark ml-2">Assign</button>
                                                @endif
                                            </form>
                                        </div>
                                        @endif
                                        {{-- new added --}}
                                        <form action="{{route('attachment', $group->id)}}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="number" name="task_id" value="{{$activeTask->id}}" hidden>
                                            <div class="card-header">
                                                <div class="form-group text-center">
                                                    <label for="file">Upload</label>
                                                    <input type="file" name="file" id="file" required>
                                                    <button class="btn btn-success" type="submit">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                        {{-- end --}}
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            @if ($group->admin_id == Auth::id())
                                            <a href="{{route('task.edit',$activeTask->id)}}"
                                                class="btn btn-warning">Archive</a>
                                            @endif
                                            <a href="{{route('movetask',[$activeTask->id, 'progress'])}}"
                                                class="btn btn-success">Progress</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Progress {{-- $progressTasks --}}
                </div>
                @if (count($progressTasks) === 0)

                @else
                <div class="card-body">
                    <ul class="list-group mt-2">
                        @foreach ($progressTasks as $progressTask)
                        <li class="list-group-item">
                            {{$progressTask->task}}
                            <br>
                            <small class="text-muted">Created By {{$progressTask->user->name}}</small>
                            ||
                            <small class="text-muted">Assigned
                                {{$progressTask->taskdetail ? $progressTask->taskdetail->user->name : 'For all'}}</small>
                            <br>
                            @if ($group->admin_id == Auth::id() || $progressTask->creator_id == Auth::id())
                            <form action="{{route('task.destroy', $progressTask->id)}}" style="display: inline"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger float-right" type="submit">Delete</button>
                            </form>
                            @endif
                            <button type="button" class="btn btn-dark btn-sm float-right mr-1" data-toggle="modal"
                                data-target="#popup">
                                Assign
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="popupCenter"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title pop_title" id="taskTitle">{{$progressTask->task}}
                                            </h5>
                                            <small class="text-muted">Created #
                                                {{$progressTask->created_at->diffForHumans()}}</small>
                                        </div>
                                        @if ($group->admin_id == Auth::id() && ($progressTask->taskdetail) == null)
                                        <div class="modal-body">
                                            <small class="text-muted">
                                                Assign Task To
                                            </small>
                                            <form action="{{route('assignTask', $progressTask->id)}}" method="POST"
                                                style="display: inline">
                                                @csrf
                                                <select class="custom-select w-50 ml-3" id="assigned_to"
                                                    name="assigned_to">
                                                    <option selected value="{{null}}">Choose...</option>
                                                    @if (count($members) > 0)
                                                    @foreach ($members as $member)
                                                    <option value="{{$member->user->id}}">{{$member->user->name}}
                                                    </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                @if (count($members) > 0)
                                                <button type="submit" class="btn btn-sm btn-dark ml-2">Assign</button>
                                                @endif
                                            </form>
                                        </div>
                                        @endif
                                        <form action="{{route('attachment', $group->id)}}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-header">
                                                <div class="form-group text-center">
                                                    <label for="file">Upload</label>
                                                    <input type="file" name="file" id="file" required>
                                                    <button class="btn btn-success" type="submit">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <a href="{{route('task.edit',$progressTask->id)}}"
                                                class="btn btn-warning">Archive</a>
                                            <a href="{{route('movetask',[$progressTask->id, 'completed'])}}"
                                                class="btn btn-success">Completed</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Completed {{-- $completedTasks --}}
                </div>
                @if (count($completedTasks) === 0)

                @else
                <div class="card-body">
                    <ul class="list-group mt-2">
                        @foreach ($completedTasks as $completedTask)
                        <li class="list-group-item">
                            {{$completedTask->task}}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
    ._main {
        background: transparent;
        border: none;
    }

    ._inp {
        width: 78%;
        display: inline;
    }

    .pop_title {
        text-transform: uppercase;
    }
</style>
@endsection

@section('js')
<script>
    if("<?php echo Session::has("taskAssigened") ?>"){
        toastr.success("<?php echo Session::get("taskAssigened") ?>", 'Task');
    }
</script>
@endsection
