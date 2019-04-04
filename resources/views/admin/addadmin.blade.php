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
      <form method="POST" action="{{ route('admin.add.submit') }}">
      {{ csrf_field() }}
        <div class="row">
          <h5 class="marginbottomdp">Tambah Admin</h5>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="addusername" type="text" class="validate" name="username">
            <label for="addusername">Username</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 l6">
            <input id="first_name" type="text" class="validate" name="first_name">
            <label for="first_name">First Name</label>
          </div>
        
          <div class="input-field col s12 l6">
            <input id="last_name" type="text" class="validate" name="last_name">
            <label for="last_name">Last Name</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="phone_number" type="number" class="validate" name="phone_number">
            <label for="phone_number">Phone Number</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="addEmail" type="email" class="validate" name="email">
            <label for="addEmail">Email</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="addpassword" type="password" class="validate" name="password">
            <label for="addpassword">Password</label>
          </div>
        </div>
        <div class="row">
          <button class="btn bluearka" type="submit" name="action">Tambah</button>
        </div>
      </form>

      <table>
        <h5 class="margintoplp">Data Admin</h5>
        <thead>
          <tr>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>          
          @foreach($admins as $admin) 
            <tr>
              <td>{{ $admin->email }}</td>
              <td><a class="red btn modal-trigger" href="{{ route('admin.delete.submit', ['email' => $admin->email]) }}">Hapus</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div id="modaldelete" class="modal">
      <div class="modal-content">
        <h5>Apakah Anda yakin akan menghapus admin ini ?</h5>
        <p></p>
      </div>
      <div class="modal-footer">
        <a href="#!" class="green-text modal-action modal-close waves-effect waves-green btn-flat">YA</a>
        <a href="#!" class="red-text modal-action modal-close waves-effect waves-green btn-flat">TIDAK</a>
      </div>
    </div>

    @endsection