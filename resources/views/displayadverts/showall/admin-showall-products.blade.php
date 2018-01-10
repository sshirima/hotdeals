@extends('layouts.master')

@section('title')
    Product adverts
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
                    ['label_approvedbyme'=>'My products approvals',
                    'link_approvedbyme'=>route('admin.product-advert.my-approval',$admin->first_name)
                    ])
        @endcomponent
        @foreach($adverts->chunk(3) as $items)
            @foreach($items as $advert)
                @include('displayadverts.showall.components.admin-product-poster')
            @endforeach
        @endforeach
    </div>
    @component('components.paginate',['objects'=>$adverts])@endcomponent
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

