<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="{{ url('assets_app/images/favicon.png') }}"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets_app/css/app.css') }}" rel="stylesheet">

    @yield('css')

</head>
<body>
    <div id="app">    
        <div class="container p-0">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        
                <a class="navbar-brand" href="{{ url('/') }}">
                    <!-- {{ config('app.name', 'Laravel') }} -->
                    <img src="{{ asset('assets_app/images/logo2.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ (Route::currentRouteName() == 'about')? 'active' : '' }}" href="{{ url('/about') }}">About</a>
                        </li>
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
                        @endguest

                        @if ( Auth::user() && Auth::user()->roles_id == \App\Providers\AppServiceProvider::Client)

                            <li class="nav-item">
                                <a class="nav-link {{ (Route::currentRouteName() == 'user-events')? 'active' : '' }}" href="{{ route('user-events') }}">Your Events</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ (Route::currentRouteName() == 'user-matches')? 'active' : '' }}" href="{{ route('user-matches') }}">Your Matches</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ (Route::currentRouteName() == 'user-membership')? 'active' : '' }}" href="{{ route('user-membership') }}">Membership</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ (Route::currentRouteName() == 'user')? 'active' : '' }}" href="{{ route('user') }}">Profile</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            
        </nav>
    </div>

    



        <main class="" >
            @yield('content')
        </main>
    </div>
    <div class="container p-0 lift-and-drop-shadow footer">
       
        <div class="container text-center p-3 pb-2">
            <ul name="main-menu" class="list-inline footer-links">
                <li class="list-inline-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="list-inline-item ">
                    <a class="nav-link {{ (Route::currentRouteName() == 'about')? 'active' : '' }}" href="{{ url('/about') }}">About</a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link" href="{{ url('/terms') }}">Privacy Policy</a>
                </li>


                @guest
                <li class="list-inline-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="list-inline-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
                @endguest

                @if ( Auth::user() && Auth::user()->roles_id == \App\Providers\AppServiceProvider::Client)
                <li class="list-inline-item">
                    <a class="nav-link" href="{{ route('user-events') }}">Your Events</a>
                </li>

                <li class="list-inline-item">
                    <a class="nav-link"  href="{{ route('user-matches') }}">Your Matches</a>
                </li>

                <li class="list-inline-item">
                    <a class="nav-link" href="{{ route('user-membership') }}">Membership</a>
                </li>

                <li class="list-inline-item">
                    <a class="nav-link" href="{{ route('user') }}">Profile</a>
                </li>

                <li class="list-inline-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
                </li>
                @endif
                

            </ul>
            <h5>{{ date('Y') }} All Rights Reserved Sussex Companions Pvt Ltd. </h5>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets_app/js/app.js') }}"></script>
    @yield('script')

</body>
</html>
