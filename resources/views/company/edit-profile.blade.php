@extends('layouts.poster-app')
@section('title','- Company Profile')
@section('content')
<section class="content">
	<div class="container">
		<div class="row">
			<div class="dashboard-box-body">
				<div class="row">
					<div class="col s12">
						<h6><b>Edit Company Profile</b></h6>
					</div>
				</div>
				<form method="POST" action="{{ route('company.profile.update') }}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="email" value="{{ Auth::user()->companyProfile->email }}" />
					<div class="app-box-body">
						<div class="row">
							<div class="input-field col s12">
								<input name="company_name" id="company_name" type="text" value="{{ Auth::user()->companyProfile->company_name }}" class="validate">
								<label for="company_name">Company Name</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6">
								<input name="phone_number" id="phone_number" type="text" value="{{ Auth::user()->companyProfile->phone_number }}" class="validate">
								<label for="phone_number">Company Number</label>
							</div>
							<div class="input-field col s6">
								<input name="website" id="website" type="text" value="{{ Auth::user()->companyProfile->web }}" class="validate">
								<label for="website">Website</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6">
								<input disabled id="email" type="email" value="{{ Auth::user()->jobPosterProfile->email }}" class="validate">
								<label for="email">E-mail</label>
							</div>
							<div class="input-field col s6">
								<input name="company_email" id="company_email" type="email" value="{{ Auth::user()->companyProfile->company_email }}" class="validate">
								<label for="company_email">Company E-mail</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6">
								<select name="employee_number">
								<option value="1 - 50 Employees">1 - 50 Employees</option>
								<option value="1001 - 2000 Employees">1001 - 2000 Employees</option>
								</select>
								<label>Company Sizes</label>
							</div>
							<div class="input-field col s6">
								<input name="main_sector" id="main_sector" type="text" value="{{ Auth::user()->companyProfile->product_description }}" class="validate">
								<label for="main_sector">Main Sector</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6">
								<input type="text" name="address" id="headquarters" value="{{ Auth::user()->companyProfile->address }}" class="materialize-textarea" />
								<label for="headquarters">Head Quarters</label>
							</div>
							<div class="input-field col s6">
								<input type="text" name="company_description" id="company_description" value="{{ Auth::user()->companyProfile->other_description }}" class="materialize-textarea" />
								<label for="company_description">Company Description</label>
							</div>
						</div>
						<div class="row">
							<div class="file-field input-field">
								<div class="btn">
									<span>File</span>
									<input name="banner_image" type="file">
								</div>
								<div class="file-path-wrapper">
									<input class="file-path validate" type="text">
								</div>
							</div>
						</div>
						<div class="row">
							<button class="btn btn-round waves-effect waves-light arkademy-orange-background" type="submit">
								Update
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection