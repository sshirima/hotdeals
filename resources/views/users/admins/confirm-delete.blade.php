@extends('layouts.app')

@section('title')
    Confirm delete
@endsection

@section('header')
    @include('includes.headers.admin-dashboard')
@endsection

@section('menubar')
    @include('includes.menus.admin-menubar')
@endsection

@section('content-row')
    <div class="row">
        <div class="container">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <div class="form-group col-sm-12">
                    Are you sure you want to delete
                    <strong>{{$adminToDelete->first_name.' '.$adminToDelete->last_name}}</strong>?
                </div>
                <div class="form-group col-sm-12">
                    {!! Form::open(['route' => ['admin.delete.destroy', $adminToDelete->id], 'method' => 'delete']) !!}
                    {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                    <a href="{{route('accounts.admins.index')}}">
                        <button class="btn btn-default">Cancel</button>
                    </a>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

