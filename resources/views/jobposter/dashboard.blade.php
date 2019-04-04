@extends('layouts.poster-app')
@section('title','Dashboard Employer')
@section('content')
<section class="content">
	<div class="container">
        <div class="dashboard-box-body arkademy-blue-color">
        	<h5>Hi {{ Auth::user()->jobposterProfile->username }}! Welcome to Pilgrim for Employer</h5>
        	<div class="dashboard-box-body arkademy-blue-background">
        		<h6 class="white-text"><b>What would you like to do?</b></h6>
        		<div class="row center">
        			<div class="col s12 m6 l6">
        				<a href="{{route('jobposter.ads')}}">
        					<div class="dashboard-box-body white arkademy-blue-color">
	        					<div class="row" style="margin-bottom: 20px;">
	        						<i class="fas fa-7x fa-briefcase"></i>
	        					</div>
	        					<h5><b>Job Ads</b></h5>
	        				</div>
        				</a>
        			</div>
        			<div class="col s12 m6 l6">
        				<a href="{{route('talentsearch')}}">
        					<div class="dashboard-box-body white arkademy-blue-color">
	        					<div class="row" style="margin-bottom: 20px;">
	        						<i class="fas fa-7x fa-search"></i>
	        					</div>
	        					<h5><b>Talent Search</b></h5>
	        				</div>
        				</a>
        			</div>
        		</div>
        	</div>
        </div>
    </div>    
</section>
@endsection