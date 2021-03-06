@extends('layouts.master')

@section('title')
    Service adverts
@endsection

@section('header')
    @include('includes.headers.user-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.menubar-user')
@endsection

@section('content')
    <div class="container">
        @component('includes.menus.vertical-navs.nav-user',
       ['topCategories'=>$topCategories,
       'link_category'=>'user.services.category.show'])
        @endcomponent
        @foreach($adverts->chunk(3) as $items)
            @foreach($items as $advert)
                @include('displayadverts.showall.components.user-service-poster')
            @endforeach
        @endforeach
    </div>
    @component('components.paginate',['objects'=>$adverts])@endcomponent
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

