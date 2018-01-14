@extends('layouts.master')

@section('title')
    Seller profile
@endsection

@section('header')
    @include('includes.headers.seller-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.menubar-seller')
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
                    <tr><th>First name:</th><td>{{$seller->first_name}}</td></tr>
                    <tr><th>Last name:</th><td>{{$seller->last_name}}</td></tr>
                    <tr><th>Phone number:</th><td>{{$seller->phonenumber}}</td></tr>
                    <tr><th>Email:</th><td>{{$seller->email}}</td></tr>
                    <tr><th>Date created:</th>
                        <td>@if(empty($seller->created_at)) System created @else {{$seller->created_at}} @endif</td>
                    </tr>
                    <tr><th>Date modified:</th><td>@if(empty($seller->updated_at)) Never @else {{$seller->updated_at}} @endif</td></tr>
                    </tbody>
                </table>
                <a href="{{route('seller.profile.edit')}}"><button class="btn btn-primary">Edit profile</button></a>
                <a href="{{route('seller.password.change')}}"><button class="btn btn-default">Change password</button></a>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection