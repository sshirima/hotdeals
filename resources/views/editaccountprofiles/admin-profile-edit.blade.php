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
                @include('adminlte-templates::common.errors')
                {!! Form::open(['route' => ['admin.profile.update', $admin->id], 'method' => 'put']) !!}
                <h3 >Your current profile</h3>
                <table class="table">
                    <tbody>
                    <tr><th>First name:</th><td>{{ Form::input('text', 'first_name', $admin->first_name, ['class' => 'form-control']) }}</td></tr>
                    <tr><th>Last name:</th><td>{{ Form::input('text', 'last_name', $admin->last_name, ['class' => 'form-control']) }}</td></tr>
                    <tr><th>Email:</th><td>{{$admin->email}}</td></tr>
                    <tr><th>Date created:</th>
                        <td>@if(empty($admin->created_at)) System created @else {{$admin->created_at }}@endif</td>
                    </tr>
                    <tr><th>Date modified:</th><td>@if(empty($admin->updated_at)) Never @else {{$admin->updated_at}} @endif</td></tr>
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