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
    <section class="row" style="padding:10px">
        <button class="btn btn-default pull-right"><a href="{{route('product-advert.create')}}">Advertise product</a>
        </button>
    </section>

    <div class="row">
        <div class="col-md-8" style="border-right:1px solid">
            <div><h3>{{$advert[0]->title}}</h3></div>
            <div>{{$advert[0]->brand}}</div>
            <div class="row">
                <div class="col-md-11">
                    <img style="width: 80%; height: 400px; padding: 5px"
                         src="{{ URL::asset('images/'.$advert[0]->img_name) }}"
                         class="img-rounded" alt="Advert Image">
                </div>
                <div class="col-md-1"></div>
            </div>
            <div><h4>Customer reviews</h4></div>
            <div>Ratings</div>
            <div><h4></h4></div>
            <div><h4>More details</h4></div>
            <div>{!!$advert[0]->description!!}</div>
            <div><h4>Location</h4>
                <p style="padding: 10px">{{$advert[0]->reg_name}}</p></div>
        </div>
        <div class="col-md-4">
            <div class="row" style="border-bottom: 1px solid;padding: 10px">
                <div class="col-md-4">
                    <div>
                        <div style="font-size: 16px" class="glyphicon glyphicon-time" aria-hidden="true"></div>
                    </div>

                    <p style="color: red">Sales end:<br>{{date_format(date_create($advert[0]->expiredate),'M j')}}</p>
                </div>
                <div class="col-md-4">
                    <div>
                        <div style="font-size: 16px" class="glyphicon glyphicon-eye-open" aria-hidden="true"></div>
                    </div>
                    0 Viewers
                </div>
                <div class="col-md-4">
                    <div style="font-size: 16px" class="glyphicon glyphicon-star-empty" aria-hidden="true"></div>
                    <div style="font-size: 16px" class="glyphicon glyphicon-star-empty" aria-hidden="true"></div>
                    <div style="font-size: 16px" class="glyphicon glyphicon-star-empty" aria-hidden="true"></div>
                    <div style="font-size: 16px" class="glyphicon glyphicon-star-empty" aria-hidden="true"></div>
                    <div style="font-size: 16px" class="glyphicon glyphicon-star-empty" aria-hidden="true"></div>
                </div>
                0 Ratings
            </div>
            <div class="row" style="padding: 10px">
                <div class="col-md-6 ">
                    <del>{{'Tsh '. $advert[0]->p_cost}}</del>
                    <br><strong style="font-size: 20px"> {{'Tsh '. $advert[0]->c_cost}}</strong></div>
                <div class="col-md-5 col-md-offset-1">
                    <div class="pull-right"
                         style="font-size: 30px;">{{round(($advert[0]->p_cost-$advert[0]->c_cost)/$advert[0]->p_cost*100).'%'}}</div>
                </div>
            </div>
            <div class="row" style="padding: 10px; ">
                <div class="btn btn-primary" style="width: 100%">Edit</div>

            </div>
            <div class="row" style="padding: 10px">
                <div class="btn btn-danger" style="width: 100%">Delete</div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @include('includes.footer_default')
@endsection