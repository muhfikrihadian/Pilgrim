<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('materialize/css/materialize.min.css') }}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin.css') }}"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Admin Pilgrim</title>
    <link rel="shortcut icon" href="{{ asset('image/admin/Favico.ico') }}" />
</head>
<body>
  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper white">
        <a href="{{route('admin')}}"><img src="{{ asset('image/admin/pilgrim.png') }}" class="icon"></a> 
        <a href="#" data-activates="mobile-demo" class="button-collapse"><img src="Assets/menu.png" class="iconmenu"></a>
        <ul class="right hide-on-med-and-down">
          <li><a class="dropdown-button black-text" href="#!" data-activates="dropdown1">{{ Auth::user()->email }}<i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>
      <ul id="dropdown1" class="dropdown-content">
          <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Keluar</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
          </li>
      </ul>
  </div>
</nav>
</div>
<ul class="side-nav" id="mobile-demo">
    <li><a href="{{route('admin')}}"><i class="material-icons">home</i>Dashboard</a></li>
    <li><a href="{{route('admin.add')}}"><i class="material-icons">group_add</i>Add Admin</a></li>
    <li><a href="{{route('admin.recentjobs')}}"><i class="material-icons">refresh</i>Recent Jobs</a></li>
    <li><a href="{{route('admin.active')}}"><i class="material-icons">work</i>Active Jobs</a></li>
    <li><a href="{{route('admin.applicants')}}"><i class="material-icons">recent_actors</i>Job Seekers</a></li>
    <li><a href="{{route('admin.companies')}}"><i class="material-icons">account_balance</i>Employers</a></li>
    <li><a href="{{route('admin.settings')}}"><i class="material-icons">settings</i>Settings</a></li>
    <li><a href="login.html"><i class="material-icons">reply</i>Keluar</a></li>
</ul>
@yield('content')
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('materialize/js/materialize.min.js') }}"></script>
<script src="{{ asset('js/admin.js') }}"></script>

</body>
</html>