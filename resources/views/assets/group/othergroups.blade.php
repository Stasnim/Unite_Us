@extends('layouts.app')

@section('content')
<div class="card">
    @if (count($groups) === 0)
    <div class="card-body text-muted">
        {{-- <p class="text-center">There is no Group Available here. Create One so that other can join</p> --}}

        <p class="text-center">
            Not Found any Gropus Search Again with name or code of the group
        </p>
        <div class="text-center">
            <a href="{{route('exploreGroup')}}" class="btn btn-dark">Search</a>
        </div>
    </div>
    @else
    <form class="form-inline d-flex justify-content-center md-form form-sm mt-2" method="POST"
        action="{{route('searchedGroup')}}">
        @csrf
        {{-- <i class="fas fa-search" aria-hidden="true"></i> --}}
        <input class="form-control form-control-sm mr-3 w-50 p-3 _search" type="text" name="search"
            placeholder="Search For Groups" style="height: 40px" aria-label="Search">

        <i class="fas fa-search" aria-hidden="true"></i>

    </form>
    <div class="d-flex flex-wrap mx-2 my-2">
        @foreach ($groups as $group)
        @if (in_array($group->id, $wasApproved))
        @elseif($group->admin_id != Auth::id())
        <div class="card shadow mt-3 mx-2 p-1 my-1 my-2">
            <div class="media mx-2 my-2 _media">
                <div class="media-body">
                    <div class="main">
                        <h5 class="mt-0">{{$group->name}} || {{$group->id}} </h5>
                        {{$group->description}}
                        <div class="text-muted">
                            Group Status : <span style="color: green">Abailable</span>
                        </div>
                        <div class="text-muted">
                            Code : {{$group->code ? $group->code : 'Open'}}
                        </div>
                        <div class="">
                            Admin: <a href="{{route('profile', $group->user->id)}}" target="_blank">
                                {{$group->user->name}}</a>
                        </div>
                    </div>
                    @if (in_array($group->id, $inRequest))
                    <button href="#" class="btn btn-secondary float-right" disabled>Requested </a>
                        @else
                        <a href="/request/{{$group->id}}" class="btn btn-dark float-right">Request to Join</a>
                        @endif
                </div>
            </div>
        </div>
        @endif
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

    .main {
        min-height: 180px;
        max-height: 180px;
        overflow: auto;
    }
</style>
@endsection

@section('js')
<script>
    if("<?php echo Session::has("requested") ?>"){
        toastr.success("<?php echo Session::get("requested") ?>", 'Request Send');
    }

</script>
@endsection