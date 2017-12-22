@extends('layouts.master')

@section('title')
    Create advert
@endsection

@section('header')
    @include('includes.headers.seller-dashboard')
@endsection

@section('content')
    <section class="content-header">
        <h2>
            Create new product advert
        </h2>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'product-advert.store', 'files'=> true]) !!}
                    <div class="col-md-6">
                        @include('addeditadverts.components.fields.advert')
                    </div>
                    <div class="col-md-6">
                        @include('addeditadverts.components.fields.product')
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

