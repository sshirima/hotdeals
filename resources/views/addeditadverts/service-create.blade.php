@extends('layouts.master')

@section('title')
    Create service advert
@endsection

@section('custom-import')
    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

    <!-- Chosen -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">

    <!-- Jave script for this page -->
    <script src="{{ URL::asset('add-edit-advert/js.js') }}"></script>

    <!-- Custom master styling cdn -->
    <link rel="stylesheet" href="{{ URL::asset('add-edit-advert/css.css') }}">
@endsection

@section('header')
    @include('includes.headers.seller-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.menubar-seller')
@endsection

@section('content')
    <div class="content container">
        @include('adminlte-templates::common.errors')
        <h2>Create service advert form</h2>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'service-advert.store', 'files'=> true]) !!}
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Advert details</div>
                            <div class="panel-body">
                                @include('addeditadverts.components.fields.advert')
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Service details</div>
                            <div class="panel-body">
                                @include('addeditadverts.components.fields.service')
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

