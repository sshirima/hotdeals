@extends('layouts.master')

@section('title')
    Adverts
@endsection

@section('header')
    @include('includes.header_with_search')
@endsection

@section('menubar')
    @include('includes.menus.menubar-default')
@endsection

@section('content')
    <div class="container">
        <ul class="nav nav-pills nav-stacked col-md-3">
            <li style="border-bottom: 1px solid lightgray">
                <a href="#">
                    <h6>
                        Subcategories
                    </h6>
                </a>
            </li>
        </ul>
        @foreach($adverts->chunk(3) as $items)
            @foreach($items as $advert)
                @include('displayadverts.showall.components.admin-product-poster')
            @endforeach
        @endforeach
    </div>
    @component('components.paginate',['adverts'=>$adverts])@endcomponent
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

