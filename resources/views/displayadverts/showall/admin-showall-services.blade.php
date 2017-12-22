@extends('layouts.master')

@section('title')
    Admin | Home
@endsection

@section('header')
    @include('includes.headers.admin-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.menubar-admin')
@endsection

@section('content')
    <div class="container">
        @include('flash::message')
        @component('includes.menus.vertical-navs.nav-admin',
                    ['label_approvedbyme'=>'Service ads approved',
                    'link_approvedbyme'=>route('admin.service-advert.my-approval',$admin->first_name)
                    ])
        @endcomponent
        @foreach($adverts->chunk(3) as $items)
            @foreach($items as $advert)
                @include('displayadverts.showall.components.admin-service-poster')
            @endforeach
        @endforeach
    </div>
    @component('components.paginate',['adverts'=>$adverts])@endcomponent
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

