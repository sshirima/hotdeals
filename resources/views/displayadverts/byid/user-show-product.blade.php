@extends('layouts.master')

@section('title')
    Product advert details
@endsection

@section('header')
    @include('includes.headers.user-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.menubar-user')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8" style="border-right:1px solid">
        @include('displayadverts.byid.components.title')
        @include('displayadverts.byid.components.brand-product')
        @include('displayadverts.byid.components.images')
        @include('displayadverts.byid.components.comments-view')
        @include('displayadverts.byid.components.description')
        <!-- Comment submit confirm -->
            @include('comments.fields')
            <div>@include('flash::message')</div>
        </div>
        <div class="col-md-4">
            @include('displayadverts.byid.components.quick-summary-seller')
            @include('displayadverts.byid.components.costs-product')
            @include('displayadverts.byid.components.location')
            @include('rates.index')
            <div class="row" style="padding: 10px; ">
                <a href="#">
                    <div class="btn btn-success" style="width: 100%">
                        <i class="fa fa-address-card-o" aria-hidden="true"></i> Contact seller
                    </div>
                </a>

            </div>
        </div>
    </div>

@endsection

@section('footer')
    @include('includes.footer_default')
@endsection