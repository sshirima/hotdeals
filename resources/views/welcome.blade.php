@extends('layouts.master')

@section('title')
    Welcome
@endsection

@section('header')
    @include('includes.header_with_search')
@endsection

@section('menubar')
    @include('includes.menubar')
@endsection

@section('content')

    @foreach($adverts->chunk(3) as $items)
        <div class="row">
            @foreach($items as $advert)
                <div class="form-group col-sm-4">
                    <a href="#" class="advertLink">
                        <img style="width: 100%; height: 250px; padding: 5px"
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

