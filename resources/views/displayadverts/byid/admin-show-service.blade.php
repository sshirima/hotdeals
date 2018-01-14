@extends('layouts.master')

@section('title')
    Service advert details
@endsection

@section('header')
    @include('includes.headers.admin-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.menubar-admin')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8" style="border-right:1px solid">
            @include('displayadverts.byid.components.title')
            @include('displayadverts.byid.components.brand-service')
            @include('displayadverts.byid.components.images')
            @include('displayadverts.byid.components.comments-view')
            @include('displayadverts.byid.components.description')
        </div>
        <div class="col-md-4">
            @include('displayadverts.byid.components.quick-summary-seller')
            @include('displayadverts.byid.components.costs-service')
            @include('displayadverts.byid.components.location')
            @component('displayadverts.byid.components.button-approve',
            ['link'=>route('service-advert.approve', [$advert->id])])
            @endcomponent
        </div>
    </div>

@endsection

@section('footer')
    @include('includes.footer_default')
@endsection