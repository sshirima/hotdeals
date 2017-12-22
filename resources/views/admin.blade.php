@extends('layouts.master')

@section('title')
    Admin dashboard
@endsection

@section('header')
    @include('includes.headers.admin-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.menubar-admin')
@endsection

@section('content')
    {{$visitor}}
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

