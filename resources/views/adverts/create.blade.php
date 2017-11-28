@extends('layouts.app')

@section('title')
    Create | Advert
@endsection

@section('header')
    @include('includes.header_user')
@endsection
@section('content-md-10')
    <section class="content-header">
        <h1>
            Advert
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'adverts.store']) !!}

                    @include('adverts.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
