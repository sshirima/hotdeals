<!doctype html>
<html lang="{{ config('app.locale') }}">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- pass through the CSRF (cross-site request forgery) token -->
<meta name="csrf-token" content="<?php echo csrf_token() ?>"/>
<head>
    <title>@yield('title')</title>
    <!-- Bootstrap CDN -->
    <link href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- JQuery CDN -->
    <script src="{{ URL::asset('js/jquery-1.11.1.min.js') }}"></script>
    <!-- Javascript for bootstrap files -->
    <link src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}" rel="stylesheet">
    <!-- Font awesome cdn -->
    <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/font-awesome.min.css') }}">

    <!-- Custom master styling cdn -->
    <link rel="stylesheet" href="{{ URL::asset('css/master.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/advert_row.css') }}">

</head>

<body>
<div id="header_row" class="row">
    @include('layouts.header')
</div>
<div style="padding: 5px" id="menubar_row" class="row">
    @include('layouts.menu_bar')
</div>
<div id="main_row" class="row">
    @include('layouts.main_row')
</div>
<div id="footer_row" class="row">
    @include('layouts.footer')
</div>
</body>
</html>