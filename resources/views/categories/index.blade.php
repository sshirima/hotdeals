@extends('layouts.master')

@section('title')
    Categories
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
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <section class="content-header">
                    <h1 class="pull-left">Categories</h1>
                    <h1 class="pull-right">
                        <a class="btn btn-primary pull-right"
                           href="{!! route('categories.create') !!}">Add New</a>
                    </h1>
                </section>
                <div class="content">
                    <div class="clearfix"></div>

                    @include('flash::message')

                    <div class="clearfix"></div>
                    <div class="box box-primary">
                        <div class="box-body">
                            @include('categories.table')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection
@section('paginate-bar')
    @component('components.paginate',['objects'=>$categories])@endcomponent
@endsection
@section('footer')
    @include('includes.footer_default')
@endsection

