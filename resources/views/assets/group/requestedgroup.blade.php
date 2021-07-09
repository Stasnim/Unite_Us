@extends('layouts.app')

@section('content')

@if (count($requestedGroups) === 0)
<div class="card">
    <div class="card-body">
        <div class="text-muted">
            <p class="text-center">
                You haven't ask to join any group
            </p>
        </div>
    </div>
</div>
@else
<div class="card">
    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Group Name</th>
                <th scope="col">Group Admin</th>
                <th scope="col">Details</th>
                <th scope="col">Remove Request</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requestedGroups as $row => $requestedGroup)
            <tr class="text-center">
                <th scope="row">{{$row + 1}}</th>
                <td>{{$requestedGroup->group->name}}</td>
                <td>{{$requestedGroup->group->user->name}}</td>
                <td style="max-width: 230px">{{$requestedGroup->group->description}}</td>
                <td>
                    <a href="/cancelGroupRequest/{{$requestedGroup->id}}" class="btn btn-sm btn-danger">Cancel The
                        request</button>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    @endif
</div>
@endsection

@section('js')
<script>
    if("<?php echo Session::has("cancelled") ?>"){
        toastr.error("<?php echo Session::get("cancelled") ?>", 'Request cancelled');
    }

</script>
@endsection
