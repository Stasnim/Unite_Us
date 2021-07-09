<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>UNITE</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @yield('css')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    UNITE
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('group.create')}}">Create Group</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('group.index')}}">My Groups</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row mx-1 my-3">
            <div class="col-2">
                <div class="list-group">
                    <a href="{{route('groupTask', $group->id)}}" class="list-group-item list-group-item-action active">
                        <img src="{{asset('icons/layout.png')}}" alt=""> DashBoard
                    </a>
                    <a href="{{route('archived', $group->id)}}"
                        class="list-group-item list-group-item-action list-group-item-warning">
                        <img src="{{asset('icons/archived.png')}}" alt=""> Archived
                    </a>
                    <a href="{{route('attachments', $group->id)}}"
                        class="list-group-item list-group-item-action list-group-item-secondary">
                        <img src="{{asset('icons/file.png')}}" alt=""> Files & Docs
                    </a>
                    <a href="{{route('members', $group->id)}}"
                        class="list-group-item list-group-item-action list-group-item-light">
                        <img src="{{asset('icons/groupMember.png')}}" alt=""> Members
                        <span class="badge badge-primary badge-pill mx-2">
                            {{$group->active_members - 1}}
                        </span>
                    </a>
                    <a href="{{route('requestUser', $group->id)}}"
                        class="list-group-item list-group-item-action list-group-item-primary">
                        <img src="{{asset('icons/joinReq.png')}}" alt=""> Join Requset
                        <span class="badge badge-primary badge-pill mx-2">
                            {{count($requests)}}
                        </span>
                    </a>
                    <a href="{{route('logs', $group->id)}}" class="list-group-item list-group-item-action">
                        <img src="{{asset('icons/logs.png')}}" alt=""> Group Logs
                    </a>
                </div>
            </div>
            <div class="col-10">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @yield('js')
</body>

</html>
