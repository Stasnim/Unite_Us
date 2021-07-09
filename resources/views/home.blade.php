<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>UNITE</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        ._test {
            width: 390px;
            height: 180px;
            transition: .25s ease-in-out;
        }

        ._test:hover {
            background: #ececec;
            transition: .25s ease-in-out;
            cursor: pointer;
        }

        ._a {
            text-decoration: none;
            color: #212529;
        }

        ._a:hover {
            text-decoration: none;
        }
    </style>
    @yield('css')
    @yield('link')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="{{asset('icons/uniteus3.png')}}" alt="" style="width:60px; height:37px">
                    UNITE us
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

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
                                <a class="dropdown-item" href="{{route('profile',Auth::id())}}">
                                    Profile
                                </a>

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
        @auth
        <a class="_a" href="{{route('group.index')}}">
            <div class="container _test shadow-lg float-left mt-4 mx-4 my-5">
                <section class=" dark-grey-text text-center text-lg-left p-3">
                    <div class="row">
                        <div class="col-lg-7 mb-4 mb-lg-0">
                            <h3 class="font-weight-bold">My Group</h3>
                            <p class="text-muted">
                                Create a group And Start your project
                            </p>
                            <a class="btn btn-primary btn-md ml-0" href="{{route('group.index')}}" role="button">
                                Go
                                <i class="fa fa-users ml-2"></i>
                            </a>
                        </div>
                        <div class="col-lg-4 mb-4 mb-lg-0 d-flex align-items-center justify-content-center">
                            <i class="fa fa-users fa-6x blue-text"></i>
                        </div>
                    </div>
                </section>
            </div>
        </a>

        <a href="{{route('group.create')}}" class="_a">
            <div class="container _test shadow-lg float-left mt-4 mx-4 my-5" style="width: 400px">
                <section class="dark-grey-text text-center text-lg-left p-3">
                    <div class="row">
                        <div class="col-lg-7 mb-4 mb-lg-0">
                            <h3 class="font-weight-bold">Create Group</h3>
                            <p class="text-muted">
                                Create a group And Start your project
                            </p>
                            <a class="btn btn-primary btn-md ml-0" href="{{route('group.create')}}"
                                role="button">Create<i class="fa fa-magic ml-2"></i></a>
                        </div>
                        <div class="col-lg-4 mb-4 mb-lg-0 d-flex align-items-center justify-content-center">
                            <i class="fa fa-plus fa-6x blue-text"></i>
                        </div>
                    </div>
                </section>
            </div>
        </a>
        <a href="{{route('exploreGroup')}}" class="_a">
            <div class="container _test shadow-lg float-left mt-4 mx-4 my-5" style="width: 400px">
                <section class="dark-grey-text text-center text-lg-left p-3">
                    <div class="row">
                        <div class="col-lg-7 mb-4 mb-lg-0">
                            <h3 class="font-weight-bold">Explore Group</h3>
                            <p class="text-muted">
                                Create a group And Start your project
                            </p>
                            <a class="btn btn-primary btn-md ml-0" href="{{route('exploreGroup')}}"
                                role="button">Explore
                                <i class="fa fa-paper-plane ml-2" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-lg-4 mb-4 mb-lg-0 d-flex align-items-center justify-content-center">
                            {{-- <i class="fa fa-paper-plane fa-5x" aria-hidden="true"></i> --}}
                            <img src="{{asset('icons/Group_explore.png')}}" style="height: 108px; width:138px"
                                alt="explore">
                        </div>
                    </div>
                </section>
            </div>
        </a>

        <a href="{{route('requestGroup')}}" class="_a">
            <div class="container _test shadow-lg float-left mt-4 mx-4 my-5">
                <section class="dark-grey-text text-center text-lg-left p-3">
                    <div class="row">
                        <div class="col-lg-7 mb-4 mb-lg-0">
                            <h3 class="font-weight-bold">Req Groups</h3>
                            <p class="text-muted">
                                Requested group for joining
                            </p>
                            <a class="btn btn-primary btn-md ml-0" href="{{route('requestGroup')}}"
                                role="button">Requested
                            </a>
                        </div>
                        <div class="col-lg-4 mb-4 mb-lg-0 d-flex align-items-center justify-content-center">
                            <img src="{{asset('icons/Requested_groups.png')}}" style="height: 108px; width:138px"
                                alt="explore">
                        </div>
                    </div>
                </section>
            </div>
        </a>

        <a href="{{route('collaborationGroups')}}" class="_a">
            <div class="container _test shadow-lg float-left mt-4 mx-4 my-5">
                <section class="dark-grey-text text-center text-lg-left p-3">
                    <div class="row">
                        <div class="col-lg-7 mb-4 mb-lg-0">
                            <h3 class="font-weight-bold">Collab Groups
                            </h3>
                            <p class="text-muted">
                                Create a group And Start your project
                            </p>
                            <a class="btn btn-primary btn-md ml-0" href="{{route('collaborationGroups')}}"
                                role="button">Collaborate
                                <i class="fa fa-cogs ml-2" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-lg-4 mb-4 mb-lg-0 d-flex align-items-center justify-content-center">
                            {{-- <i class="fa fa-cogs fa-6x" aria-hidden="true"></i> --}}
                            <img src="{{asset('icons/Group_collaborations.png')}}" style="height: 108px; width:138px"
                                alt="explore">
                        </div>
                    </div>
                </section>
            </div>
        </a>
        @endauth
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" defer>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @yield('js')
</body>

</html>