@extends('layouts.master')

@section('title')
    Admin | Home
@endsection

@section('header')
    @include('includes.header_user')
@endsection

@section('mainrow')
    You are logged in as <strong>ADMIN</strong>
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

