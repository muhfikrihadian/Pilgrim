<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\OpenJob;
use App\AppliedJob;
use App\CompanyProfile;

class JobPosterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {                                   
        return view('jobposter.dashboard');
    }

    public function jobAds()    
    {
        $a = OpenJob::where('email', Auth::user()->jobposterProfile->email)->get();
        if(isset(json_decode($a)[0])) {
            $a_json = json_decode($a);
            $b; 
            $c;              

            for($i = 0; $i < count($a_json); $i++) {            
                $b[] = [
                    'apply_num' => AppliedJob::where('vacancy_id', $a_json[$i]->unique_id)->count(),
                    'spec' => $a_json[$i]->job_specialization
                ];
            }

            return view('jobposter.ads-page', ['job' => json_encode($b)]);
        }

        return view('jobposter.ads-page', ['job' => null]);            
    }

    public function jobposting()
    {           
        return view('jobposter.form-job-poster');
    }

    public function jobPostingSubmit(Request $r) {
        $openJob = new OpenJob;                    

        if(isset($r->banner_image)) {            
            $openJob->employment_type = $r->input('employment_type');
            $openJob->job_specialization = $r->input('job_specialization');
            $openJob->work_location = $r->input('work_location');
            $openJob->sallary1 = $r->input('sallary1');
            $openJob->sallary2 = $r->input('sallary2');            
            $openJob->skills = $r->input('skills');
            $openJob->language = $r->input('language');
            $openJob->notes = $r->input('notes');
            $openJob->due_date = $r->input('due_date');
            $openJob->email = $r->input('email');
            $openJob->company_email = $r->input('company_email');
            $openJob->unique_id = uniqid();
            $openJob->banner_image = $r->input('banner_image');
            $openJob->currency = $r->input('currency');
            
            foreach($r->benefits as $benefits) {
                $openJob->benefits .= ";".$benefits;
            }
        }

        else {
            $openJob->employment_type = $r->input('employment_type');
            $openJob->job_specialization = $r->input('job_specialization');
            $openJob->work_location = $r->input('work_location');
            $openJob->sallary1 = $r->input('sallary1');
            $openJob->sallary2 = $r->input('sallary2');                        
            $openJob->skills = $r->input('skills');
            $openJob->language = $r->input('language');
            $openJob->notes = $r->input('notes');
            $openJob->due_date = $r->input('due_date');
            $openJob->email = $r->input('email');
            $openJob->company_email = $r->input('company_email');
            $openJob->unique_id = uniqid();
            $openJob->currency = $r->input('currency');

            foreach($r->benefits as $benefits) {
                $openJob->benefits .= ";".$benefits;
            }
        }

        $openJob->save();

        $a = OpenJob::where('email', Auth::user()->jobposterProfile->email)->get();
        if(isset(json_decode($a)[0])) {
            $a_json = json_decode($a);
            $b; 
            $c;              

            for($i = 0; $i < count($a_json); $i++) {            
                $b[] = [
                    'apply_num' => AppliedJob::where('vacancy_id', $a_json[$i]->unique_id)->count(),
                    'spec' => $a_json[$i]->job_specialization
                ];
            }

            return view('jobposter.ads-page', ['job' => json_encode($b)]);            
        }

        return view('jobposter.ads-page', ['job' => null]);        
    }  
    
    public function editJob($jobID) {
        return view('jobposter.form-edit-job', ['openJob' => OpenJob::openJobByID($jobID)]);
    }

    public function editJobSubmit(Request $r) {   
        $benefits = "0";
        
        if(isset($r->benefits)) {
            foreach($r->input('benefits') as $benefit) {
                $benefits .= ";".$benefit;
            }
        }
        
        DB::table('open_job')->where('unique_id', $r->input('unique_id'))->update(
            ['job_specialization' => $r->input('job_specialization'),
            'employment_type' => $r->input('employment_type'),
            'work_location' => $r->input('work_location'),
            'sallary1' => $r->input('sallary1'),
            'sallary2' => $r->input('sallary2'),
            'benefits' => $benefits,
            'skills' => $r->input('skills'),
            'language' => $r->input('language'),
            'notes' => $r->input('notes'),
            'due_date' => $r->input('due_date'),
            'currency' => $r->input('currency')
            ]
        );

        return view('jobposter.ads-page', ['openJob' => OpenJob::openJobByID($r->input('unique_id'))]);
    }

    public function removeVacancy($id) {
        $a = OpenJob::where('unique_id', $id)->get();                

        DB::table('open_job')->where('unique_id', $id)->update(['status' => 'deleted']);

        $c = OpenJob::where('email', Auth::user()->jobposterProfile->email)->get();
        if(isset(json_decode($c)[0])) {
            $c_json = json_decode($c);
            $d;                          

            for($i = 0; $i < count($c_json); $i++) {            
                $d[] = [
                    'apply_num' => AppliedJob::where('vacancy_id', $c_json[$i]->unique_id)->count(),
                    'spec' => $c_json[$i]->job_specialization
                ];
            }

            return view('jobposter.ads-page', ['job' => json_encode($d)]);            
        }

        return view('jobposter.ads-page', ['job' => null]);
    }
    
    public function detailJobPosting($id)
    {   
        $vacancy = OpenJob::where('unique_id', $id)->get();

        return view('jobposter.detail-job-post', ['vacancy' => $vacancy]);
    }

    public function notification() {
        //code    
    }

    public function showApplicant()
    {
        return view('jobposter.detail-applicant');
    }
}
