@extends('layouts.master')

@section('title')
    Seller dashboard
@endsection

@section('custom-import')
    <!-- Custom master styling cdn -->
    <link rel="stylesheet" href="{{ URL::asset('add-edit-advert/css.css') }}">
@endsection

@section('header')
    @include('includes.headers.seller-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.menubar-seller')
@endsection

@section('content')

@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

