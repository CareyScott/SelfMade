<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Ramabhadra&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> --}}

    @notifyCss
    {{-- clashing with style sheet --}}
</head>

<body>
    <div id="app">
        <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 pure-black border-bottom shadow-sm">

            {{-- <form class="col form-header">
              <input type="text" class="input" placeholder="Search...">
              <i class="fa fa-search"></i>
          </form> --}}


            <div class="col-7">
                <a class="navbar-brand" href="{{ url('home') }}">
                    {{-- <img src="{{url('/images/logo1.png')}}" alt="Image" width="112.333333333" height="81" />
                     --}}
                     <h1 class="h1 title-font text-light">SELF MADE.</h1>
                </a>
            </div>

            <nav class="navbar navbar-expand-md  shadow-sm pure-black  d-flex mx-auto">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{-- <ul class="navbar-nav mr-auto">

                    </ul> --}}

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ">

                        {{-- <a class="p-2 text-dark " href="{{route('home')}}">
                            <li class="col">Home</li>
                        </a> --}}
                        <a class="p-2 text-light " href="{{route('about')}}">
                            <li class="col">About</li>
                        </a>
                        <a class="p-2 text-light " href="{{route('home')}}">
                            <li class="col">Home</li>
                        </a>
                        <a class="p-2 text-light " href="{{route('market')}}">
                            <li class="col">Jobs Market</li>
                        </a>
                        {{-- <a class="p-2 text-dark" href="{{route('admin.jobs.index')}}">
                            <li class="col">Jobs</li>
                        </a> --}}
                        <a class="p-2 text-light" href="{{route('employer')}}">
                            <li class="col">Employers</li>
                        </a>
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item col">
                            <a class="nav-link p-2 text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link p-2 text-light" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle p-2 text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item p-2 text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}

                                </a>
<div class="dropdown-divider"></div>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                                <a href="{{ route('profile', Auth::user()->id) }}"><strong class="d-block text-dark dropdown-item p-2 text-dark">My Profile</strong>

                                    {{-- {{ __('profile') }} --}}

                                </a>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
        <main class="py-4">
            @yield('content')
        </main>
    </div>




    @include('notify::messages')
    <x:notify-messages />
    @notifyJs


    <style>
        .input {
            border: 0px;
            background: white !important;
            width: 0%;
            padding: 5px 0;
            outline: none;
            /*font-weight: var(--fw-sb);*/
            transition: all 0.3s ease;
            font-size: 24px;

        }

        .input.active {
            width: 250px;
            padding-left: 5px;
            transition: all 0.5s 0.8s ease;
        }

        .input::placeholder {
            color: black;
            font-size: 26px;
            /*
    font-size: var(--fs2);
*/
        }

        .search-cont .fa {
            color: #ffffff;
            position: absolute;
            /*right: 15px;
    top: 20px;*/
            cursor: pointer;
        }

        .fa-search {
            font-size: 26px;
        }

        .pure-black {
            background-color: #000000
        }
    </style>

</body>

</html>

{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="public\scripts\jquery-2.2.0.min.js"></script> --}}

{{--
<script>
    $('.custom-btn').click(function() {
        $(this).toggleClass("active");
    });

</script> --}}
