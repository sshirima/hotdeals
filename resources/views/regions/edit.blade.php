@extends('layouts.app')

@section('title')
    Edit regions
@endsection

@section('header')
    @include('includes.headers.admin-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.admin-menubar')
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Region
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($region, ['route' => ['regions.update', $region->id], 'method' => 'patch']) !!}

                    @include('regions.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @include('includes.footer_default')
@endsection