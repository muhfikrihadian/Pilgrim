<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

    <title>Pilgrim</title>

    <!-- CSS -->
    <link href="{{url('materialize/css/materialize.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{url('css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
</head>
<body>
	<header class="home-no-banner">
		<nav>
			<div class="nav-wrapper">
				<div class="container height-full">
					<a href="{{ url('/') }}" class="brand-logo height-full">
						<img src="{{url('assets/pilgrim.png')}}">
					</a>                    
					<ul class="right hide-on-med-and-down right">
						@if (Route::has('login'))                            
							@auth                                     
							<!-- Check the role -->
							@if(Auth::user()->role == "3")
								<li class="right">
									<a href="{{ route('jobseeker') }}">For Job Seeker</a>
								</li>
							@elseif(Auth::user()->role == "2")                            
								<li class="right">
									<a href="{{ route('jobposter') }}">For Employer</a>
								</li>
							@elseif(Auth::user()->role == "1")
								<li class="right">
									<a href="{{ route('admin') }}">For Administrator</a>
								</li>
							@endif

							@else
							<li class="right">
								<a href="{{ route('jobseeker.register') }}" class="btn btn-nav btn-round">Sign Up</a>
							</li>
							<li class="right">
								<a href="{{ route('login') }}">Login</a>
							</li>
							<li class="right">
								<a href="{{ route('company.landing.page') }}">For Employers</a>
							</li>
							@endauth
						@endif
					</ul>
					<ul id="nav-mobile" class="side-nav">
						@if (Route::has('login'))
							@auth

							<!-- Check the role -->
							@if(Auth::user()->role == "3")
								<li>
									<a href="{{ route('jobseeker') }}">For Job Seeker</a>
								</li>
							@elseif(Auth::user()->role == "2")                            
								<li>
									<a href="{{ route('jobposter') }}">For Employer</a>
								</li>
							@elseif(Auth::user()->role == "1")
								<li>
									<a href="{{ route('admin') }}">For Administrator</a>
								</li>
							@endif

							@else
							<li>
								<a href="https://arkademy.com/" class="btn btn-nav btn-round">Sign Up</a>
							</li>
							<li>
								<a href="{{ route('login') }}">Login</a>
							</li>
							<li>
								<a href="{{ route('company.landing.page') }}">For Employers</a>
							</li>
							@endauth
						@endif
					</ul>
					<a href="#" data-activates="nav-mobile" class="arkademy-orange-color button-collapse"><i class="material-icons">menu</i></a>
				</div>
			</div>
		</nav>
	</header>
	<section class="content">
		<div class="container">
				<div class="row">
					<div class="col s12">
						<div class="dashboard-box">
							<div class="app-box-body">
								<div class="row">
									<div class="col s12 m12 l3">
										<img src="{{ url('image/company/'.$company[0]->banner_image) }}" style="width: 70%;">
									</div>
									<div class="col s12 m12 l5">
										<h5 class="uppercase"><b>{{ $vacancy[0]->job_specialization }}</b></h5>
									</div>
									<div class="col s12 m12 l4">
										<label><i class="fas fa-dollar-sign"></i>
											<?php
												if($vacancy[0]->currency == "idr") {
													echo "IDR ".$vacancy[0]->sallary1." - ".$vacancy[0]->sallary2;
												}
												else if($vacancy[0]->currency == "usd") {
													echo "USD ".$vacancy[0]->sallary1." - ".$vacancy[0]->sallary2;
												}
											?>
										</label><br><br>
										<label><i class="fas fa-location-arrow"></i>{{ $vacancy[0]->work_location }}</label>
									</div>
								</div>
							</div>
						</div>
						<div class="dashboard-box">
							<div class="app-box-body">
								<div class="row">
									<div class="col l2 s6" style="color:black;">
										<p>Company Name :</p>
										<p>Skills :</p>
										<p>Benefits :</p>
									</div>
									<div class="col l4 s6">
										<p>{{ $company[0]->company_name }}</p>
										<p>{{ $vacancy[0]->skills }}</p>
										<p>
											<?php
												if(isset($vacancy[0]->benefits)) {
													$benefits = explode(';', $vacancy[0]->benefits);
													$count = count($benefits);

													for($i = 1; $i < count($benefits); $i++) {
														if($benefits[$i] == $benefits[$count - 1]) {
															echo $benefits[$i];

															break;
														}
														echo $benefits[$i].', ';
													}
												}
											?>
										</p>
									</div>
									<div class="col l2 s6" style="color: black;">
										<p>Company Description :</p>
										<p>Language :</p>
										<p>Notes :</p>
									</div>
									<div class="col l4 s6">
										<p>{{ $company[0]->other_description }}</p>
										<p>{{ $vacancy[0]->language }}</p>
										<p>{{ $vacancy[0]->notes }}</p>
									</div>
								</div>
							</div>
						</div>
						<div class="dashboard-box">
							<div class="app-box-body">
								<div class="row">
									<a href="#" class="btn col s12 m12 l6 arkademy-blue-background">Terima</a>
									<a href="#" class="btn col s12 m12 l6 arkademy-orange-background">Hapus</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</section>
</body>