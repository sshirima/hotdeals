@extends('layouts.master')

@section('title')
    Create admin
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
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <section class="content-header">
                    <h2> New admin account details</h2>
                </section>
                <div class="content">
                    @include('adminlte-templates::common.errors')
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="row">
                                {!! Form::open(['route' => 'admin.register.submit']) !!}
                                @include('users.admins.fields')
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection
