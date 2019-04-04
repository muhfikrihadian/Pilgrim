@extends('layouts.poster-app')
@section('title','- Job Ads')
@section('content')
<section class="content">
    <div class="container">
        <div class="dashboard-box-body">              
            <?php
                if(Auth::user()->companyProfile->company_name == "null" || !isset(Auth::user()->companyProfile->banner_image) || Auth::user()->companyProfile->banner_image == "NULL" || Auth::user()->companyProfile->web == "null") {
            ?>
                <div class="row">
                    <div class="col l6 s12">
                        <h6><b>Job Ads</b></h6>
                    </div>                  
                    <a href="{{url('employer/form_job_posting')}}" class="waves-effect waves-light btn btn-round arkademy-orange-background right disabled">Create Job Ad</a>                    
                </div>
                <div class="row">
                    <a href="{{url('company/edit/profile')}}" class="waves-effect waves-light btn btn-round arkademy-orange-background right">Complete The Company Profile</a>
                </div>
            <?php
                }
                else if(Auth::user()->companyProfile->company_name != "null" && isset(Auth::user()->companyProfile->banner_image) && Auth::user()->companyProfile->banner_image != "NULL" && Auth::user()->companyProfile->web != "null"){
            ?>
                <div class="row">
                    <div class="col l6 s12">
                        <h6><b>Job Ads</b></h6>
                    </div>                  
                    <a href="{{url('employer/form_job_posting')}}" class="waves-effect waves-light btn btn-round arkademy-orange-background right">Create Job Ad</a>                    
                </div>
            <?php
                }
            ?>
        </div>
        <div class="dashboard-box-body">
            <div class="row">
                <div class="col s12">
                    <h6><b>POSTED JOBS</b></h6>
                    <div class="row">

                    @for($i=0; $i < count(App\OpenJob::openJob(Auth::user()->jobposterProfile->email));$i++)                            
                        <div class="col l3 s12">
                            <div class="card medium">
                                <div class="card-image">
                                    <img src="{{ url('image/company/'.json_decode(App\OpenJob::openJob(Auth::user()->jobposterProfile->email))[$i]->banner_image) }}" class="card-img">
                                </div>
                                <div class="card-content">
                                    <h5><b>{{ json_decode(App\OpenJob::openJob(Auth::user()->jobposterProfile->email))[$i]->job_specialization }}</b></h5>
                                    <p class="arkademy-blue-color"><b>{{ json_decode(App\OpenJob::openJob(Auth::user()->jobposterProfile->email))[$i]->employment_type }}</b></p>
                                    <p class="right-align"><b>{{ json_decode(App\OpenJob::openJob(Auth::user()->jobposterProfile->email))[$i]->work_location }}</b><br></p><br>
                                    <dfn>"{{ json_decode(App\OpenJob::openJob(Auth::user()->jobposterProfile->email))[$i]->notes }}"</dfn>
                                </div>
                                <div class="card-action center">
                                    <label><a href="{{ route('jobposter.edit.job', ['jobID' => json_decode(App\OpenJob::openJob(Auth::user()->jobposterProfile->email))[$i]->unique_id]) }}" class="arkademy-orange-color">Edit</a></label>
                                    <label><a href="#modalvacancy" class="modal-trigger" style="color: red;">Remove</a></label>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <ul class="pagination right">
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="active"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!">2</a></li>
                <li class="waves-effect"><a href="#!">3</a></li>
                <li class="waves-effect"><a href="#!">4</a></li>
                <li class="waves-effect"><a href="#!">5</a></li>
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            </ul>
        </div>
        <div class="dashboard-box">
            <div class="row">
                <div class="col s12">
                    <h6><b>DASHBOARD APPLICANT</b></h6>
                    <div class="row">
                        <div class="col s12">
                            <table class="highlight">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Position</th>
                                        <th>Applicant</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                   			    @if(isset($job))
                                    @for($i = 0; $i < count(json_decode($job)); $i++)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ json_decode($job)[$i]->spec }}</td>
                                            <td>{{ json_decode($job)[$i]->apply_num }}</td>
                                            <td><a href="{{route('jobposter.detail.applicant')}}">Details</a></td>
                                        </tr>
                                    @endfor
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</section>

  <div id="modalvacancy" class="modal">
    <div class="modal-content">
      <h5>Are you sure you want to delete this Job?</h5>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close white-text green left btnmodal">YES</a>
      <a href="#!" class="modal-action modal-close white-text red right btnmodal">NO</a>
    </div>
  </div>
@endsection
