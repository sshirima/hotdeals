@extends('layouts.master')

@section('title')
    Login
@endsection

@section('header')
    @include('includes.header_signin_signout')
@endsection

@section('mainrow')
    @include('includes.errors_message')
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Sign in</h1>
            <div class="login-form">
                <img class="profile-img"
                     src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                     alt="">

                <form class="form-signin" method="post" action="/login ">
                    <br>
                    <input name="email" type="text" class="form-control" placeholder="Email" required autofocus>
                    <br>
                    <input name="password" type="password" class="form-control" placeholder="Password" required><br>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        Sign in
                    </button>
                    <label class="checkbox pull-left">
                        <input name="remember" type="checkbox" value="remember">
                        Remember me
                    </label>
                    <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>

            </div>
            <a href="{{route('register')}}}" class="text-center new-account">Create an account </a>
        </div>
    </div>
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

