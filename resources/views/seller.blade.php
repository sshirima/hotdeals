@extends('layouts.master')

@section('title')
    Seller | Home
@endsection

@section('header')
    @include('includes.headers.seller-dashboard')
@endsection

@section('menubar')
    @include('includes.menubar')
@endsection

@section('content')

    <section class="row">
        <button class="btn btn-default pull-right"><a href="{{route('product-advert.create')}}">Advertise product</a>
        </button>
    </section>
    @component('components.who')
    @endcomponent

    @include('includes.errors_message')
    @foreach($adverts->chunk(3) as $items)
        <div class="row">
            @foreach($items as $advert)
                @include('includes.advert.column-seller')
            @endforeach
        </div>
    @endforeach
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

