@extends('layouts.master')

@section('title')
    Seller | Home
@endsection

@section('header')
    @include('includes.headers.seller-dashboard')
@endsection

@section('menubar')
    @include('includes.menubar')
@endsection

@section('content')

    <section class="row">
        <button class="btn btn-default pull-right"><a href="{{route('product-advert.create')}}">Advertise product</a>
        </button>
    </section>
    @component('components.who')
    @endcomponent

    @include('includes.errors_message')
    @foreach($adverts->chunk(3) as $items)
        <div class="row">
            @foreach($items as $advert)
                <div class="form-group col-sm-4">
                    <a href="#" class="advertLink">
                        <img style="width: 100%; height: 200px; padding: 5px"
                             src="{{ URL::asset('images/'.$advert->img_name) }}"
                             class="img-rounded" alt="Advert Image">
                        <div id="advert_row_details">
                            <h4>{{$advert->title}}</h4>
                            <p>{{$advert->brand}}</p>
                            <span class="pull-left">Dar es Salaam</span><strong style="color: green;"
                                                                                class="pull-right">Current: {{$advert->c_cost}}
                                Tsh</strong>
                            <br>
                            <div>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span><span>(190)</span>
                                <del style="color: red;" class="pull-right">From: {{$advert->p_cost}} Tsh</del>
                            </div>
                        </div>
                    </a>

                </div>
            @endforeach
        </div>
    @endforeach
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

