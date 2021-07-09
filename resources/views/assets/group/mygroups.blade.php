@extends('layouts.app')

@section('content')
<div class="card _card">
    @if (count($myGroups) === 0)
    <div class="card-body text-muted">
        <p class="text-center">You Have no Active Group of Yours .</p>
    </div>
    @else
    <div class="d-flex flex-wrap mx-2 my-2">
        @foreach ($myGroups as $myGroup)
        <div class="card shadow mx-1 my-1 p-2">
            <div class="media mx-2 my-2 _media">
                <div class="media-body">
                    <div class="main">
                        <h5 class="font-weight-bold">{{$myGroup->name}}</h5>
                        <span class="text-monospace" style="min-height: 150px">{{$myGroup->description}}</span>
                        <div class="text-muted">
                            <strong>Group Capacity </strong> : <span style="color:green; font-size:17px">
                                {{$myGroup->max_member}} </span>
                        </div>
                        <div class="text-muted">
                            <strong> Code : <span style="color:rgb(7, 73, 7); font-size:17px"> {{$myGroup->code}}
                                </span>
                            </strong>
                            <br>
                            <strong> Created </strong>: {{$myGroup->created_at->diffForHumans()}}
                        </div>
                    </div>
                    <a href="{{route('groupTask', $myGroup->id)}}" class="btn btn-dark mt-1 float-right _btn">Assign
                        Task</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection

@section('css')
<style>
    ._media {
        max-width: 282px;
        min-width: 282px;
        height: 100%;
    }

    ._card {
        min-height: 80vh;
        background-color: transparent;
        border-bottom: none;
        border-right: none;
        border-left: 1 px solid;
    }

    /* ._btn {
        position: absolute;
        bottom: 0;
        right: 0px;
    } */

    .main {
        min-height: 200px;
        max-height: 200px;
        overflow: auto;
    }
</style>
@endsection