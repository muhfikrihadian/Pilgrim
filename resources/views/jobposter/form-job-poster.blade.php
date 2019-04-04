@extends('layouts.poster-app')
@section('title','- Form Job Poster')
@section('content')
<section class="content">
    <div class="container">
    	<div class="dashboard-box-body">
			<div class="row">
				<div class="col s12">
					<h5><b>Create Job Ad</b></h5>
				</div>
			</div>
        </div>
        <form method="POST" action="{{ route('jobposter.post.submit') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" name="email" value="{{ Auth::user()->jobposterProfile->email }}"/>
			<input type="hidden" name="company_email" value="{{ Auth::user()->companyProfile->company_email }}"/>
			<input type="hidden" name="banner_image" value="{{ Auth::user()->companyProfile->banner_image }}">			
	        <div class="dashboard-box-body">
				<div class="row">
					<div class="col s12">
						<h6><b>Job Details</b></h6>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<select name="job_specialization" onchange="java_script_:show(this.options[this.selectedIndex].value)">
							<option value="Frontend Developer">Frontend Developer</option>
							<option value="Backend Developer">Backend Developer</option>
							<option value="Full Stack Developer">Full Stack Developer</option>
							<option value="Mobile Engineer">Mobile Engineer</option>
							<option value="UI / UX Designer">UI / UX Designer</option>
							<option value="Other">Other</option>
						</select>
						<label>Job Specialization</label>
					</div>
				</div>
				<div class="row" id="otherInput" style="display: none;">
					<div class="input-field col s12">
						<input name="others_job_specialization" id="others_job_specialization" type="text" placeholder="IoT Engineer">
						<label>Others Job Specialization</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<select name="employment_type">
							<option value="Internship">Internship</option>
							<option value="Full-time">Full-time</option>
							<option value="Contract">Contract</option>
							<option value="Remote">Remote</option>
							<option value="Project Based">Project Based</option>
						</select>
						<label>Employment type</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input name="work_location" id="work_location" type="text" class="validate" placeholder="Eg. Jakarta Pusat">
						<label>Work Location</label>
					</div>
				</div>
				<div class="row">
					<div class="col s12 l2">
						<p>Monthly Sallary</p>
					</div>
					<div class="col s4 l2">
						<select name="currency">
							<option value="idr">IDR</option>
							<option value="usd">USD</option>								
						</select>
					</div>
					<div class="input-field col s8 l4">
						<input name="sallary1" id="position-title" type="text" class="validate" placeholder="MIN">
					</div>
					<div class="input-field col s12 l4">
						<input name="sallary2" id="position-title" type="text" class="validate" placeholder="MAX">
					</div>
				</div>
				<div class="row">
					<div class="col l2 s12">
						<label>Benefits</label>
					</div>
					<div class="col s6 l2">
						<p>
							<input type="checkbox" class="filled-in" name="benefits[]" value="Allowance" id="allowance"/>
							<label for="allowance">Allowance</label>
						</p>
					</div>
					<div class="col s6 l2">
						<p>
							<input type="checkbox" class="filled-in" name="benefits[]" value="Certification" id="certification"/>
							<label for="certification">Certification</label>
						</p>
					</div>
					<div class="col s6 l2">
						<p>
							<input type="checkbox" class="filled-in" name="benefits[]" value="Homestay" id="homestay"/>
							<label for="homestay">Homestay</label>
						</p>
					</div>
					<div class="col s6 l2">
						<p>
							<input type="checkbox" class="filled-in" name="benefits[]" value="Scholarship" id="scholarship"/>
							<label for="scholarship">Scholarship</label>
						</p>
					</div>
					<div class="col s6 l2">
						<p>
							<input type="checkbox" class="filled-in" name="benefits[]" value="Others" id="othersbenefit"/>
							<label for="othersbenefit">Others</label>
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
						<label>Skills</label>
						<input type="text" id="autocomplete-input" class="autocomplete" name="skills" />
					</div>
				</div>					
				<div class="row">
					<div class="input-field col s12">
						<select name="language">
							<option value="1">Bahasa Indonesia</option>
							<option value="2">English</option>
						</select>
						<label>Most Used Language</label>
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
						<input type="text" name="notes" id="notes" class="materialize-textarea" placeholder="Eg. Optional skills"/>
						<label for="notes">Notes</label>
					</div>
				</div>
				<div class="row">
					<div class="col s3">
						<p>Expired Date</p>
					</div>
					<div class="col s9">
						<input type="text" name="due_date" class="datepicker">
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
<script type="text/javascript">
	function show(aval) {
    if (aval == "Other") {
    otherInput.style.display='inline-block';
    Form.fileURL.focus();
    } 
    else{
    otherInput.style.display='none';
    }
  }
</script>
@endsection