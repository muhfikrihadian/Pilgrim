@extends('layouts.auth-app')
@section('title','- Employer Sign Up')
@section('content')
<div class="register-box-body">
    <div class="row">
        <div class="col l5 s12">
            <picture>
                <source media="(min-width: 768px)" srcset="{{url('assets/collaborate.jpg')}}">
                <img src="#" class="collaborate">
            </picture>
        </div>
        <div class="col l7 s12">
            <br>
            <h4 class="app-box-title"><b>EMPLOYER SIGN UP</b></h4>
            <h5 class="app-box-title">Welcome to Pilgrim!</h5>
            <br>
            <form class="form-horizontal" method="POST" action="{{ route('jobposter.register.submit') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="input-field{{ $errors->has('username') ? ' has-error' : '' }} col l12 s12">
                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>
                        <label for="username">Username</label>
                        @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field{{ $errors->has('full_name') ? ' has-error' : '' }} col l12 s12">
                        <input id="full_name" type="text" class="form-control" name="full_name" value="{{ old('full_name') }}" required>
                        <label for="full_name">Full Name</label>
                        @if ($errors->has('full_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('full_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field{{ $errors->has('phone_number') ? ' has-error' : '' }} col l6 s12">
                        <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required>
                        <label for="phone_number">Phone Number</label>
                        @if ($errors->has('phone_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="input-field{{ $errors->has('position_title') ? ' has-error' : '' }} col l6 s12">
                        <input id="position_title" type="text" class="form-control" name="position_title" value="{{ old('position_title') }}" required>
                        <label for="position_title">Position Title</label>
                        @if ($errors->has('position_title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('position_title') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }} col l12 s12">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        <label for="email">E-Mail Address</label>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>                    
                <div class="row">
                    <div class="input-field{{ $errors->has('password') ? ' has-error' : '' }} col l6 s12">
                        <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required>
                        <label for="password">Password</label>
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="input-field col l6 s12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        <label for="password-confirm">Confirm Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <p>By signing up you agree to Pilgrim's <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>. You also agree to receive subsequent email and third-party communications, which you may opt out of at any time.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col l6 s12">
                        <p>Already have an account?</p>
                        <a href="#">Login here!</a>
                    </div>
                    <div class="col l6 s12">
                        <button type="submit" class="waves-effect waves-light btn btn-round right arkademy-orange-background">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection