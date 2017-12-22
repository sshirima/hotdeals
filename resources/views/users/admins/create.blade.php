@extends('layouts.app')

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
    <section class="content-header">
        <h3>
            Admins details
        </h3>
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
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection
