@extends('layouts.master')

@section('title')
    User | Home
@endsection

@section('header')
    @include('includes.headers.user-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.menubar-user')
@endsection

@section('content')
    @foreach($adverts->chunk(3) as $items)
        <div class="row">
            @foreach($items as $advert)
                @include('includes.advert.products.column-user')
            @endforeach
        </div>
    @endforeach
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

