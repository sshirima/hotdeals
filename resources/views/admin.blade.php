@extends('layouts.master')

@section('title')
    Admin | Home
@endsection

@section('header')
    @include('includes.header_admin')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-2">
            <nav class="navbar navbar-default sidebar" role="navigation">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Dashboard<span style="font-size:16px;"
                                                                          class="pull-right hidden-xs showopacity glyphicon glyphicon-dashboard"></span></a>
                            </li>
                            <li><a href="#">Users<span style="font-size:16px;"
                                                       class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
                            </li>
                            <li><a href="#">Adverts<span style="font-size:16px;"
                                                         class="pull-right hidden-xs showopacity glyphicon glyphicon-tags"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-md-10">
            @foreach($adverts->chunk(3) as $items)
                <div class="row">
                    @foreach($items as $advert)
                        @include('includes.advert.column-admin')
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

