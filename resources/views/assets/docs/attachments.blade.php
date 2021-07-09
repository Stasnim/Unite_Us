@extends('layouts.group')

@section('content')
<div class="card">
    <form action="{{route('attachment', $group->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <div class="form-group text-center">
                <label for="file">Upload a <strong>Document / File</strong> </label>
                <input type="file" name="file" id="file" required>
                <button class="btn btn-success" type="submit">Upload</button>
            </div>
        </div>
    </form>
    @if (count($attachments) !== 0)
    <div class="card-body">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Uploaded By</th>
                    <th scope="col">Docs</th>
                    <th scope="col">@</th>
                    <th scope="col">View</th>
                    <th scope="col">Download</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attachments as $key => $attachment)
                <tr class="text-center">
                    <td>{{$key + 1}}</td>
                    <td>{{$attachment->user->name}}</td>
                    <td>{{$attachment->name}}</td>
                    <td>{{$attachment->created_at->diffForHumans()}}</td>
                    <td>
                        <a href="http://127.0.0.1:8887/{{$attachment->attachment}}" target="_blank">View</a>
                    </td>
                    <td>
                        {{-- <a href="" class="btn btn-sm btn-success">Approve</a> --}}
                        <a href="/test/{{$attachment->id}}">Download</a>
                    </td>
                    <td>
                        <form action="{{route('attachmentDelete', $attachment->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
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
@section('js')
<script>
    if("<?php echo Session::has("uploaded") ?>"){
        toastr.success("<?php echo Session::get("uploaded") ?>", 'File Uploaded');
    }
</script>
<script>
    if("<?php echo Session::has("attachmentDeleted") ?>"){
        toastr.error("<?php echo Session::get("attachmentDeleted") ?>", 'File Has been Deleted');
    }
</script>
@endsection
