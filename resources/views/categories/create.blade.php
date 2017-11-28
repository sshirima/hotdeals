@extends('layouts.app')

@section('title')
    Create | Categories
@endsection

@section('header')
    @include('includes.header_user')
@endsection

@section('content')
    <div class="container">
        <div class="col-md-4"></div>
        <div class="col-md-4">
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
        </div>
        <div class="col-md-4"></div>
    </div>


@endsection
