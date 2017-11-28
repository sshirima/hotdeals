@extends('layouts.master')

@section('title')
    Home
@endsection

@section('header')
    @include('includes.header_user')
@endsection

@section('menubar')
    @include('includes.menubar')
@endsection

@section('mainrow')
    <div class="panel-body">
        @component('components.who')
        @endcomponent
    </div>
    {{--@include('includes.errors_message')
    @foreach($adverts_rows as $columns)
        <div class="row">
            @foreach($columns as $column)
                <div class="col-md-4">
                    <a href="#" class="advertLink">
                        <img style="width: 100%; height: 200px; padding: 5px"
                             src="{{ URL::asset('images/advert_01.jpg') }}"
                             class="img-rounded" alt="Advert Image">
                        <div id="advert_row_details">
                            <h4 style="line-height: 1.0em;height: 2em;overflow: hidden;">{{$column->adv_title}}</h4>
                            <p>{{$column->itm_brand}}</p>
                            <span class="pull-left">{{$column->reg_name}}</span><strong style="color: green;"
                                                                                        class="pull-right">Current: {{$column->itm_ccost}}
                                Tsh</strong>
                            <br>
                            <div>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span><span>(190)</span>
                                <del style="color: red;" class="pull-right">From: {{$column->itm_pcost}} Tsh</del>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endforeach--}}
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

