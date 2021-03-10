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


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> --}}

    @notifyCss
    {{-- clashing with style sheet --}}
</head>

<body>
    <div id="app">
        <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark border-bottom shadow-sm">

            <a class="navbar-brand col" href="{{ url('home') }}">
                <img src="{{url('/images/logo1.png')}}" alt="Image" width="112.333333333" height="81" />
            </a>


            <nav class="navbar navbar-expand-md navbar-light shadow-sm bg-light col">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ">
                        <a class="p-2 text-dark " href="{{route('home')}}">
                            <li class="col">Home</li>
                        </a>
                        <a class="p-2 text-dark " href="{{route('about')}}">
                            <li class="col">About</li>
                        </a>
                        <a class="p-2 text-dark " href="{{route('welcome')}}">
                            <li class="col">Welcome</li>
                        </a>
                        <a class="p-2 text-dark" href="{{route('admin.jobs.index')}}">
                            <li class="col">Jobs</li>
                        </a>
                        <a class="p-2 text-dark" href="{{route('admin.employers.index')}}">
                            <li class="col">Employers</li>
                        </a>
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item col">
                            <a class="nav-link p-2 text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link p-2 text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle p-2 text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item p-2 text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}

                                </a>


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
</body>

</html>
