<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

    <title>Pilgrim - Detail Vacancy</title>

    <!-- CSS -->
    <link href="{{url('materialize/css/materialize.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{url('css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>

    <!-- Script -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{url('materialize/js/materialize.js')}}"></script>
    <script src="{{url('js/init.js')}}"></script>
</head>
<body class="app">
    <nav class="white" role="navigation">
        <div class="nav-wrapper">
            <div class="container height-full">
                <a href="{{ url('/') }}" class="brand-logo height-full">
                    <img src="{{url('assets/pilgrim.png')}}">
                </a>                   
                <ul class="right hide-on-med-and-down right">
                    @if (Route::has('login'))
                        @auth           
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
                                <a href="{{ route('jobseeker.register') }}" class="waves-effect waves-light btn btn-round arkademy-orange-background">Sign Up</a>
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
                <!-- MOBILE SIDEBAR -->
                <ul id="nav-mobile" class="side-nav">
                    @if (Route::has('login'))
                        @auth
                        @if(Auth::user()->role == "3")
                        <li>
                            <a href="{{ route('jobseeker') }}" class="arkademy-blue-color"><b>For Job Seeker</b></a>
                        </li>
                        @elseif(Auth::user()->role == "2")                            
                        <li>
                            <a href="{{ route('jobposter') }}" class="arkademy-blue-color"><b>For Employer</b></a>
                        </li>
                        @elseif(Auth::user()->role == "1")
                        <li>
                            <a href="{{ route('admin') }}" class="arkademy-blue-color"><b>For Administrator</b></a>
                        </li>
                        @endif
                        @else
                        <li>
                            <a href="{{ route('company.landing.page') }}" class="arkademy-blue-color"><b>For Employers</b></a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}" class="arkademy-blue-color"><b>Login</b></a>
                        </li>
                        <li>
                            <a href="{{ route('jobseeker.register')}}" class="waves-effect waves-light btn btn-round arkademy-orange-background"><b>Sign Up</b></a>
                        </li>
                        @endauth
                    @endif
                </ul>
                <a href="#" data-activates="nav-mobile" class="arkademy-orange-color button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </div>
    </nav>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="dashboard-box-body">
                        <div class="row">
                        	<div class="col s12 m12 l3">
                        		<img src="{{asset('assets/pilgrim.png')}}" style="width: 70%;">
                        	</div>
                        	<div class="col s12 m12 l5">
                        		<h5 class="uppercase"><b>{{ $vacancy[0]->job_specialization }}</b></h5>
                        	</div>
                        	<div class="col s12 m12 l4">
                                @if (Route::has('login'))
                                @auth
                        		<label><i class="fas fa-dollar-sign teal-text"></i><span>
                                    @if($vacancy[0]->currency == "idr")
                                        Rp.
                                    @else 
                                        USD
                                    @endif
                                    {{ $vacancy[0]->sallary1 }} - {{ $vacancy[0]->sallary2 }}
                                </span></label><br><br>
                                @else
                        		
                                @endauth
                                @endif
                                <label><i class="fas fa-location-arrow teal-text"></i><span> {{ $vacancy[0]->work_location }}</span></label>
                        	</div>
                        </div>
                    </div>
            		<div class="dashboard-box-body">
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
    									$b = explode(';', $vacancy[0]->benefits);
    									foreach($b as $c) {
    										echo $c.' ';
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
                    <div class="row" style="padding: 0px 10px;">  
    					@if(Route::has('login'))                          	
    						@auth
    							@if(Auth::user()->role == "3")
    								<a href="{{ route('apply-or-saved', ['id' => $vacancy[0]->unique_id, 'email' => Auth::user()->email, 'status' => 'saved', 'employer_email' => $vacancy[0]->email]) }}" class="btn btn-round waves-light waves-effect col s12 m12 l6 arkademy-blue-background">Simpan Lowongan</a>
    								<a href="{{ route('apply-or-saved', ['id' => $vacancy[0]->unique_id, 'email' => Auth::user()->email, 'status' => 'applied', 'employer_email' => $vacancy[0]->email]) }}" class="btn btn-round waves-light waves-effect col s12 m12 l6 arkademy-orange-background">Apply</a>
    							@elseif(Auth::user()->role == "2")										
    								<!-- @if($company[0]->email == Auth::user()->email)
    									<a href="#" class="btn col s12 m12 l6 arkademy-orange-background">EDIT</a>
    								@else 
    									<a href="#" class="btn col s12 m12 l6 arkademy-orange-background disabled">EDIT</a>
    								@endif -->									
    							@endif
    					@else
    						<a href="{{route('login')}}" class="right btn btn-round waves-effect waves-light arkademy-orange-background">Login to see sallary</a>
    						@endauth
    					@endif
                    </div>
            	</div>
            </div>
        </div>
    </section>
    <footer class="page-footer footer-welcome white black-text">
        <div class="contact-footer container">
            <div class="row">
                <div class="col l3 s12">
                    <img src="{{url('assets/pilgrim.png')}}" style="width: 156px;">
                    <p class="black-text text-lighten-4">Pilgrim dibawah naungan Arkademy Tech Edu Platform adalah platform penyedia lowongan kerja khusus IT developer.</p>
                </div>
                <div class="col l3 s12">
                    <h5 class="uppercase arkademy-blue-color"><b>Job Seekers</b></h5>
                    <ul>
                        <li><a class="black-text text-lighten-3" href="#!">Jobs by Position</a></li>
                        <li><a class="black-text text-lighten-3" href="#!">Jobs by Location</a></li>
                        <li><a class="black-text text-lighten-3" href="#!">Jobs by Employers</a></li>
                    </ul>
                 </div>
                <div class="col l3 s12">
                    <h5 class="uppercase arkademy-blue-color"><b>Employers</b></h5>
                    <ul>
                        <li><a class="black-text text-lighten-3" href="#!">Job Ads</a></li>
                        <li><a class="black-text text-lighten-3" href="#!">Term of Use</a></li>
                    </ul>
                    <br>
                    <h5 class="uppercase arkademy-blue-color"><b>Contact Us</b></h5>
                    <ul>
                        <li><p>+628111848182</p></li>
                        <li><a class="black-text text-lighten-3" href="#!">hello@arkademy.com</a></li>
                    </ul>
                </div>
                <div class="col l3 s12">
                    <h5 class="uppercase arkademy-blue-color"><b>Head Quarters</b></h5>
                    <p>Jakarta Digital Valley</p>
                    <p>Menara Multimedia Lt.6</p>
                    <p>Jl. Kebon Sirih No. 10 - 12</p>
                    <p>Gambir, Jakarta Pusat</p>
                    <p>10110, Indonesia</p>
                    <ul>
                        <li><a class="arkademy-blue-color text-lighten-3" href="https://www.google.co.id/maps/place/Menara+Multimedia,+Jl.+Kebon+Sirih+No.12,+Gambir,+Kota+Jakarta+Pusat,+Daerah+Khusus+Ibukota+Jakarta+10110/@-6.1824222,106.8280521,17z/data=!3m1!4b1!4m5!3m4!1s0x2e69f431e664766b:0x53289330ec68c3c1!8m2!3d-6.1824193!4d106.8302364?hl=en">Google Maps</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright arkademy-yellow-background">
            <div class="container">
                © 2018 Copyright <b>Pilgrim</b>
                <a href="https://www.facebook.com/" class="hide-on-med-and-down"><i class="fab fa-facebook-f white-text right"></i></a>
                <a href="https://twitter.com/?lang=en" class="hide-on-med-and-down"><i class="fab fa-twitter white-text right"></i></a>
                <a href="https://www.instagram.com/" class="hide-on-med-and-down"><i class="fab fa-instagram white-text right"></i></a>
                <a href="https://plus.google.com/" class="hide-on-med-and-down"><i class="fab fa-google-plus-g white-text right"></i></a>
                <a href="https://www.behance.net/" class="hide-on-med-and-down"><i class="fab fa-behance white-text right"></i></a>
            </div>
        </div>
    </footer>

    <!-- Script -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('materialize/js/materialize.min.js') }}"></script>    
    <script src="{{ asset('js/init.js') }}"></script>
</body>
</html>