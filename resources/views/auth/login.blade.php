@extends('layouts.auth-app')
@section('title','- Login')
@section('content')
<div class="login-box-body">
    <div class="app-box-logo">
        <img src="{{url('assets/pilgrim.png')}}" style="width: 150px;">
    </div>
    <h5 class="app-box-title">Welcome to Pilgrim!</h5>
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }} col s12">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                <label for="email">E-Mail Address</label>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="input-field{{ $errors->has('password') ? ' has-error' : '' }} col s12">
                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required>
                <label for="password">Password</label>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <input type="checkbox" class="filled-in" id="filled-in-box"/>
                <label for="filled-in-box">Remember Me</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <button type="submit" class="waves-effect waves-light btn btn-round arkademy-orange-background right">Login</button>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <a href="{{ route('password.request') }}" class="right">Forgot password?</a>
            </div>
        </div>
    </form>
</div>
@endsection