@extends('layouts.master')

@section('title')
    Admin accounts
@endsection

@section('header')
    @include('includes.headers.admin-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.menubar-admin')
@endsection

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <section class="content-header">
                    <h2 class="pull-left">Registered Admin accounts</h2>
                    <h2 class="pull-right">
                        <a class="btn btn-primary pull-right"
                           href="{{route('admin.register')}}"><i class="glyphicon glyphicon-user" aria-hidden="true"></i> Add
                            admin account</a>
                    </h2>
                </section>
                <div class="content">
                    <div class="clearfix"></div>

                    @include('flash::message')

                    <div class="clearfix"></div>
                    <div class="box box-primary">
                        <div class="box-body">
                            @include('users.admins.table')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

