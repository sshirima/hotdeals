@extends('layouts.master')

@section('title')
    Delete service advert
@endsection

@section('header')
    @include('includes.headers.seller-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.menubar-seller')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                {{ Form::open(['method' => 'DELETE', 'route' => ['service-advert.remove', $advert->id]]) }}
                <p>
                <h4> You are about to delete below advert with all of its associated data </h4>
                @if(!$advert)
                    <div class="alert alert-danger">
                        <strong>Error!</strong> Advert no found
                    </div>
                @else

                @endif
                <h4>Are you sure you want to <strong>DELETE </strong>?</h4>

                <button type="submit" class="btn btn-danger">Delete</button>

                <a href="{{route('seller.service-advert.show', $advert->id)}} " class="btn btn-default">
                    Cancel
                </a>
                {{ Form::close() }}
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection
