@extends('layouts.master')

@section('title')
    New advert
@endsection

@section('header')
    @include('includes.headers.seller-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.menubar-seller')
@endsection

@section('content')
    <br>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'service-advert.store', 'files'=> true]) !!}
                    <div class="col-md-6">
                        <div class="panel panel-default">

                            <div class="panel-heading">Advert details</div>
                            <div class="panel-body">
                                @include('service_advert.fields_advert')
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Service details</div>
                            <div class="panel-body">
                                @include('service_advert.fields_service')
                            </div>
                        </div>

                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

