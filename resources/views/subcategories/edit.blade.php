@extends('layouts.app')

@section('title')
    Edit | Subcategory
@endsection

@section('header')
    @include('includes.headers.admin-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.menubar-admin')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4"></div>
    </div>
    <section class="content-header">
        <h1>
            Subcategory
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($subcategory, ['route' => ['subcategories.update', $subcategory->subcat_id], 'method' => 'patch']) !!}

                    @include('subcategories.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection