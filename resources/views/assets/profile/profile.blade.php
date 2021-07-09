@extends('layouts.app')

@section('content')

<body>
    <div class="emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        {{-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog"
                            alt="" /> --}}
                        <img src="https://via.placeholder.com/275x183.png?text={{substr($user->name, 0, 1)}}" alt="" />
                        @if (Auth::id() === $user->id)
                        <div class=" file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file" />
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            {{$user->name}}
                        </h5>
                        <h6>
                            Student
                        </h6>
                        <span class="poins"> Points: <span>{{$user->profile->points}}</span> </span>
                        <p class="proile-rating">RANKINGS :
                            <span>{{$user->profile->rank ? $user->profile->rank : 'Newbie'}}</span></p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Timeline</a>
                            </li>
                            @if (Auth::id() === $user->id)
                            <li class="nav-item">
                                <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab"
                                    aria-controls="edit" aria-selected="false">Edit Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="setting-tab" data-toggle="tab" href="#setting" role="tab"
                                    aria-controls="edit" aria-selected="false">Settings</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-md-2">
                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" />
                </div> --}}
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>WORK LINK</p>
                        <a href="">{{$user->profile->department}}</a><br />
                        <a href="">{{$user->profile->interest}}</a><br />
                        <a href="">Available and Active</a>
                        <p>SKILLS</p>
                        <a href="">{{$user->profile->interest}}</a><br />
                        {{-- <a href="">Web Designer</a><br />
                        <a href="">Web Developer</a><br />
                        <a href="">WordPress</a><br />
                        <a href="">WooCommerce</a><br />
                        <a href="">PHP, .Net</a><br /> --}}
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        {{-- HomeTab --}}
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            @if (Auth::id() === $user->id)
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$user->id}}</p>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$user->name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$user->email}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$user->profile->phone}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>University</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$user->profile->university}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Depertment</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$user->profile->department}}</p>
                                </div>
                            </div>
                        </div>
                        {{-- END HomeTab END --}}
                        {{-- ProfileTab --}}
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Admin of Group</label>
                                </div>
                                <div class="col-md-6">
                                    @if (count($user->groups) === 0)
                                    <p>None Yet</p>
                                    @endif
                                    @foreach ($user->groups as $group)
                                    <p>- {{$group->name}}</p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Collaborating</label>
                                </div>
                                <div class="col-md-6">
                                    @if (count($user->requests) == 0)
                                    <p>None</p>
                                    @endif
                                    @foreach ($user->requests as $group)
                                    <p>- {{$group->group->name}}</p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Total Groups</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{count($user->groups) + count($user->requests)}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Past Projects</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Projects</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Availability</label>
                                </div>
                                <div class="col-md-6">
                                    <p>6 months</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Your Bio</label><br />
                                    <p>{{$user->profile->bio}}</p>
                                </div>
                            </div>
                        </div>
                        {{--END ProfileTab END--}}
                        {{-- Edit Profile --}}
                        @if (Auth::id() === $user->id)
                        <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$user->name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$user->email}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$user->profile->phone}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>University</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$user->profile->university}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Depertment</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$user->profile->department}}</p>
                                </div>
                            </div>
                        </div>
                        {{-- END Edit Prfile END--}}
                        {{-- Settings --}}
                        <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$user->name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$user->email}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>University</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$user->profile->university}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Depertment</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$user->profile->department}}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        {{-- END Settings END--}}
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endsection