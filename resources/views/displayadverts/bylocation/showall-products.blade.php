@extends('layouts.master')

@section('title')
    Advert products
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
        @component('includes.menus.vertical-navs.product-bylocation)
        @endcomponent
        @foreach($adverts as $advert)
            @include('displayadverts.showall.components.product-poster')
        @endforeach
    </div>
    @component('components.paginate',['objects'=>$adverts])@endcomponent
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

