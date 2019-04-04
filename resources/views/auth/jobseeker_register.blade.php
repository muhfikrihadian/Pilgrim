@extends('layouts.auth-app')
@section('title','- Register Job Applicant')
@section('content')
<div class="register-box-body">
    <div class="app-box-logo">
        <img src="{{url('assets/pilgrim.png')}}" style="width: 150px;">
    </div>
    <h5 class="app-box-title">Register Now, It's FREE!</h5>
    <form class="form-horizontal" method="POST" action="{{ route('jobseeker.register.submit') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="input-field{{ $errors->has('first_name') ? ' has-error' : '' }} col l6 s12">
                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>
                <label for="first_name">First Name</label>
                @if ($errors->has('first_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </span>
                @endif
            </div>
            <div class="input-field{{ $errors->has('last_name') ? ' has-error' : '' }} col l6 s12">
                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                <label for="last_name">Last Name</label>
                @if ($errors->has('last_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('last_name') }}</strong>
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
            <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }} col l6 s12">
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
@endsection