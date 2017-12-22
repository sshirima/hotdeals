@extends('layouts.master')

@section('title')
    Product advert
@endsection

@section('header')
    @include('includes.headers.seller-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.menubar-seller')
@endsection

@section('content')

    <section class="row">
        <a href="{{route('product-advert.create')}}">
            <button class="btn btn-default pull-right">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Advertise product
            </button>
        </a>
    </section>
    {{--@component('options.who')--}}
    {{--@endcomponent--}}
    @include('flash::message')
    @include('includes.errors_message')
    @foreach($adverts->chunk(3) as $items)
        <div class="row">
            @foreach($items as $advert)
                @include('includes.advert.products.column-seller')
            @endforeach
        </div>
    @endforeach
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

