@extends('layouts.app')

@section('title')
    Edit | Categories
@endsection

@section('header')
    @include('includes.header_user')
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
            Category
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'patch']) !!}

                    @include('categories.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection