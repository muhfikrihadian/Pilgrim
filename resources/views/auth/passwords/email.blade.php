@extends('layouts.auth-app')
@section('title','- Reset Password')
@section('content')
<div class="login-box-body">
    <div class="app-box-logo">
        <img src="{{url('assets/pilgrim.png')}}" style="width: 150px;">
    </div>
    <h5 class="app-box-title">Reset your Pilgrim password?</h5>
    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
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
        </div>
        <div class="row">
            <button type="submit" class="btn btn-round waves-effect waves-light arkademy-orange-background">
                Send Password Reset Link
            </button>
        </div>
    </form>
</div>
@endsection
