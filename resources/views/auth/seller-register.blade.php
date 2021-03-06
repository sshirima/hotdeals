@extends('layouts.master')

@section('title')
    Register
@endsection

@section('header')
    @include('includes.headers.seller-login')
@endsection

@section('content')
    <div class="container">
        @include('includes.errors_message')
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3">
                <h1 class="text-center login-title">Seller registration form</h1>
                <div style="padding-right: 10px" class="login-form">
                    <form class="form-horizontal" role="form" method="post" action="{{route('seller.register')}}">
                        <div class="form-group">
                            <label for="first_name" class="col-sm-3 control-label">First Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="first_name" id="first_name" placeholder="First name"
                                       class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="last_name" class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="last_name" id="last_name" placeholder="Last name"
                                       class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" id="password" placeholder="Password"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="col-sm-3 control-label">Re-type password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                       placeholder="Confirm password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phonenumber" class="col-sm-3 control-label">Phone number</label>
                            <div class="col-sm-9">
                                <input type="text" name="phonenumber" id="phonenumber" placeholder="Ex. (255) 755 XXX XX"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <div class="checkbox">
                                    <label>
                                        <input name="agree_terms" type="checkbox">I accept <a href="#">terms</a> and the <a
                                                href="#">conditions</a> agreement
                                    </label>
                                </div>
                            </div>
                        </div> <!-- /.form-group -->
                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
    </br><!-- ./container -->
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

