<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

    <title>Pilgrim - Employer Page</title>

    <!-- CSS -->
    <link href="{{url('materialize/css/materialize.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{url('css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
</head>
<body>
    <header id="employer" class="home">
        <nav>
            <div class="nav-wrapper">
                <div class="container height-full">
                    <a href="{{ url('/') }}" class="brand-logo height-full">
                        <picture>
                            <source media="(min-width: 769px)" srcset="{{ asset('assets/WhitePilgrim.png') }}" style="width: 100px;">
                            <source media="(max-width: 768px)" srcset="{{ asset('assets/pilgrim.png') }}" style="width: auto;">
                            <img src="{{ asset('assets/pilgrim.png') }}">
                        </picture>
                    </a>
                    <ul class="right hide-on-med-and-down right">
                    @if (Route::has('login'))
                        @auth
                        <li>
                            <a href="{{ route('jobposter') }}">Dashboard Employers</a>
                        </li>
                        @else
                        <li class="right">
                            <a href="{{route('jobposter.register')}}" class="btn btn-round btn-nav arkademy-orange-background">Sign Up</a>
                        </li>
                        <li class="right">
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                        @endauth
                    @endif
                    </ul>
                    <!-- MOBILE SIDEBAR -->
                    <ul id="nav-mobile" class="side-nav">
                    @if (Route::has('login'))
                        @auth
                        @if(Auth::user()->role == "3")

                        @elseif(Auth::user()->role == "2")                            
                        <li>
                            <a href="{{ route('jobposter') }}" class="arkademy-blue-color"><b>Dashboard Employers</b></a>
                        </li>
                        @elseif(Auth::user()->role == "1")
                        
                        @endif
                        @else
                        <li>
                            <a href="{{ route('login') }}" class="arkademy-blue-color"><b>Login</b></a>
                        </li>
                        <li class="right">
                            <a href="{{route('jobposter.register')}}" class="btn btn-round btn-nav arkademy-orange-background">Sign Up</a>
                        </li>
                        @endauth
                    @endif
                    </ul>
                    <a href="#" data-activates="nav-mobile" class="arkademy-orange-color button-collapse"><i class="material-icons">menu</i></a>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col s7 pull s5">
                    <h1 class="uppercase">Hire top kick ass talent</h1>
                    <p class="hide-on-med-and-down">Hire your next rising star with Pilgrim. Only the best young talent, surfaced by algorithms, handpicked by our recruiters, ready to join you.</p>
                </div>
            </div>
            <div class="row">
                <div class="col s7 pull s5">
                    <a href="{{route('jobposter.register')}}" class="waves-effect waves-light btn btn-round arkademy-orange-background">start hiring!</a>
                </div>
            </div>
        </div>
    </header>
    <section class="content">
        <div class="container center">
            <h3 class="arkademy-orange-color" style="padding: 30px; margin: 0;"><b>Why Pilgrim?</b></h3>
            <div class="row arkademy-blue-color" style="margin-bottom: 30px;">
                <div class="col s12 m12 l4">
                    <img src="{{asset('assets/why 1-01.png')}}" style="width: 150px;">
                    <h5><b>Talented developer with actual data</b></h5>
                </div>
                <div class="col s12 m12 l4">
                    <img src="{{asset('assets/why 2-01.png')}}" style="width: 150px;">
                    <h5><b>Widest vocational school network in Indonesia</b></h5>
                </div>
                <div class="col s12 m12 l4">
                    <img src="{{asset('assets/why 3-01.png')}}" style="width: 150px;">
                    <h5><b>Comprehensive skill of developer</b></h5>
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
                    <h5 class="uppercase white-text"><b>Interested? We're here to assist you.</b></h5>
                    <a href="{{route('jobposter.register')}}" class="waves-effect waves-light btn btn-round arkademy-orange-background">sign up</a>
                </div>
            </div>
        </div>
    </section>
    <footer class="page-footer footer-welcome white black-text">
        <div class="container">
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
                    <h5 class="uppercase arkademy-blue-color"><b>Ring Us</b></h5>
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
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="{{url('materialize/js/materialize.js')}}"></script>
    <script src="{{url('js/init.js')}}"></script>
</body>
</html>
