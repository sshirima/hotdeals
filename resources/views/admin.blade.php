@extends('layouts.master')

@section('title')
    Admin | Home
@endsection

@section('header')
    @include('includes.header_admin')
@endsection

@section('content')
    @component('components.who')
    @endcomponent
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

