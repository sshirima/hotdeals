@extends('layouts.master')

@section('title')
    Admin profile
@endsection

@section('header')
    @include('includes.headers.admin-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.menubar-admin')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div>@include('flash::message')</div>
                <h3 >Your current profile information</h3>
                <table class="table">
                    <tbody>
                    <tr><th>First name:</th><td>{{$admin->first_name}}</td></tr>
                    <tr><th>Last name:</th><td>{{$admin->last_name}}</td></tr>
                    <tr><th>Email:</th><td>{{$admin->email}}</td></tr>
                    <tr><th>Date created:</th>
                        <td>@if(empty($admin->created_at)) System created @else {{$admin->created_at}} @endif</td>
                    </tr>
                    <tr><th>Date modified:</th><td>@if(empty($admin->updated_at)) Never @else {{$admin->updated_at}} @endif</td></tr>
                    </tbody>
                </table>
                <a href="{{route('admin.profile.edit')}}"><button class="btn btn-primary">Edit profile</button></a>
                <a href="{{route('admin.password.change')}}"><button class="btn btn-default">Change password</button></a>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection