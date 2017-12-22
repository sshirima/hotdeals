@extends('layouts.master')

@section('title')
    Advert details
@endsection

@section('header')
    @include('includes.header_with_search')
@endsection

@section('content')
    <section class="row" style="padding:10px">
        <a href="{{route('service-advert.create')}}">
            <button class="btn btn-default pull-right">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Advertise service
            </button>
        </a>
    </section>
    <div class="row">
        <div class="col-md-8" style="border-right:1px solid">
            <div><h3>{{$advert->title}}</h3></div>
            <div>{{$advert->service->srv_brand}}</div>
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
            <div><h4>Customer reviews</h4></div>
            <div>Ratings</div>
            <div><h4></h4></div>
            <div><h4>More details</h4></div>
            <div>{!!$advert->description!!}</div>
            <div><h4>Location</h4>
                <p style="padding: 10px">{{$advert->location->region->reg_name}}</p></div>
        </div>
        <div class="col-md-4">
            <div class="row" style="border-bottom: 1px solid;padding: 10px">
                <div class="col-md-4">
                    <div>
                        <div style="font-size: 16px" class="glyphicon glyphicon-time" aria-hidden="true"></div>
                    </div>

                    <p style="color: red">Sales end:<br>{{date_format(date_create($advert->expiredate),'M j')}}</p>
                </div>
                <div class="col-md-4">
                    <div>
                        <div style="font-size: 16px" class="glyphicon glyphicon-eye-open" aria-hidden="true"></div>
                    </div>
                    0 Viewers
                </div>
                <div class="col-md-4">
                    <div style="font-size: 14px" class="glyphicon glyphicon-star-empty" aria-hidden="true"></div>
                    <div style="font-size: 14px" class="glyphicon glyphicon-star-empty" aria-hidden="true"></div>
                    <div style="font-size: 14px" class="glyphicon glyphicon-star-empty" aria-hidden="true"></div>
                    <div style="font-size: 14px" class="glyphicon glyphicon-star-empty" aria-hidden="true"></div>
                    <div style="font-size: 14px" class="glyphicon glyphicon-star-empty" aria-hidden="true"></div>
                </div>
                0 Ratings
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
            <div class="row" style="padding: 10px; ">
                <a href="#">
                    <div class="btn btn-success" style="width: 100%">
                        <i class="fa fa-address-card-o" aria-hidden="true"></i> Contact seller
                    </div>
                </a>

            </div>

        </div>
    </div>

@endsection

@section('footer')
    @include('includes.footer_default')
@endsection