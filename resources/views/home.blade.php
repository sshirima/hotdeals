@extends('layouts.master')

@section('title')
    Home
@endsection

@section('header')
    @include('includes.header_with_search')
@endsection

@section('menubar')
    @include('includes.menubar')
@endsection

@section('content')
    <div class="container">
        <ul class="nav nav-pills nav-stacked col-md-3">
            @foreach($topCategories as $topCategory)
                <li style="border-bottom: 1px solid lightgray">
                    <a href="{{route('adverts.by.category', $topCategory->id)}}">
                        <h4>
                            <i class="fa fa-bars"
                               aria-hidden="true"></i><strong>{{'  '.$topCategory->cat_name}}</strong>
                        </h4>
                    </a>
                </li>
            @endforeach
        </ul>
        @foreach($adverts->chunk(3) as $items)
            @foreach($items as $advert)
                @include('includes.advert.column-home')
            @endforeach
        @endforeach
    </div>
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

