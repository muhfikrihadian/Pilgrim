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
        <li><a href="{{ route('admin.companies') }}"><i class="material-icons">account_balance</i>Companies</a></li>
        <li><a href="{{route('admin.settings')}}"><i class="material-icons">settings</i>Settings</a></li>
    </ul>
    </div>
    <div class="col l9 s12">
      <div class="row margintopdp">
        <form class="col s12" action="{{ route('admin.employers.search') }}" method="POST">
          {{ csrf_field() }}
          <div class="row">
            <div class="input-field col l10 s12 ">
              <input id="icon_prefix" type="text" class="validate" name="search">
              <label for="icon_prefix">Nama</label>
            </div>
            <div class="col l2 s2">
              <button class="btn waves-effect waves-light margintopdp" type="submit">Cari
                <i class="material-icons right">search</i>
              </button>
            </div>
          </div>
        </form>
      </div>
      <ul class="collapsible popout" data-collapsible="accordion">
        @if(isset($employers))
          @foreach($employers as $employer)
            <li>
              <div class="collapsible-header">
                <img src="{{ asset('image/admin/user.png') }}" alt="" class="circle responsive-img usersavatar">
                <a class="usersname" href="index.html"> {{ $employer->full_name}}</a>
              </div>
              <div class="collapsible-body">          
                <a class="waves-effect waves-light btn" href="{{ route('admin.employers.profile', ['email' => $employer->email]) }}">LIHAT</a>
                <a class="red btn modal-trigger right" href="#deletepost">Hapus</a>
              </div>
            </li>
          @endforeach              
        @endif
      </ul>
<ul class="center pagination">
  <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
  <li class="active"><a href="#!">1</a></li>
  <li class="waves-effect"><a href="#!">2</a></li>
  <li class="waves-effect"><a href="#!">3</a></li>
  <li class="waves-effect"><a href="#!">4</a></li>
  <li class="waves-effect"><a href="#!">5</a></li>
  <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
</ul>
</div>
</div>

<div id="deletepost" class="modal">
      <div class="modal-content">
        <h5>Apakah Anda yakin akan menghapus user ini ?</h5>
        <p></p>
      </div>
      <div class="modal-footer">
        <a href="#!" class="green-text modal-action modal-close waves-effect waves-green btn-flat">YA</a>
        <a href="#!" class="red-text modal-action modal-close waves-effect waves-green btn-flat">TIDAK</a>
      </div>
    </div>
@endsection