@extends('layouts.master')

@section('title')
    Login
@endsection

@section('header')
    @include('includes.headers.admin-login')
@endsection

@section('content')
    @include('includes.errors_message')
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Admin login</h1>
            <div class="login-form">
                <img class="profile-img"
                     src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                     alt="">

                <form class="form-signin" method="post" action="{{route('admin.login.submit')}}">
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
                    <a href="{{route('admin.password.request')}}" class="pull-right need-help">Forgot your password?</a><span class="clearfix"></span>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('includes.footer_default')
@endsection

