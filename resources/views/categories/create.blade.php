@extends('layouts.app')

@section('title')
    Create | Categories
@endsection

@section('header')
    @include('includes.headers.admin-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.menubar-admin')
@endsection

@section('content')
            <section class="content-header">
                <h1>
                    Category
                </h1>
            </section>
            <div class="content">
                @include('adminlte-templates::common.errors')
                <div class="box box-primary">

                    <div class="box-body">
                        <div class="row">
                            {!! Form::open(['route' => 'categories.store']) !!}

                            @include('categories.fields')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection