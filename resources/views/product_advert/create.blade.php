@extends('layouts.master')

@section('title')
    Create advert
@endsection

@section('header')
    @include('includes.header_user')
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
                {{$regions}}
                <div class="row">
                    {!! Form::open(['route' => 'product-advert.store', 'files'=> true]) !!}
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

