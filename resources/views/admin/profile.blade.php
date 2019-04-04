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
        <li><a href="{{route('admin.companies')}}"><i class="material-icons">contacts/i>Employers</a></li>
        <li><a href="{{route('admin.companies')}}"><i class="material-icons">account_balance</i>Companies</a></li>
        <li><a href="{{route('admin.settings')}}"><i class="material-icons">settings</i>Settings</a></li>
    </ul>
    </div>

    <div class="col l9 s12">
      <div class="row">
        <div class="col l10 offset-l1 s12">
          <div class="col l2 offset-l5 center">
            <img src="{{ asset('image/admin/avatar.png') }}" class="avatar center">
          </div>
          <div class="col l4 offset-l4 center nama">
            <p class="namaadmin">Muhammad Fikri Hadian</p>
          </div>
          <div class="col l10 offset-l1 center nama">
            <h5 class="col l8 offset-l2">Edit Roll User</h5>
            <div class="col l8">

              <select class="browser-default">
                <option value="" disabled selected>Pilih</option>
                <option value="admin">Admin</option>
                <option value="applicants">Applicants</option>
                <option value="employers">Employers</option>
              </select>
            </div>
            <div class="col l4">
              <a class="bluearka btn modal-trigger right left" href="#editrole">Ubah</a>
              </button></div>

              <div class="col l4 offset-l4 center nama">
              </div>
            </div>
          </div>
        </div>

<div id="editrole" class="modal">
      <div class="modal-content">
        <h5>Apakah Anda yakin akan mengubah role user ini ?</h5>
        <p></p>
      </div>
      <div class="modal-footer">
        <a href="#!" class="green-text modal-action modal-close waves-effect waves-green btn-flat">YA</a>
        <a href="#!" class="red-text modal-action modal-close waves-effect waves-green btn-flat">TIDAK</a>
      </div>
    </div>
@endsection