@extends('layouts.group')

@section('content')

@if (count($archived) === 0)
<div class="card">
    <div class="card-body">
        <div class="text-muted">
            <p class="text-center">No Task is yet archived</p>
        </div>
    </div>
</div>
@else
<table class="table">
    <thead>
        <tr class="text-center">
            <th scope="col">Task</th>
            <th scope="col">Created By</th>
            <th scope="col">Assigned To</th>
            <th scope="col">Attachment</th>
            <th scope="col">Created</th>
            <th scope="col">Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($archived as $arc)
        <tr class="text-center">
            <td>{{$arc->task}}</td>
            <td>{{$arc->user->name}}</td>
            <td>{{$arc->sub_id}}</td>
            <td>###</td>
            <td>{{$arc->created_at->diffForHumans()}}</td>
            <td>
                <form action="{{route('task.destroy', $arc->id)}}" style="display: inline" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                </form>
                <a href="{{route('undoArchived', [$group->id, $arc->id] )}}" class="btn btn-sm btn-warning">Bring
                    Back</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection

@section('css')
<style>

</style>
@endsection
