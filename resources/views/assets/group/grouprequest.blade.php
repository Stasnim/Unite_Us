@extends('layouts.group')

@section('content')
<div class="card">
    @if (count($requests) === 0)
    <div class="card-body">
        <div class="text-muted">
            <p class="text-center">
                No Request yet ...
            </p>
        </div>
    </div>
    @else
    <div class="card-body">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Request User Name</th>
                    <th scope="col">Requested</th>
                    <th scope="col">Approved</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $key => $request)
                <tr class="text-center">
                    <td>{{$key + 1}}</td>
                    <td><a href="{{route('profile', $request->sender_id)}}" target="_blank">{{$request->user->name}}</a>
                    </td>
                    <td>{{$request->created_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('acceptRequest', [$group->id,$request->id])}}"
                            class="btn btn-sm btn-success">Approve</a>
                    </td>
                    <td>
                        <form action="{{route('deleteRequest',[$group->id,$request->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
@section('css')
<style>

</style>
@endsection

@section('js')
<script>
    if("<?php echo Session::has("reqDeleted") ?>"){
        toastr.error("<?php echo Session::get("reqDeleted") ?>", 'Rejected')
    }
</script>
<script>
    if("<?php echo Session::has("reqAccepted") ?>"){
        toastr.success("<?php echo Session::get("reqAccepted") ?>", 'Accepted')
    }
</script>
@endsection
