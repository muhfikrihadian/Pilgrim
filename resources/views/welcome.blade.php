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
    <header class="home">
        <nav>
            <div class="nav-wrapper">
                <div class="container height-full">
                    <a href="{{ url('/') }}" class="brand-logo height-full">
                        <picture>
                            <source media="(min-width: 769px)" srcset="{{ asset('assets/WhitePilgrim.png') }}">
                            <source media="(max-width: 768px)" srcset="{{ asset('assets/pilgrim.png') }}">
                            <img src="{{ asset('assets/pilgrim.png') }}">
                        </picture>
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
        <div class="container center">
            <h1 class="uppercase hide-on-med-and-down">find what you love</h1>
            <h2 class="uppercase hide-on-large-only">find what you love</h2>
            <p class="hide-on-med-and-down">Explore jobs, internships and other opportunities!</p>
            <div class="row" style="margin-top: 30px;">
                <form method="POST" action="{{ url('search-result') }}">
                    {{ csrf_field() }}
                    <div class="input-field col s12">
                        <select class="col s12 l4" name="search_type">
                            <option value="Internship">Internship</option>
                            <option value="Full-time">Full-time</option>
                            <option value="Contract">Contract</option>
                            <option value="Remote">Remote</option>
                            <option value="Project Base">Project Base</option>
                        </select>
                        <div class="search-field">
                            <input placeholder="Job Specialization" type="search" class="browser-default position-autocomplete" name="search_position">
                            <button type="submit" class="btn-floating z-depth-0 arkademy-orange-background" onclick=""><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </header>
    <section class="timeline">
        <h3 class="arkademy-orange-color center"><b>How it works?</b></h3>
        <div class="container">
            <div class="timeline-content">
                <div class="img-timeline">
                    <img class="animated" src="{{asset('assets/step 1-01.png')}}">
                </div>
                <div class="each-description">
                    <h1 class="animated">Create your profile with <a href="https://arkademy.com/" class="arkademy-orange-color">Arkademy</a></h1>
                    <p class="animated">Build your professional identity online and stay connected with opportunities.</p>
                </div>
            </div>
            <div class="timeline-content">
                <div class="img-timeline">
                    <img class="animated" src="{{asset('assets/step 2-01.png')}}">
                </div>
                <div class="each-description">
                    <h1 class="animated">Find what you love!</h1>
                    <p class="animated">Log in to your Pilgrim account and explore opportunities including jobs and internships that match you.</p>
                </div>
            </div>
            <div class="timeline-content">
                <div class="img-timeline">
                    <img class="animated" src="{{asset('assets/step 3-01.png')}}">
                </div>
                <div class="each-description">
                    <h1 class="animated">Run the show!</h1>
                    <p class="animated">Compare opportunities side and click "Apply" to the one that best match your career goals.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="content hide-on-large-only grey lighten-2" style="padding: 20px;">
        <div class="container center">
            <h5 class="uppercase" style="color: #404C60;"><b>what is pilgrim?</b></h5>
            <p style="color: #9D9D9D !important;">Pilgrim is an employment marketplace platform specifically for IT developers. Powered by Arkademy Tech Edu Platform, Pilgrim provide the best rookie talent in technology.</p>
        </div>
    </section>
    <section class="content hide-on-large-only background-image" style="background-image: url('../assets/banner-code.jpg'); height: 30vh;">
    </section>
    <section class="content hide-on-med-and-down background-image" style="background-image: url('../assets/banner-code.jpg'); height: 50vh;">
        <div class="container">
            <div class="row">
                <div class="col s5 offset-s7" style="transform: translateY(50%);">
                    <h3 class="uppercase white-text"><b>what is pilgrim?</b></h3>
                    <p class="white-text">Pilgrim is an employment marketplace platform specifically for IT developers. Powered by Arkademy Tech Edu Platform, Pilgrim provide the best rookie talent in technology.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="content" style="margin: 30px 0px;">
        <div class="container">
            <div class="row">
                <ul class="tabs center">
                    <li class="tab"><a class="active arkademy-blue-color" href="#tabs1"><b>Latest Vacancy</b></a></li>
                    <li class="tab"><a href="#tabs2" class="arkademy-blue-color"><b>Most Popular Vacancies</b>
                    </a></li>
                    <li class="indicator arkademy-blue-background"></li>
                </ul>
            </div>
            <div id="tabs1" class="col s12">
                <div class="row">
                    @foreach($openJob as $job)                    
                        @if($job->employment_type != 3)
                        <div class="col l3 s12">
                            <div class="card medium">
                                <div class="card-image">
                                    <img src="{{ url('image/company/'.$job->banner_image) }}" class="card-img">
                                </div>
                                <div class="card-content">
                                    <h5><b>{{ $job->job_specialization }}</b></h5>
                                    <p class="arkademy-blue-color"><b>{{ $job->employment_type }}</b></p>
                                    <p class="right-align"><b>{{ $job->work_location }}</b><br></p><br>
                                    <dfn>"{{ $job->notes }}"</dfn>
                                </div>
                                <div class="card-action">
                                    <label>{{ $job->created_at }}</label>
                                    <label class="right"><a href="{{ url('vacancy-detail', ['id' => $job->unique_id]) }}"><b>Detail</b></a></label>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col s12" id="tabs2">
                <div class="row">
                    @foreach($openJob as $job)                    
                        @if($job->employment_type != 3)
                        <div class="col l3 s12">
                            <div class="card medium">
                                <div class="card-image">
                                    <img src="{{ url('image/company/'.$job->banner_image) }}" class="card-img">
                                </div>
                                <div class="card-content">
                                    <h5><b>{{ $job->job_specialization }}</b></h5>
                                    <p class="arkademy-blue-color"><b>{{ $job->employment_type }}</b></p>
                                    <p class="right-align"><b>{{ $job->work_location }}</b><br></p><br>
                                    <dfn>"{{ $job->notes }}"</dfn>
                                </div>
                                <div class="card-action">
                                    <label class="left">{{ $job->created_at }}</label>
                                    <label class="right"><a href="{{ url('vacancy-detail', ['id' => $job->unique_id]) }}"><b>Detail</b></a></label>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="row">
                <ul class="tabs center">
                    <li class="tab"><a class="active arkademy-blue-color" href="#tabs3"><b>Latest Internship</b></a></li>
                    <li class="tab"><a href="#tabs4" class="arkademy-blue-color"><b>Most Popular Internship</b>
                    </a></li>
                    <li class="indicator arkademy-blue-background"></li>
                </ul>
            </div>
            <div class="col s12" id="tabs3">
                <div class="row">
                    @foreach($openJob as $job)                    
                        @if($job->employment_type == "Internship")
                        <div class="col l3 s12">
                            <div class="card medium">
                                <div class="card-image">
                                    <img src="{{ url('image/company/'.$job->banner_image) }}" class="card-img">
                                </div>
                                <div class="card-content">
                                    <h5><b>{{ $job->job_specialization }}</b></h5>
                                    <p class="arkademy-blue-color"><b>{{ $job->employment_type }}</b></p>
                                    <p class="right-align"><b>{{ $job->work_location }}</b><br></p><br>
                                    <dfn>"{{ $job->notes }}"</dfn>
                                </div>
                                <div class="card-action">
                                    <label>{{ $job->created_at }}</label>
                                    <label class="right"><a href="{{ url('vacancy-detail', ['id' => $job->unique_id]) }}"><b>Detail</b></a></label>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col s12" id="tabs4">
                <div class="row">
                    @foreach($openJob as $job)                    
                        @if($job->employment_type != 3)
                        <div class="col l3 s12">
                            <div class="card medium">
                                <div class="card-image">
                                    <img src="{{ url('image/company/'.$job->banner_image) }}" class="card-img">
                                </div>
                                <div class="card-content">
                                    <h5><b>{{ $job->job_specialization }}</b></h5>
                                    <p class="arkademy-blue-color"><b>{{ $job->employment_type }}</b></p>
                                    <p class="right-align"><b>{{ $job->work_location }}</b><br></p><br>
                                    <dfn>"{{ $job->notes }}"</dfn>
                                </div>
                                <div class="card-action">
                                    <label>{{ $job->created_at }}</label>
                                    <label class="right"><a href="{{ url('vacancy-detail', ['id' => $job->unique_id]) }}"><b>Detail</b></a></label>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="content partner grey lighten-2">
        <div class="container center">
            <h5 style="padding: 50px; margin: 0;"><b>We are blessed to work with leading companies</b></h5>
            <div class="carousel hide-on-large-only" style="transform: translateY(-15%);">
                <a class="carousel-item" href="#one!"><img src="{{ asset('assets/companies/amoeba.png') }}"></a>
                <a class="carousel-item" href="#two!"><img src="{{ asset('assets/companies/code_margonda.png') }}"></a>
                <a class="carousel-item" href="#three!"><img src="{{ asset('assets/companies/impact_byte.png') }}"></a>
                <a class="carousel-item" href="#four!"><img src="{{ asset('assets/companies/indigo.png') }}"></a>
            </div>
            <div class="row hide-on-med-and-down">
                <div class="col s3">
                    <img src="{{ asset('assets/companies/amoeba.png') }}" class="partner-img animated">
                </div>
                <div class="col s3">
                    <img src="{{ asset('assets/companies/code_margonda.png') }}" class="partner-img animated">
                </div>
                <div class="col s3">
                    <img src="{{ asset('assets/companies/impact_byte.png') }}" class="partner-img animated">
                </div>
                <div class="col s3">
                    <img src="{{ asset('assets/companies/indigo.png') }}" class="partner-img animated">
                </div>
            </div>
        </div>
        <div class="footer-less center hide-on-med-and-down background-image-footer" style="background-image: url('assets/banner-footer.jpg');">
            <div class="row height-full" style="margin: 0 !important;">
                <div class="col s12 height-full" style="transform: translateY(115px);">
                    <h5 class="uppercase white-text"><b>There's a better way to find work you love.</b></h5>
                    <a href="{{ route('jobseeker.register')}}" class="waves-effect waves-light btn btn-round arkademy-orange-background">sign up</a>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('input.position-autocomplete').autocomplete({
                data: {
                    <?php
                        foreach($openJob as $openVacancy) {
                    ?>
                        "<?php echo $openVacancy->job_specialization; ?>" : "<?php echo $openVacancy->job_specialization; ?>",
                    <?php
                        }
                    ?>
                },
                limit: 20, 
                onAutocomplete: function(val) {
                },
                minLength: 1,
            });
        });
    </script>
</body>
</html>