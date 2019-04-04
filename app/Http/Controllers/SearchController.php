<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobSeekerProfile;

class SearchController extends Controller
{
    public function getApplicants(){
    	$input = Input::get('cari');
    	$name = JobSeekerProfile::where('first_name', 'like', '%'.$input.'%')->orWhere('last_name', 'like', '%'.$input.'%')->get();

    	return view('admin.applicants', ['applicants' => json_decode($name)]);
    }
}
