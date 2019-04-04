@extends('layouts.admin-app')

@section('content')

  <div class="row">
    <div class="col l3">
      <ul id="slide-out" class="side-nav fixed leftside">
        <li><a href="{{route('admin')}}"><i class="material-icons">home</i>Dashboard</a></li>
        <li><a href="{{route('admin.add')}}"><i class="material-icons">group_add</i>Add Admin</a></li>
        <li><a href="{{route('admin.recentjobs')}}"><i class="material-icons">refresh</i>Recent Jobs</a></li>
        <li><a href="{{route('admin.active')}}"><i class="material-icons">work</i>Active Jobs</a></li>
        <li><a href="{{route('admin.applicants')}}"><i class="material-icons">recent_actors</i>Job Seekers</a></li>
        <li><a href="{{route('admin.employers')}}"><i class="material-icons">contacts</i>Employers</a></li>
        <li><a href="{{route('admin.companies')}}"><i class="material-icons">account_balance</i>Companies</a></li>
        <li><a href="{{route('admin.settings')}}"><i class="material-icons">settings</i>Settings</a></li>
    </ul>
    </div>
    
    <div class="col l9 s12">

      <ul class="collapsible popout" data-collapsible="accordion">

        <li>
          <div class="collapsible-header l2"><i class="material-icons">email</i>Ganti Email
          </div>
          <div class="collapsible-body">
            <div class="row">
              <form class="col s12">
                <div class="row col l10 offset-l1">
                  <div class="input-field col l12 s12">
                    <input id="name" type="text" class="validate">
                    <label for="newusername">Email Baru</label>
                  </div>
                  <div class="input-field col l12 s12">
                    <input id="password" type="password" class="validate">
                    <label for="password">Password</label>
                  </div>
                  <a class="btn bluearka">SUBMIT</a>
                </div>
              </form>
            </div>
          </div>
        </li>

        <li>
          <div class="collapsible-header l2"><i class="material-icons">lock</i>Ganti Password
          </div>
          <div class="collapsible-body">
            <div class="row">
              <form class="col s12">
                <div class="row col l10 offset-l1">
                  <div class="input-field col l12 s12">
                    <input id="oldpassword" type="text" class="validate">
                    <label for="oldpassword">Password Lama</label>
                  </div>
                  <div class="input-field col l12 s12">
                    <input id="newpassword" type="password" class="validate">
                    <label for="newpassword">Password</label>
                  </div>
                  <div class="input-field col l12 s12">
                    <input id="konpassword" type="password" class="validate">
                    <label for="konpassword">Konfirmasi Password</label>
                  </div>
                  <a class="btn bluearka">SUBMIT</a>
                </div>
              </form>
            </div>
          </div>
        </li>
      </ul>
    </div>

  </div>
@endsection
