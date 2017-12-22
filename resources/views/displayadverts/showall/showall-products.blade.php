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
        @foreach($adverts->chunk(3) as $items)
            @foreach($items as $advert)
                @include('displayadverts.showall.components.product-poster')
            @endforeach
        @endforeach

    </div>
    @component('components.paginate',['adverts'=>$adverts])@endcomponent
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

