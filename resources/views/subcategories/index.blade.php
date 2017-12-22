@extends('layouts.app')

@section('title')
    Subcategories
@endsection

@section('header')
    @include('includes.headers.admin-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.menubar-admin')
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Subcategories</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
               href="{!! route('subcategories.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('subcategories.table')
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

