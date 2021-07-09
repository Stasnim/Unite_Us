@extends('layouts.group')

@section('content')

{{-- <div class="text-center mb-2">
    Logs of the group {{$group->name}}
</div> --}}

<div class="list-group">
    @foreach ($logs as $key => $log)
    @if ($log->action === 'Group Creation')
    <button type="button" class="list-group-item list-group-item-action">
        {{$key + 1}}. The Group Was Created
        by <strong> # {{$log->user->name}} </strong>
        <span class="float-right">{{$log->created_at->diffForHumans()}}</span>
    </button>
    @else
    <button type="button" class="list-group-item list-group-item-action">
        {{$key + 1}}. {{$log->task}} is
        @if ($log->action === 'Created By')
        <strong style="color:green"> {{$log->action}} </strong>
        @elseif($log->action === 'Deleted')
        <strong style="color:red"> {{$log->action}} </strong>
        @elseif($log->action ==='moved to progress')
        <strong style="color:rgb(17, 53, 17)"> {{$log->action}} </strong>
        @elseif($log->action ==='moved to completed')
        <strong style="color:rgb(17, 53, 17)"> ***Completed*** </strong>
        @endif
        by <strong> # {{$log->user->name}} </strong>
        <span class="float-right">{{$log->created_at->diffForHumans()}}</span>
    </button>
    @endif
    @endforeach
</div>
@endsection

@section('css')
<style>

</style>
@endsection
