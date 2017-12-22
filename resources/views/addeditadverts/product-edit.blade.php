@extends('layouts.master')

@section('title')
    Edit product advert
@endsection

@section('custom-import')
    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

    <!-- Chosen -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
@endsection

@section('header')
    @include('includes.headers.seller-dashboard')
@endsection

@section('content')
    <script type="text/javascript">
        $(function () {
            $(".chosen-select").chosen();
        });
    </script>

    <section class="content-header">
        <h2>
            Edit product advert
        </h2>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => ['product-advert.update', $advert->id], 'files'=> true]) !!}
                    <div class="col-md-6">
                        @include('addeditadverts.components.fields.advert')
                    </div>
                    <div class="col-md-6">
                        @include('addeditadverts.components.fields.product')
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

