@extends('layouts.poster-app')
@section('title','- Company Profile')
@section('content')
<section class="content">
	<div class="container">
		<div class="row">
			<div class="dashboard-box-body">
				<div class="row">
                    <div class="col s12 right-align">
                        <a href="{{ route('company.profile.edit') }}"><i class="far fa-edit fa-2x grey-text right"></i></a>
<!--                         <a href="#"><i class="far fa-share-square fa-2x grey-text right"></i></a> -->
                    </div>
                </div>
				<div class="row center">
					<div class="col s12">
						<!-- Company Banner -->
						<img src="{{url('image/company/'.Auth::user()->companyProfile->banner_image)}}" style="margin-top: 30px; margin-bottom: 30px; width: 200px;">
						<h4 class="black-text">
							<!-- Company Name -->
							<b>{{ Auth::user()->companyProfile->company_name }}</b>
						</h4>
						<h5 class="black-text" style="margin-bottom: 40px;">
							<!-- Company Main Sector -->
							<b>{{ Auth::user()->companyProfile->product_description }}</b>
						</h5>
						<hr>
                        <p> <!-- Company Description -->
                            <i>{{ Auth::user()->companyProfile->other_description }}</i>
                        </p>
					</div>
				</div>
            </div>
			<div class="dashboard-box-body">
                <div class="row">
                	<div class="col l6 s6">
                        <h6><b>COMPANY PROFILE</b></h6>
                    </div>
                </div>
                <div class="row">
                	<div class="col l2 s6" style="color: black; font-size: 1.1rem;">
                        <p>Company Web</p>
                        <p>Number</p>
                        <p>Company Email</p>
                    </div>
                    <div class="ellipsis col l4 s6" style="font-size: 1.1rem;">
                        <p>{{ Auth::user()->companyProfile->web }}</p>
                        <p>{{ Auth::user()->companyProfile->phone_number }}</p>
                        <p>{{ Auth::user()->companyProfile->company_email }}</p>
                    </div>
                    <div class="col l2 s6" style="color: black; font-size: 1.1rem;">
                    	<p>Address</p>
                        <p>Company Size</p>
                    </div>
                    <div class="ellipsis col l4 s6" style="font-size: 1.1rem;">
                        <p>{{ Auth::user()->companyProfile->address }}</p>
                        <p>{{ Auth::user()->companyProfile->employee_number }}</p>
                    </div>
                </div>
            </div>	
		</div>
	</div>
</section>
@endsection