@extends('layouts.app')

@section('title')
    Users
@endsection

@section('header')
    @include('includes.headers.admin-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.admin-menubar')
@endsection

@section('content-row')
    <div class="row">
        <div class="container">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <section class="content-header">
                    <h3 class="pull-left">Administrators</h3>
                    <div class="pull-right">
                        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
                           href="{{route('admin.register')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Add
                            admin account</a>
                    </div>
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

