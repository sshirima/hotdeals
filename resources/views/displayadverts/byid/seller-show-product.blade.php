@extends('layouts.master')

@section('title')
    Product advert details
@endsection

@section('header')
    @include('includes.headers.seller-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.menubar-seller')
@endsection

@section('content')

    <div class="row">
        <div>@include('flash::message')</div>
        <div class="col-md-8" style="border-right:1px solid">
            @include('displayadverts.byid.components.title')
            @include('displayadverts.byid.components.brand-product')
            @include('displayadverts.byid.components.images')
            @include('displayadverts.byid.components.comments-view')
            @include('displayadverts.byid.components.description')
        </div>
        <div class="col-md-4">
            @include('displayadverts.byid.components.quick-summary-seller')
            @include('displayadverts.byid.components.costs-product')
            @include('displayadverts.byid.components.location')
            @include('displayadverts.byid.components.button-product-edit')
            @include('displayadverts.byid.components.button-product-delete')
        </div>
    </div>

@endsection

@section('footer')
    @include('includes.footer_default')
@endsection