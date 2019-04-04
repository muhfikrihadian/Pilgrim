<!DOCTYPE html>
<html lang="en">
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
    <script src="http://maps.googleapis.com/maps/api/js?libraries=places"></script>
</head>
<body class="app">
    <nav class="white" role="navigation">
        <div class="nav-wrapper">
            <div class="container height-full">
                <a href="{{ url('/') }}" class="brand-logo height-full">
                    <img src="{{url('assets/pilgrim.png')}}">
                </a>
                <ul class="center hide-on-med-and-down" style="margin-left: 150px;">
                    @if (Route::has('login'))
                    @auth
                    <li><a href="{{route('jobposter.ads')}}">Jobs</a></li>
                    <li><a href="{{route('talentsearch')}}">Talent Search</a></li>
                    @else
                    @endauth
                    @endif
                </ul>
                <ul class="right hide-on-med-and-down right">
                    @if (Route::has('login'))
                    @auth
                    <!-- Dropdown Trigger -->
                    <li><a href="{{url('employer')}}"><i class="fas fa-home"></i></a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="notification-dropdown"><i class="far fa-bell right"></i><small class="notification-badge">5</small></a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="user-dropdown">{{ Auth::user()->jobposterProfile->username }}<i class="material-icons right">arrow_drop_down</i></a></li>
                    @else
                    @endauth
                    @endif
                </ul>
                <!-- MOBILE SIDEBAR -->
                <ul id="nav-mobile" class="side-nav">
                    @if (Route::has('login'))
                    <li><a href="{{route('jobposter.ads')}}">Jobs</a></li>
                    <li><a href="#!">Settings</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                    </li>
                    @auth
                    @else
                    
                    @endauth
                    @endif
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons arkademy-orange-color">menu</i></a>
            </div>
        </div>
    </nav>
    <ul id="user-dropdown" class="dropdown-content">
        <li><a href="{{route('company.profile')}}">Company Profile</a></li>
        <li class="divider"></li>
        <li>
            <a href="{{ route('logout') }}" class="grey-text" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
        </li>
    </ul>
    <ul id="notification-dropdown" class="dropdown-content notification-dropdown">
        <li><a href="#!"><i class="fas fa-user"></i><span class="badge" data-badge-caption="saved your vacancy">Shabrina Fitri</span></a></li>
        <li><a href="#!"><i class="fas fa-user"></i><span class="badge" data-badge-caption="applied your vacancy">Franklin Tamboto</span></a></li>
        <li><a href="#!"><i class="fas fa-user"></i><span class="badge" data-badge-caption="un-saved your vacancy">Shabrina Fitri</span></a></li>
        <li><a href="#!"><i class="fas fa-user"></i><span class="badge" data-badge-caption="canceled his application">Franklin Tamboto</span></a></li>
    </ul>
</div>

@include('flash_message')
@yield('content')

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
                    <li><p>+628111848182</p></li>
                    <li><a class="black-text text-lighten-3" href="#!">hello@arkademy.com</a></li>
                </ul>
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
<div id="modalnotif" class="modal modal-fixed-footer">
    <div class="modal-content" id="notif-content">
      <h4 id="notif-title"></h4>
      <p id="notif-data"></p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
    </div>
  </div>

@if(Route::has('login')) 
    <script src="{{ url('js/employer.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){                
            $.ajax({url: "<?php echo url('/employer/notification/'.Auth::user()->jobposterProfile->email); ?>", success: function(result){                
                for(var i = 0; i < result.length; i++) {
                    $('#notification-dropdown').append('<li><a onClick=\'setNotifDesc(\"' + result[i].notif_description + ', ' + result[i].notif_data + '\")\'>' + result[i].notif_description + '</a></li>');
                }
            }});
        });

        function setNotifDesc(notifDesc, notifData) {
            // alert('Email: ' + email);
            $('#modalnotif').modal('open');
            
            $('#modalnotif #notif-content #notif-title').empty();
            $('#modalnotif #notif-content #notif-data').empty();            

            $('#modalnotif #notif-content #notif-title').append(notifDesc);
            $('#modalnotif #notif-content #notif-data').append(notifData);
        }
    </script>
@endif
</body>
</html>