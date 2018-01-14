@extends('layouts.master')

@section('title')
    Edit seller profile
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
                @include('adminlte-templates::common.errors')
                {!! Form::open(['route' => ['seller.profile.update', $seller->id], 'method' => 'put']) !!}
                <h3 >Your current profile</h3>
                <table class="table">
                    <tbody>
                    <tr><th>First name:</th><td>{{ Form::input('text', 'first_name', $seller->first_name, ['class' => 'form-control']) }}</td></tr>
                    <tr><th>Last name:</th><td>{{ Form::input('text', 'last_name', $seller->last_name, ['class' => 'form-control']) }}</td></tr>
                    <tr><th>Phone number:</th><td>{{ Form::input('text', 'phonenumber', $seller->phonenumber, ['class' => 'form-control']) }}</td></tr>
                    <tr><th>Email:</th><td>{{$seller->email}}</td></tr>
                    <tr><th>Date created:</th>
                        <td>@if(empty($seller->created_at)) System created @else {{$seller->created_at}} @endif</td>
                    </tr>
                    <tr><th>Date modified:</th><td>@if(empty($seller->updated_at)) Never @else {{$seller->updated_at}} @endif</td></tr>
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