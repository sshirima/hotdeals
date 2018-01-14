@extends('layouts.master')

@section('title')
    Edit user profile
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
                @include('adminlte-templates::common.errors')
                {!! Form::open(['route' => ['user.profile.update', $user->id], 'method' => 'put']) !!}
                <h3 >Your current profile</h3>
                <table class="table">
                    <tbody>
                    <tr><th>First name:</th><td>{{ Form::input('text', 'first_name', $user->first_name, ['class' => 'form-control']) }}</td></tr>
                    <tr><th>Last name:</th><td>{{ Form::input('text', 'last_name', $user->last_name, ['class' => 'form-control']) }}</td></tr>
                    <tr><th>Email:</th><td>{{$user->email}}</td></tr>
                    <tr><th>Date created:</th>
                        <td>@if(empty($user->created_at)) System created @else {{$user->created_at}} @endif</td>
                    </tr>
                    <tr><th>Date modified:</th><td>@if(empty($user->updated_at)) Never @else {{$user->updated_at}} @endif</td></tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success">Save changes</button>
            </div>
            <div class="col-md-3"></div>
            {{Form::close()}}
        </div>
    </div>
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection