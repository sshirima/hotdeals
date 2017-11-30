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

    <!-- Summer note cdn -->
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

    <!-- Custom master styling cdn -->
    <link rel="stylesheet" href="{{ URL::asset('css/master.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/advert_row.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/login-form.css') }}">

</head>

<body>
<div class="row" style="background-color: rgb(0, 156, 187)">
    <div class="col-md-1"></div>
    <div class="col-md-10">@yield('header')</div>
    <div class="col-md-1"></div>
</div>
<div style="padding: 5px" class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        @yield('menubar')
    </div>
    <div class="col-md-1"></div>
</div>

<div class="wrapper row">
    <div class="col-md-1"></div>
    <div class="col-md-10">@yield('content')</div>
    <div class="col-md-1"></div>
</div>
<div class="push"></div>
@yield('footer')
</body>

</html>