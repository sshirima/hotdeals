@extends('layouts.master')

@section('title')
    Service adverts
@endsection

@section('header')
    @include('includes.header_with_search')
@endsection

@section('menubar')
    @include('includes.menus.menubar-default')
@endsection

@section('col-md-3')
    @component('includes.menus.vertical-navs.service-bylocation')
    @endcomponent
@endsection

@section('col-md-9')
    <div class="container">
        @foreach($adverts as $advert)
            @include('displayadverts.showall.components.service-poster')
        @endforeach
    </div>
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

