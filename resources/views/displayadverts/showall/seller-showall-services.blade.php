@extends('layouts.master')

@section('title')
    Service products
@endsection

@section('header')
    @include('includes.headers.seller-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.menubar-seller')
@endsection

@section('content')
    <div class="container">
        @include('flash::message')
        <br>
        @component('includes.menus.vertical-navs.nav-seller',
                    ['label'=>'New service advert',
                    'link'=>route('service-advert.create'),
                    'approved_advert_link'=>route('seller.service-advert.status',1),
                    'pending_advert_link'=>route('seller.service-advert.status',0)
                    ])
        @endcomponent

        @include('includes.errors_message')
        @foreach($adverts->chunk(3) as $items)
            @foreach($items as $advert)
                @include('displayadverts.showall.components.seller-service-poster')
            @endforeach
        @endforeach
    </div>
    @component('components.paginate',['objects'=>$adverts])@endcomponent
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

