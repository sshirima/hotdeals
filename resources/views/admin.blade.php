@extends('layouts.master')

@section('title')
    Admin | Home
@endsection

@section('header')
    @include('includes.header_user')
@endsection

@section('mainrow')
    You are logged in as admin
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

