@extends('layouts.seeker-app')
@section('title','- Dashboard Job Seeker')
@section('content')
<?php
    use App\OpenJob;
    use App\AppliedJob;
    use App\SavedJob;
    $profile_data = Auth::user()->ArkademyProfile(Auth::user()->email);    
?>
<section class="content">
    <div class="container">
        <div class="row">
            <h4 style="margin: 20px;" class="center black-text">WELCOME TO PILGRIM, {{ $profile_data->basicInfo[0]->nama }}</h4>
            <p style="margin-bottom: 30px; font-size: 1.2rem;" class="black-text center">Complete your Curriculum Vitae as well as possible so that recruiters are impressed</p>
        </div>
        <div class="row">
            <div class="col s12" style="margin-bottom: 20px;">
                <ul class="tabs">
                    <li class="tab on-page-seeker col s4"><a href="#tab1" class="active">Curriculum Vitae</a></li>
                    <li class="tab on-page-seeker col s4"><a href="#tab2">My Application</a></li>
                    <li class="tab on-page-seeker col s4"><a href="#tab3">Job Vacancy Saved</a></li>
                </ul>
            </div>
            <div id="tab1" class="col s12">
                <div class="dashboard-box-body center">
                    <!-- <div class="row">
                        <div class="col s12 right-align">
                            <a href="#"><i class="far fa-edit grey-text right"></i></a>
                            <a href="#"><i class="far fa-share-square grey-text right"></i></a>
                        </div>
                    </div> -->
                    <div class="row background-image" style="background-image: url('assets/background-pilgrim-profile.jpg');">
                        <div class="col s12">
                            <img src="{{url('assets/avatar.png')}}" class="avatar">
                            <h4 class="black-text">
                                <b>
                                    {{ $profile_data->basicInfo[0]->nama }}
                                </b>
                            </h4>
                            <h5 class="black-text">
                                {{ $profile_data->userInfo[0]->short_description }}
                            </h5>
                            <h6 class="black-text" style="margin-bottom:40px;">
                                <b><i>Sallary Expectations : Rp.0,-</i></b>
                            </h6>
                            <hr>
                            <p>
                                <i>
                                    {{ $profile_data->userInfo[0]->short_profile }}
                                </i>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <a href=""><img src="{{asset('assets/icons/facebook.svg')}}" class="profile-link"></a>
                        <a href=""><img src="{{asset('assets/icons/twitter.svg')}}" class="profile-link"></a>
                        <a href=""><img src="{{asset('assets/icons/google-plus.svg')}}" class="profile-link"></a>
                        <a href=""><img src="{{asset('assets/icons/behance.svg')}}" class="profile-link"></a>
                        <a href=""><img src="{{asset('assets/arkgit.png')}}" class="profile-link"></a>
                    </div>
                </div>
                <div class="dashboard-box-body">
                    <div class="row">
                        <div class="col l6 s6">
                            <h6><b>PROFILE</b></h6>
                        </div>
                        <!-- <div class="col l6 s6 right-align">
                            <a href="#"><i class="far fa-edit grey-text right"></i></a>
                            <a href="#"><i class="far fa-share-square grey-text right"></i></a>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col l2 s6 black-text" style="font-size: 1.1rem;">
                            <p>Full Name</p>
                            <p>Birth Location</p>
                            <p>Gender</p>
                            <p>School</p>
                            <p>Phone Number</p>
                            <p>Language</p>
                        </div>
                        <div class="ellipsis col l4 s6" style="font-size: 1.1rem;">
                            <p>
                                {{ $profile_data->userInfo[0]->fullname }}
                            </p>
                            <p>
                                NULL
                            </p>
                            <p>
                                @if($profile_data->basicInfo[0]->gender == "L")
                                    Laki-laki
                                @else 
                                    Perempuan
                                @endif
                            </p>
                            <p>
                                {{ $profile_data->basicInfo[0]->school_name }}
                            </p>
                            <p>
                                NULL
                            </p>
                            <p>
                                {{ $profile_data->userInfo[0]->language }}
                            </p>
                        </div>
                        <div class="col l2 s6 black-text" style="font-size: 1.1rem;">
                            <p>Nick Name</p>
                            <p>Birth Date</p>
                            <p>Domisili</p>
                            <p>Grade</p>
                            <p>E-mail Adress</p>
                            <p>Hobby</p>
                        </div>
                        <div class="ellipsis col l4 s6" style="font-size: 1.1rem;">
                            <p>
                                {{ $profile_data->basicInfo[0]->nama }}
                            </p>
                            <p>
                                {{ $profile_data->basicInfo[0]->dob }}
                            </p>
                            <p>
                                {{ $profile_data->userInfo[0]->kota_domisili }}
                            </p>
                            <p>
                                {{ $profile_data->basicInfo[0]->level }}
                            </p>
                            <p>
                                {{ Auth::user()->email }}
                            </p>
                            <p>
                                {{ $profile_data->userInfo[0]->hobbies }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="dashboard-box-body">
                    <div class="row">
                        <div class="col s12">
                            <h6><b>SKILL</b></h6>
                        </div>
                    </div>
                </div>
                <div class="dashboard-box-body">
                    <div class="row">
                        <div class="col l6 s6">
                            <h6><b>PROJECT EXPERIENCE</b></h6>
                        </div>
                        <!-- <div class="col l6 s6 right-align">
                            <a href="#"><i class="far fa-edit grey-text right"></i></a>
                            <a href="#"><i class="far fa-share-square grey-text right"></i></a>
                        </div> -->
                    </div>

                    @for($i = 0; $i < count(json_decode($profile_data->userInfo[0]->project)); $i++)
                    
                    <div class="row">
                        <div class="col s4 m4 l2 center" style="transform: translateY(50%);">
                            <i class="fas fa-flask fa-3x center teal-text"></i>
                        </div>
                        <div class="col s8 m8 l3">
                            <h6><b>
                                {{ json_decode($profile_data->userInfo[0]->project)[$i]->title }}
                            </b></h6>
                            <p>
                                {{ json_decode($profile_data->userInfo[0]->project)[$i]->instansi }}
                            </p>
                            <p>
                                {{ json_decode($profile_data->userInfo[0]->project)[$i]->waktu }}
                            </p>
                        </div>
                        <div class="col s12 m12 l7">
                            <p>
                                <i>{{ json_decode($profile_data->userInfo[0]->project)[$i]->ketr }}</i>
                            </p>
                        </div>
                    </div>

                    @endfor

                </div>
                <div class="dashboard-box-body">
                    <div class="row">
                        <div class="col l6 s6">
                            <h6><b>ORGANIZATION</b></h6>
                        </div>
                        <!-- <div class="col l6 s6 right-align">
                            <a href="#"><i class="far fa-edit grey-text right"></i></a>
                            <a href="#"><i class="far fa-share-square grey-text right"></i></a>
                        </div> -->
                    </div>

                    @for($i = 0; $i < count(json_decode($profile_data
                    ->userInfo[0]->organization)); $i++)

                    <div class="row">
                        <div class="col s4 m4 l2 center" style="transform: translateY(50%);">
                            <i class="fas fa-users fa-3x center teal-text"></i>
                        </div>
                        <div class="col s8 m8 l3">
                            <h6><b>
                                {{ json_decode($profile_data->userInfo[0]->organization)[$i]->title }}
                            </b></h6>
                            <p>
                                {{ json_decode($profile_data->userInfo[0]->organization)[$i]->instansi }}
                            </p>
                            <p>
                                {{ json_decode($profile_data->userInfo[0]->organization)[$i]->waktu }}
                            </p>
                        </div>
                        <div class="col s12 m12 l7">
                            <p>
                                <i>{{ json_decode($profile_data->userInfo[0]->organization)[$i]->ketr }}</i>
                            </p>
                        </div>
                    </div>
                    @endfor
                </div>
                <div class="dashboard-box-body">
                    <div class="row">
                        <div class="col l6 s6">
                            <h6><b>ACHIEVEMENT</b></h6>
                        </div>
                        <!-- <div class="col l6 s6 right-align">
                            <a href="#"><i class="far fa-edit grey-text right"></i></a>
                            <a href="#"><i class="far fa-share-square grey-text right"></i></a>
                        </div> -->
                    </div>

                    @for($i = 0; $i < count(json_decode($profile_data
                    ->userInfo[0]->achievment)); $i++)

                    <div class="row">
                        <div class="col s4 m4 l2 center" style="transform: translateY(50%);">
                            <i class="fas fa-trophy fa-3x teal-text"></i>
                        </div>
                        <div class="col s8 m8 l3">
                            <h6><b>
                                {{ json_decode($profile_data->userInfo[0]->achievment)[$i]->title }}
                            </b></h6>
                            <p>
                                {{ json_decode($profile_data->userInfo[0]->achievment)[$i]->instansi }}
                            </p>
                            <p>
                                {{ json_decode($profile_data->userInfo[0]->achievment)[$i]->waktu }}                            
                            </p>
                        </div>
                        <div class="col s12 m12 l7">
                            <p><i>
                                {{ json_decode($profile_data->userInfo[0]->achievment)[$i]->ketr }}
                            </i></p>
                        </div>
                    </div>

                    @endfor

                </div>
            </div>
            <div id="tab2" class="col s12">
                <div class="dashboard-box-body">
                    <div class="row">
                        <div class="col s12">
                            <h6><b>MY APPLICATION</b></h6>
                        </div>
                    </div>
                    <div class="row">
                    <?php
                        $saved = AppliedJob::where([['status', '=', 'applied'],['seeker_email', '=', Auth::user()->jobseekerProfile->email],])->get();
                        $saved_json = json_decode($saved);
                        foreach($saved_json as $data) {
                    ?>
                        <div class="col l3 s12">
                            <div class="card medium">
                                <div class="card-image" style="height: 100px;">
                                    <img src="{{ url('image/company/'.json_decode(OpenJob::openJobByID($data->vacancy_id))[0]->banner_image) }}" class="card-img">
                                </div>
                                <div class="card-content">
                                    <h5><b>{{ json_decode(OpenJob::openJobByID($data->vacancy_id))[0]->job_specialization }}</b></h5>
                                    <p>{{ json_decode(App\CompanyProfile::select('web')->where('email', json_decode(OpenJob::select('email')->where('unique_id', $data->vacancy_id)->get())[0]->email)->get())[0]->web }}<br></p>
                                    <p class="right-align"><b>{{ json_decode(OpenJob::openJobByID($data->vacancy_id))[0]->work_location }}</b><br></p><br>
                                    <dfn>{{ json_decode(OpenJob::openJobByID($data->vacancy_id))[0]->notes }}</dfn>
                                </div>
                                <div class="card-action center">
                                    @if($data->status == "saved")
                                        <label><a href="{{ route('apply.from.saved', ['id' => $data->vacancy_id]) }}">Apply</a></label>
                                    @else 
                                        <label><a href="{{ route('cancel.apply', ['id' => $data->vacancy_id]) }}" class="left red-text">Cancel Apply</a></label>
                                    @endif
                                    <label><a href="#" class="right">Detail</a></label>
                                </div>
                            </div>
                        </div>
                        <?php                                        
                            }
                        ?>              
                    </div>
                    <div class="row">
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
                </div>
                <div class="dashboard-box-body">
                    <div class="row">
                        <div class="col s12">
                            <h6><b>JOB VACANCY RECOMMENDATION</b></h6>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col l3 s12">
                            <div class="card medium">
                                <div class="card-image" style="height: 100px;">
                                    <img src="{{url('assets/SIRCLO.png')}}" class="card-img">
                                </div>
                                <div class="card-content">
                                    <h5><b>iOS Programmer</b></h5>
                                    <p>Sirclo.id<br></p>
                                    <p class="right-align"><b>DKI Jakarta</b><br></p><br>
                                    <dfn>"Responsible for building iOS apps related to e-Commerce."</dfn>
                                </div>
                                <div class="card-action center">

                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                    <div class="row">
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
                </div>
            </div>
            <div id="tab3" class="col s12">
                <div class="dashboard-box-body">
                    <div class="row">
                    <?php
                        $saved = AppliedJob::where([['status', '=', 'saved'],['seeker_email', '=', Auth::user()->jobseekerProfile->email],])->get();
                        $saved_json = json_decode($saved);
                        foreach($saved_json as $data) {
                    ?>
                        <div class="col s12 uppercase">
                            <h6><b>Job Vacancy Saved</b></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l3 s12">
                            <div class="card medium">
                                <div class="card-image" style="height: 100px;">
                                    <img src="{{ url('image/company/'.json_decode(OpenJob::openJobByID($data->vacancy_id))[0]->banner_image) }}" class="card-img">
                                </div>
                                <div class="card-content">
                                    <h5><b>{{ json_decode(OpenJob::openJobByID($data->vacancy_id))[0]->job_specialization }}</b></h5>
                                    <p>{{ json_decode(App\CompanyProfile::select('web')->where('email', json_decode(OpenJob::select('email')->where('unique_id', $data->vacancy_id)->get())[0]->email)->get())[0]->web }}<br></p>
                                    <p class="right-align"><b>{{ json_decode(OpenJob::openJobByID($data->vacancy_id))[0]->work_location }}</b><br></p><br>
                                    <dfn>{{ json_decode(OpenJob::openJobByID($data->vacancy_id))[0]->notes }}</dfn>
                                </div>
                                <div class="card-action center">
                                    @if($data->status == "saved")
                                        <label><a href="{{ route('apply.from.saved', ['id' => $data->vacancy_id]) }}">Apply</a></label>
                                    @else 
                                        <label><a href="{{ route('cancel.apply', ['id' => $data->vacancy_id]) }}" class="left red-text">Cancel Apply</a></label>
                                    @endif
                                    <label><a href="#" class="right">Detail</a></label>
                                </div>
                            </div>
                        </div>
                        <?php                                        
                            }
                        ?>
                    </div>
                    <div class="row">
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection