@extends('layouts.master')

@section('title')
    Edit advert
@endsection

@section('header')
    @include('includes.headers.seller-dashboard')
@endsection

@section('content')
    <section class="content-header">
        <h2>
            Update advert details
        </h2>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => ['product-advert.update', $advert->id], 'files'=> true]) !!}
                    <div class="col-md-6">
                        @include('product_advert.fields_advert')
                    </div>
                    <div class="col-md-6">
                        @include('product_advert.fields_product')
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

