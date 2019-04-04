<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    
    <title>Pilgrim @yield('title')</title>

    <!-- CSS -->
    <link href="{{url('materialize/css/materialize.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{url('css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>

    <!-- Script -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{url('materialize/js/materialize.js')}}"></script>
    <script src="{{url('js/init.js')}}"></script>
</head>
<body class="app">
    <div class="fixed-navbar">
        <nav class="white" role="navigation">
            <div class="nav-wrapper container">
                <a href="{{ url('/') }}" class="brand-logo height-full">
                    <img src="{{url('assets/pilgrim.png')}}">
                </a>
                <ul class="right hide-on-med-and-down">
                    <li class="right">
                        <a href="{{ route('company.landing.page') }}">For Employers</a>
                    </li>
                </ul>
                <!-- MOBILE SIDEBAR -->
                <ul id="nav-mobile" class="side-nav">
                    @if (Route::has('login'))
                        @auth
                        
                        @else
                        <li>
                            <a href="{{ route('company.landing.page') }}" class="arkademy-blue-color"><b>For Employers</b></a>
                        </li>
                        @endauth
                    @endif
                </ul>
                <a href="#" data-activates="nav-mobile" class="arkademy-orange-color button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>
    </div>
    
    <section class="content">
        <div class="container">
            @yield('content')        
        </div>
    </section>

    <footer class="page-footer white black-text">
        <div class="container">
            <div class="row">
                <div class="col l3 s12">
                    <img src="{{url('assets/pilgrim.png')}}" style="width: 156px;">
                    <p class="black-text text-lighten-4">Pilgrim dibawah naungan Arkademy Tech Edu Platform adalah platform penyedia lowongan kerja khusus IT developer.</p>
                </div>
                <div class="col l3 s12">
                    <h5 class="heading-text uppercase arkademy-blue-color"><b>Job Seekers</b></h5>
                    <ul>
                        <li><a class="black-text text-lighten-3" href="#!">Jobs by Position</a></li>
                        <li><a class="black-text text-lighten-3" href="#!">Jobs by Location</a></li>
                        <li><a class="black-text text-lighten-3" href="#!">Jobs by Employers</a></li>
                    </ul>
                 </div>
                <div class="col l3 s12">
                    <h5 class="heading-text uppercase arkademy-blue-color"><b>Employers</b></h5>
                    <ul>
                        <li><a class="black-text text-lighten-3" href="#!">Job Ads</a></li>
                        <li><a class="black-text text-lighten-3" href="#!">Term of Use</a></li>
                    </ul>
                    <br>
                    <h5 class="heading-text uppercase arkademy-blue-color"><b>Ring Us</b></h5>
                    <ul>
                        <li><a class="black-text text-lighten-3" href="#!">hello@arkademy.com</a></li>
                    </ul>
                    <p>+6281260376789 (Alfademy)</p>
                </div>
                <div class="col l3 s12">
                    <h5 class="heading-text uppercase arkademy-blue-color"><b>Head Quarters</b></h5>
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
                <a href="https://www.facebook.com/"><i class="fab fa-facebook-f white-text right"></i></a>
                <a href="https://twitter.com/?lang=en"><i class="fab fa-twitter white-text right"></i></a>
                <a href="https://www.instagram.com/"><i class="fab fa-instagram white-text right"></i></a>
                <a href="https://plus.google.com/"><i class="fab fa-google-plus-g white-text right"></i></a>
                <a href="https://www.behance.net/"><i class="fab fa-behance white-text right"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>