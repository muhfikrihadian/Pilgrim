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
      <div class="row margintopdp">
        <form class="col s12" action="{{ route('admin.activejobs.search') }}" method="POST">
          {{ csrf_field() }}
          <div class="row">
            <div class="input-field col l10 s12 ">
              <input id="icon_prefix" type="text" class="validate" name="search">
              <label for="icon_prefix">Spesialisasi Pekerjaan</label>
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
        @if(isset($vacancies))
          @foreach($vacancies as $vacancy) 
            <li>
              <div class="collapsible-header l2"><i class="material-icons">work</i>{{ $vacancy->job_specialization }}
                <span class="badge">{{ date_format(date_create(explode(" ", $vacancy->created_at)[0]), 'l') }}, {{ explode(" ", $vacancy->created_at)[0] }}</span>
              </div>
              <div class="collapsible-body">
                <p>{{ $vacancy->notes }}</p>
                <a class="waves-effect waves-light btn" href="{{ route('admin.detail.vacancy', ['id' => $vacancy->unique_id]) }}">LIHAT</a>
                <a class="red btn modal-trigger right" onClick="deleteVacancy('<?php echo (string)$vacancy->unique_id ?>')">Hapus</a>
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
        <h5>Apakah Anda yakin akan menghapus job ini ?</h5>
        <p></p>
      </div>
      <div class="modal-footer">
        <a id="confirm-delete" class="green-text modal-action modal-close waves-effect waves-green btn-flat">YA</a>
        <a href="#!" class="red-text modal-action modal-close waves-effect waves-green btn-flat">TIDAK</a>
      </div>
    </div>
    <script type="text/javascript">    
      function deleteVacancy(vacant_id) {
        $('#deletepost').modal('open')        
        $('#confirm-delete').click(function() {
          window.location.href = "http://localhost:8000/admin/delete_vacancy/" + vacant_id;
        });
      }
    </script>
@endsection