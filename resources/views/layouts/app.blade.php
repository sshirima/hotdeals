<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Bootstrap CDN -->
    <link href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- JQuery CDN -->
    <script src="{{ URL::asset('js/jquery-1.11.1.min.js') }}"></script>
    <!-- Javascript for bootstrap files -->
    <link src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}" rel="stylesheet">
    <!-- Font awesome cdn -->
    <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/font-awesome.min.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/master.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/advert_row.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">

</head>
<body>
<div class="row" style="background-color: rgb(0, 156, 187)">
    @yield('header')
</div>
<div style="padding: 5px" class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        @yield('menubar')
    </div>
    <div class="col-md-1"></div>
</div>
<div class="wrapper row">
    @yield('content-row')
    <div class="col-md-1"></div>
    <div class="col-md-10">
        @yield('content-md-10')
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">@yield('content')</div>
        </div>
        <div class="col-md-4"></div>
    </div>
    @yield('paginate-bar')
    <div class="col-md-1"></div>
</div>
<div class="push"></div>
@yield('footer')

{{--<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>--}}

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
