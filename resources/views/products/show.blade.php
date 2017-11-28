@extends('layouts.app')

@section('title')
    Show | Product
@endsection

@section('header')
    @include('includes.header_user')
@endsection

@section('content-md-10')
    <section class="content-header">
        <h1>
            Product
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('products.show_fields')
                    <a href="{!! route('products.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
