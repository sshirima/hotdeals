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

@section('content')
    <div class="container">
        @component('includes.menus.vertical-navs.nav-user',
        ['topCategories'=>$topCategories,
        'link_category'=>'products.category.show'])
        @endcomponent
        @if(empty($adverts))
            Nothing was found
        @else
            @foreach($adverts as $advert)
                @include('displayadverts.showall.components.product-poster')
            @endforeach
        @endif
    </div>
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

