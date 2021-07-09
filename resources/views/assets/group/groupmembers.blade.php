@extends('layouts.group')

@section('content')
<div class="card">
    @if (count($members) === 0)
    <div class="card-body">
        <p class="text-muted text-center">
            No Members Are Assigned
        </p>
    </div>
    @else
    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Member Name</th>
                <th scope="col">Merit</th>
                <th scope="col">Assisments</th>
                <th scope="col" style="width: 13%">Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $row => $member)
            <tr class="text-center">
                <th>{{$row + 1}}</th>
                <td><a href="{{route('profile', $member->sender_id)}}" target="_blank">{{$member->user->name}}</a></td>
                <td>100</td>
                <td>
                    <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse"
                        data-target="#details{{$member->id}}" aria-expanded="false" aria-controls="details">
                        Details
                    </button>
                </td>
                <td>
                    @if($member->group->admin_id == Auth::id())
                    <a href="/removeMember/{{$member->id}}" class="btn btn-danger btn-sm">Remove</a>
                    @elseif($member->sender_id == Auth::id())
                    <div class="text-muted">It's You !!</div>
                    @else
                    <div class="text-muted">Only Admin can </div>
                    @endif
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>

</div>
@endif
@endsection

@section('css')
<style>

</style>
@endsection

@section('js')
<script>
    if("<?php echo Session::has("removed") ?>"){
        toastr.success("<?php echo Session::get("removed") ?>", 'Removed Succefully');
    }
</script>
@endsection
