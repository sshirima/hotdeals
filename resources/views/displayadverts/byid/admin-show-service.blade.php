@extends('layouts.master')

@section('title')
    Service advert details
@endsection

@section('header')
    @include('includes.headers.admin-dashboard')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8" style="border-right:1px solid">
            <!-- Title Field -->
            <div><h3>{{$advert->title}}</h3></div>
            <!-- Brand Field -->
            <div>{{$advert->service->srv_brand}}</div>
            <!-- Picture Fields -->
            <div class="row">
                <div class="col-md-12">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            @for($i=0;$i<count($advert->images);$i++)
                                <div style="width: 100%; height: 450px; padding: 5px"
                                     class=" img-rounded item @if($i==0)active @endif">
                                    <img src="{{ URL::asset('images/'.$advert->images[$i]->img_name) }}">
                                </div>
                            @endfor
                        </div>
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>

                    </div>

                </div>
            </div>
            <div class="panel-body">

                <fieldset class="col-md-12">
                    <legend>Advert details</legend>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div>{!!$advert->description!!}</div>
                        </div>
                    </div>
                </fieldset>

                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row" style="border-bottom: 1px solid;padding: 10px">
                <div class="col-md-4">
                    <div>
                        <div style="font-size: 16px" class="glyphicon glyphicon-time" aria-hidden="true"></div>
                    </div>

                    <p style="color: red">Sales end:<br>{{date_format(date_create($advert->expiredate),'M j')}}</p>
                </div>
            </div>
            <div class="row" style="padding: 10px">
                <div class="col-md-6 ">
                    <del>{{'Tsh '. $advert->service->p_cost}}</del>
                    <br><strong style="font-size: 20px"> {{'Tsh '. $advert->service->c_cost}}</strong></div>
                <div class="col-md-5 col-md-offset-1">
                    <div class="pull-right"
                         style="font-size: 30px;">{{round(($advert->service->p_cost-$advert->service->c_cost)/$advert->service->p_cost*100).'%'}}</div>
                </div>
            </div>
            <div class="panel-body">

                <fieldset class="col-md-12">
                    <legend>Location</legend>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div>{{$advert->location->region->reg_name}}</div>
                        </div>
                    </div>
                </fieldset>

                <div class="clearfix"></div>
            </div>
            <div class="row" style="padding: 10px; ">
                <a href="{{route('service-advert.approve', [$advert->id])}}">
                    <div class="btn btn-success" style="width: 100%">Approve</div>
                </a>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @include('includes.footer_default')
@endsection