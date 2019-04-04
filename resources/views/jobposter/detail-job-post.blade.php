@extends('layouts.poster-app')
@section('title','- Form Job Poster')
@section('content')
<section class="content">
	<div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="dashboard-box">
                        <div class="app-box-body">
                            <div class="row">
                            	<div class="col s12 m12 l3">
                            		<img src="{{ url('image/company/'.Auth::user()->companyProfile->banner_image) }}" style="width: 70%;">
                            	</div>
                            	<div class="col s12 m12 l5">
                            		<h5 class="uppercase"><b>{{ $vacancy[0]->job_specialization }}</b></h5>
                            	</div>
                            	<div class="col s12 m12 l4">
                            		<label><i class="fas fa-dollar-sign"></i>
										<?php
											if($vacancy[0]->currency == "idr") {
												echo "IDR ".$vacancy[0]->sallary1." - ".$vacancy[0]->sallary2;
											}
											else if($vacancy[0]->currency == "usd") {
												echo "USD ".$vacancy[0]->sallary1." - ".$vacancy[0]->sallary2;
											}
										?>
									</label><br><br>
                            		<label><i class="fas fa-location-arrow"></i>{{ $vacancy[0]->work_location }}</label>
                            	</div>
                            </div>
                        </div>
                    </div>
            		<div class="dashboard-box">
            			<div class="app-box-body">
            				<div class="row">
                            	<div class="col l2 s6" style="color:black;">
                            		<p>Company Name :</p>
                            		<p>Skills :</p>
                            		<p>Benefits :</p>
                            	</div>
                            	<div class="col l4 s6">
                            		<p>{{ Auth::user()->companyProfile->company_name }}</p>
                            		<p>{{ $vacancy[0]->skills }}</p>
                            		<p>
										<?php
											if(isset($vacancy[0]->benefits)) {
												$benefits = explode(';', $vacancy[0]->benefits);
												$count = count($benefits);

												for($i = 1; $i < count($benefits); $i++) {
													if($benefits[$i] == $benefits[$count - 1]) {
														echo $benefits[$i];

														break;
													}
													echo $benefits[$i].', ';
												}
											}
										?>
									</p>
                            	</div>
                            	<div class="col l2 s6" style="color: black;">
                            		<p>Company Description :</p>
                            		<p>Language :</p>
                            		<p>Notes :</p>
                            	</div>
                            	<div class="col l4 s6">
                            		<p>{{ Auth::user()->companyProfile->other_description }}</p>
                            		<p>{{ $vacancy[0]->language }}</p>
                            		<p>{{ $vacancy[0]->notes }}</p>
                            	</div>
                            </div>
            			</div>
            		</div>
            		<div class="dashboard-box">
                        <div class="app-box-body">
                            <div class="row">
                            	<a href="{{ route('jobposter.edit.job', ['jobID' => $vacancy[0]->unique_id]) }}" class="btn col s12 m12 l6 arkademy-blue-background">Edit</a>
                            	<a href="{{ route('jobposter.remove.vacancy', ['id' => $vacancy[0]->unique_id]) }}" class="btn col s12 m12 l6 arkademy-orange-background">Hapus</a>
                            </div>
                        </div>
                    </div>
            	</div>
            </div>
        </div>
    </section>
</section>
@endsection