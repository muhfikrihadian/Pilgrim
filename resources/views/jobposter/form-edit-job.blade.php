@extends('layouts.poster-app')
@section('title','- Form Job Poster')
@section('content')
<section class="content">
    <div class="container">
    	<div class="dashboard-box-body">
			<div class="row">
				<div class="col s12">
					<h5><b>Edit Job Ad</b></h5>
				</div>
			</div>
        </div>
        <form method="POST" action="{{ route('jobposter.edit.job.submit') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" name="unique_id" value="{{ json_decode($openJob)[0]->unique_id }}" />
	        <div class="dashboard-box-body">
				<div class="row">
					<div class="col s12">
						<h6><b>Job Details</b></h6>
					</div>
				</div>
				<div class="row">
					@if(json_decode($openJob)[0]->job_specialization == "Frontend Developer")
					<div class="input-field col s12">
						<select name="job_specialization">
							<option value="Frontend Developer">Frontend Developer</option>
							<option value="Backend Developer">Backend Developer</option>
							<option value="Full Stack Developer">Full Stack Developer</option>
							<option value="Mobile Engineer">Mobile Engineer</option>
							<option value="UI / UX Designer">UI / UX Designer</option>
						</select>
						<label>Job Specialization</label>
					</div>
					@endif

					@if(json_decode($openJob)[0]->job_specialization == "Backend Developer")
					<div class="input-field col s12">
						<select name="job_specialization">
							<option value="Frontend Developer">Frontend Developer</option>
							<option value="Backend Developer">Backend Developer</option>
							<option value="Full Stack Developer">Full Stack Developer</option>
							<option value="Mobile Engineer">Mobile Engineer</option>
							<option value="UI / UX Designer">UI / UX Designer</option>
						</select>
						<label>Job Specialization</label>
					</div>
					@endif

					@if(json_decode($openJob)[0]->job_specialization == "Full Stack Developer")
					<div class="input-field col s12">
						<select name="job_specialization">
							<option value="Frontend Developer">Frontend Developer</option>
							<option value="Backend Developer">Backend Developer</option>
							<option value="Full Stack Developer">Full Stack Developer</option>
							<option value="Mobile Engineer">Mobile Engineer</option>
							<option value="UI / UX Designer">UI / UX Designer</option>
						</select>
						<label>Job Specialization</label>
					</div>
					@endif

					@if(json_decode($openJob)[0]->job_specialization == "Mobile Engineer")
					<div class="input-field col s12">
						<select name="job_specialization">
							<option value="Frontend Developer">Frontend Developer</option>
							<option value="Backend Developer">Backend Developer</option>
							<option value="Full Stack Developer">Full Stack Developer</option>
							<option value="Mobile Engineer">Mobile Engineer</option>
							<option value="UI / UX Designer">UI / UX Designer</option>
						</select>
						<label>Job Specialization</label>
					</div>
					@endif

					@if(json_decode($openJob)[0]->job_specialization == "UI / UX Designer")
					<div class="input-field col s12">
						<select name="job_specialization">
							<option value="Frontend Developer">Frontend Developer</option>
							<option value="Backend Developer">Backend Developer</option>
							<option value="Full Stack Developer">Full Stack Developer</option>
							<option value="Mobile Engineer">Mobile Engineer</option>
							<option value="UI / UX Designer">UI / UX Designer</option>
						</select>
						<label>Job Specialization</label>
					</div>
					@endif
				</div>
				<div class="row">				   		
					@if(json_decode($openJob)[0]->employment_type == "Full Time")
						<div class="input-field col s12">
							<select name="employment_type">
								<option value="Full Time">Full Time</option>
								<option value="Contract">Contract</option>
								<option value="Internship">Internship</option>
								<option value="Part Time">Part Time</option>
								<option value="Temporary">Temporary</option>
							</select>
							<label>Employment type</label>
						</div>						
					@endif

					@if(json_decode($openJob)[0]->employment_type == "Contract")
						<div class="input-field col s12">
							<select name="employment_type">
								<option value="Contract">Contract</option>
								<option value="Full Time">Full Time</option>									
								<option value="Internship">Internship</option>
								<option value="Part Time">Part Time</option>
								<option value="Temporary">Temporary</option>
							</select>
							<label>Employment type</label>
						</div>						
					@endif

					@if(json_decode($openJob)[0]->employment_type == "Internship")
						<div class="input-field col s12">
							<select name="employment_type">
								<option value="Internship">Internship</option>
								<option value="Full Time">Full Time</option>
								<option value="Contract">Contract</option>									
								<option value="Part Time">Part Time</option>
								<option value="Temporary">Temporary</option>
							</select>
							<label>Employment type</label>
						</div>						
					@endif

					@if(json_decode($openJob)[0]->employment_type == "Part Time")
						<div class="input-field col s12">
							<select name="employment_type">
								<option value="Part Time">Part Time</option>
								<option value="Full Time">Full Time</option>
								<option value="Contract">Contract</option>
								<option value="Internship">Internship</option>									
								<option value="Temporary">Temporary</option>
							</select>
							<label>Employment type</label>
						</div>						
					@endif

					@if(json_decode($openJob)[0]->employment_type == "Temporary")
						<div class="input-field col s12">
							<select name="employment_type">
								<option value="Temporary">Temporary</option>
								<option value="Full Time">Full Time</option>
								<option value="Contract">Contract</option>
								<option value="Internship">Internship</option>
								<option value="Part Time">Part Time</option>									
							</select>
							<label>Employment type</label>
						</div>						
					@endif
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input name="work_location" id="work_location" type="text" class="validate" placeholder="Eg. Jakarta Pusat" value="{{ json_decode($openJob)[0]->work_location }}">
						<label>Work Location</label>
					</div>
				</div>
				<div class="row">
					<div class="col s12 l2">
						<p>Monthly Sallary</p>
					</div>
					<div class="col s4 l2">							
						@if(json_decode($openJob)[0]->currency == "idr") 
							<select name="currency">
								<option value="idr">IDR</option>
								<option value="usd">USD</option>								
							</select>
						@elseif(json_decode($openJob)[0]->currency == "usd")
							<select name="currency">									
								<option value="usd">USD</option>								
								<option value="idr">IDR</option>
							</select>
						@endif
					</div>
					<div class="input-field col s8 l4">
						<input name="sallary1" id="position-title" value="{{ json_decode($openJob)[0]->sallary1 }}"  type="text" class="validate" placeholder="MIN">
					</div>
					<div class="input-field col s12 l4">
						<input name="sallary2" id="position-title" value="{{ json_decode($openJob)[0]->sallary2 }}" type="text" class="validate" placeholder="MAX">
					</div>
				</div>					
				<div class="row">
					<div class="col l2 s12">
						<label>Benefits</label>
					</div>
					<div class="col s6 l2">																			

						<p>
							<input type="checkbox" class="filled-in" name="benefits[]" id="allowance" />
							<label for="allowance">Allowance</label>
						</p>									

					</div>
					<div class="col s6 l2">														
						<p>
							<input type="checkbox" class="filled-in" name="benefits[]" id="certification" />
							<label for="certification">Certification</label>
						</p>
					</div>
					<div class="col s6 l2">														
						<p>
							<input type="checkbox" class="filled-in" name="benefits[]" id="homestay" />
							<label for="homestay">Homestay</label>
						</p>
					</div>
					<div class="col s6 l2">														
						<p>
							<input type="checkbox" class="filled-in" name="benefits[]" id="scholarship" />
							<label for="scholarship">Scholarship</label>
						</p>
					</div>
				</div>
	        </div>
	        <div class="dashboard-box-body">
				<div class="row">
					<div class="col s12">
						<h6><b>Job Requirements (for better candidate matching)</b></h6>
					</div>
				</div>	        		
				<div class="row">
					<div class="col s12">
						<div class="row">
							<div class="input-field col s12">
								<input type="text" id="autocomplete-input" class="autocomplete" value="{{ json_decode($openJob)[0]->skills }}" name="skills">
								<label for="autocomplete-input">Skills</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<select name="language">
							<option value="1">Bahasa Indonesia</option>
							<option value="2">English</option>
						</select>
						<label>Language</label>
					</div>
				</div>
	        </div>
	        <div class="dashboard-box-body">
				<div class="row">
					<div class="col s12">
						<h6><b>Job Description</b></h6>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="text" name="notes" id="notes" value="{{ json_decode($openJob)[0]->notes }}" class="materialize-textarea" />
						<label for="notes">Notes</label>
					</div>
				</div>
				<div class="row">
					<div class="col s3">
						<p>Due Date</p>
					</div>
					<div class="col s9">
						<input type="text" name="due_date" class="datepicker" value="{{ json_decode($openJob)[0]->due_date }}">
					</div>
				</div>				 
				<div class="row">
					<div class="col s12">
						<p>Note: Pilgrim does not accept job advertisements that discriminate against race, religion, age, gender, family status or disability. It is against the law in some countries* and your company may have internal policies against such practices. Pilgrim will not bear any responsibility for any consequences that may arise from the inappropriateness of such job postings.</p>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<button type="submit" class="waves-effect waves-light btn btn-round arkademy-orange-background">Submit</button>
					</div>
				</div>
	        </div>
    	</form>
    </div>
</section>
@endsection