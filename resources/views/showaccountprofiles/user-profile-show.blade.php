@extends('layouts.master')

@section('title')
    User profile
@endsection

@section('header')
    @include('includes.headers.user-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.menubar-user')
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
                    <tr><th>First name:</th><td>{{$user->first_name}}</td></tr>
                    <tr><th>Last name:</th><td>{{$user->last_name}}</td></tr>
                    <tr><th>Phone number:</th><td>{{$user->phonenumber}}</td></tr>
                    <tr><th>Email:</th><td>{{$user->email}}</td></tr>
                    <tr><th>Date created:</th>
                        <td>@if(empty($user->created_at)) System created @else {{$user->created_at}} @endif</td>
                    </tr>
                    <tr><th>Date modified:</th><td>@if(empty($user->updated_at)) Never @else {{$user->updated_at}} @endif</td></tr>
                    </tbody>
                </table>
                <a href="{{route('user.profile.edit')}}"><button class="btn btn-primary">Edit profile</button></a>
                <a href="{{route('user.password.change')}}"><button class="btn btn-default">Change password</button></a>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection