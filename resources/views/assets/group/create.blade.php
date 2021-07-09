@extends('layouts.app')

@section('content')
<div class="row h-100 justify-content-center align-items-center">
    <div class="card" style="max-width: 680px;">
        <div class="card-body">
            <form method="POST" action="{{route('group.store')}}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label for="name">Group Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Group Name"
                            value="{{old('name')}}">
                        @if ($errors->has('name'))
                        <div class="text-muted">
                            <small style="color: red"> Name is Required</small>
                        </div>
                        @endif
                    </div>
                    <div class="form-group col-md-5">
                        <label for="group Code">Group Code</label> <small class="text-muted">( It has to be unique
                            )</small>
                        <input type="text" class="form-control" id="code" name="code" placeholder="Group Code"
                            value="{{old('code')}}">
                        @if ($errors->has('code'))
                        <div class="text-muted">
                            <small style="color: red">Required & has to be Unique</small>
                        </div>
                        @endif
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="max-member">Max Member</label> <small class="text-muted">( By default its 5
                            )</small>
                        <input type="number" min="0" max="999" class="form-control" id="maxMember" name="maxMember"
                            placeholder="Max Capacity Default is 5">
                    </div>
                    <div class="form-group col-md-5 float-right">
                        <label for="tag">Tags</label>
                        <small class="text-muted">( For Sugegstion Optimization )</small>
                        <select class="form-control" id="tag" name="tag">
                            <option value="default">Default</option>
                            <option value="cse">CSE</option>
                            <option value="eee">EEE</option>
                            <option value="architecture">Architecture</option>
                            <option value="design">Design</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="text-muted">
                            By default the value is set for good search and recomandation Optimization
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5" style="resize: none"
                        placeholder="Description Of the Group">{{old('description')}}</textarea>
                    @if ($errors->has('description'))
                    <div class="text-muted">
                        <small style="color: red">Required</small>
                    </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-dark">Create </button>
            </form>
        </div>
    </div>
</div>
@endsection
