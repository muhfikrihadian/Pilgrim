<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\User;
use App\AdminProfile;
use App\JobPosterProfile;
use App\CompanyProfile;
use App\JobSeekerProfile;
use App\OpenJob;


class AdminController extends Controller
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

    public function showRegisterFormAdmin()
    {        
        return view('auth.admin_register');
    }

    public function registerAdmin(Request $r)
    {
        $user = new User;
        $user->email = $r->input('email');
        $user->password = bcrypt($r->input('password'));
        $user->role = 1;
        $user->save();

        $profile = new AdminProfile;
        $profile->id_user = $user->id;
        $profile->first_name = $r->input('first_name');
        $profile->last_name = $r->input('last_name');
        $profile->phone_number = $r->input('phone_number');
        $profile->save();        

        return redirect(route('admin.add'));
    }
    
    public function dashboard()
    {        
        $seeker = (string)count(json_decode(User::where('role', '3')->get()));
        $companies = (string)count(json_decode(CompanyProfile::all()));
        $vacancy_recent = (string)count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y-m').'%')->get()));
        $vacancy_all = (string)count(OpenJob::all());

        //Monthly Data
        $jobs_month[] = [
        'january' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y').'-01'.'%')->get())),
        'february' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y').'-02'.'%')->get())),
        'march' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y').'-03'.'%')->get())),
        'april' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y').'-04'.'%')->get())),
        'may' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y').'-05'.'%')->get())),
        'june' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y').'-06'.'%')->get())),
        'july' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y').'-07'.'%')->get())),
        'august' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y').'-08'.'%')->get())),
        'september' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y').'-09'.'%')->get())),
        'october' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y').'-10'.'%')->get())),
        'november' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y').'-11'.'%')->get())),
        'december' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y').'-12'.'%')->get())),
        ];
        
        $companies_month[] = [
        'january' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y').'-01'.'%')->get())),
        'february' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y').'-02'.'%')->get())),
        'march' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y').'-03'.'%')->get())),
        'april' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y').'-04'.'%')->get())),
        'may' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y').'-05'.'%')->get())),
        'june' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y').'-06'.'%')->get())),
        'july' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y').'-07'.'%')->get())),
        'august' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y').'-08'.'%')->get())),
        'september' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y').'-09'.'%')->get())),
        'october' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y').'-10'.'%')->get())),
        'november' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y').'-11'.'%')->get())),
        'december' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y').'-12'.'%')->get())),
        ];

        $applicant_month[] = [
        'january' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y').'-01'.'%')->get())),
        'february' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y').'-02'.'%')->get())),
        'march' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y').'-03'.'%')->get())),
        'april' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y').'-04'.'%')->get())),
        'may' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y').'-05'.'%')->get())),
        'june' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y').'-06'.'%')->get())),
        'july' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y').'-07'.'%')->get())),
        'august' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y').'-08'.'%')->get())),
        'september' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y').'-09'.'%')->get())),
        'october' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y').'-10'.'%')->get())),
        'november' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y').'-11'.'%')->get())),
        'december' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y').'-12'.'%')->get())),
        ];        

        //Yearly Data
        $jobs_year[] = [
        'year1' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y', strtotime('-6 year')).'%')->get())),
        'year2' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y', strtotime('-5 year')).'%')->get())),
        'year3' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y', strtotime('-4 year')).'%')->get())),
        'year4' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y', strtotime('-3 year')).'%')->get())),
        'year5' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y', strtotime('-2 year')).'%')->get())),
        'year6' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y', strtotime('-1 year')).'%')->get())),
        'year7' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y').'%')->get()))
        ];

        $companies_year[] = [
        'year1' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y', strtotime('-6 year')).'%')->get())),
        'year2' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y', strtotime('-5 year')).'%')->get())),
        'year3' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y', strtotime('-4 year')).'%')->get())),
        'year4' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y', strtotime('-3 year')).'%')->get())),
        'year5' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y', strtotime('-2 year')).'%')->get())),
        'year6' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y', strtotime('-1 year')).'%')->get())),
        'year7' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y').'%')->get()))
        ];

        $applicant_year[] = [
        'year1' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y', strtotime('-6 year')).'%')->get())),
        'year2' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y', strtotime('-5 year')).'%')->get())),
        'year3' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y', strtotime('-4 year')).'%')->get())),
        'year4' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y', strtotime('-3 year')).'%')->get())),
        'year5' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y', strtotime('-2 year')).'%')->get())),
        'year6' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y', strtotime('-1 year')).'%')->get())),
        'year7' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y').'%')->get()))
        ];
        //Daily Data
        $days[] = [
        'day1' => "\"".date_format(date_create(date('Y-m').'-'.date('d', strtotime('-6 days'))), 'l')."\"",
        'day2' => "\"".date_format(date_create(date('Y-m').'-'.date('d', strtotime('-5 days'))), 'l')."\"",
        'day3' => "\"".date_format(date_create(date('Y-m').'-'.date('d', strtotime('-4 days'))), 'l')."\"",
        'day4' => "\"".date_format(date_create(date('Y-m').'-'.date('d', strtotime('-3 days'))), 'l')."\"",
        'day5' => "\"".date_format(date_create(date('Y-m').'-'.date('d', strtotime('-2 days'))), 'l')."\"",
        'day6' => "\"".date_format(date_create(date('Y-m').'-'.date('d', strtotime('-1 days'))), 'l')."\"",
        'day7' => "\"".date_format(date_create(date('Y-m-d')), 'l')."\"",
        ];

        $jobs_day[] = [
        'day1' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y-m').'-'.date('d', strtotime('-6 days')).'%')->get())),
        'day2' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y-m').'-'.date('d', strtotime('-5 days')).'%')->get())),
        'day3' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y-m').'-'.date('d', strtotime('-4 days')).'%')->get())),
        'day4' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y-m').'-'.date('d', strtotime('-3 days')).'%')->get())),
        'day5' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y-m').'-'.date('d', strtotime('-2 days')).'%')->get())),
        'day6' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y-m').'-'.date('d', strtotime('-1 days')).'%')->get())),
        'day7' => count(json_decode(OpenJob::where('created_at', 'like', '%'.date('Y-m-d').'%')->get()))
        ];

        $companies_day[] = [
        'day1' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y-m').'-'.date('d', strtotime('-6 days')).'%')->get())),
        'day2' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y-m').'-'.date('d', strtotime('-5 days')).'%')->get())),
        'day3' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y-m').'-'.date('d', strtotime('-4 days')).'%')->get())),
        'day4' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y-m').'-'.date('d', strtotime('-3 days')).'%')->get())),
        'day5' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y-m').'-'.date('d', strtotime('-2 days')).'%')->get())),
        'day6' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y-m').'-'.date('d', strtotime('-1 days')).'%')->get())),
        'day7' => count(json_decode(CompanyProfile::where('created_at', 'like', '%'.date('Y-m-d').'%')->get()))
        ];

        $applicant_day[] = [
        'day1' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y-m').'-'.date('d', strtotime('-6 days')).'%')->get())),
        'day2' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y-m').'-'.date('d', strtotime('-5 days')).'%')->get())),
        'day3' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y-m').'-'.date('d', strtotime('-4 days')).'%')->get())),
        'day4' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y-m').'-'.date('d', strtotime('-3 days')).'%')->get())),
        'day5' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y-m').'-'.date('d', strtotime('-2 days')).'%')->get())),
        'day6' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y-m').'-'.date('d', strtotime('-1 days')).'%')->get())),
        'day7' => count(json_decode(JobSeekerProfile::where('created_at', 'like', '%'.date('Y-m-d').'%')->get()))
        ];
        
        return view('admin.dashboard', [
            'seekerCount' => $seeker,
            'companies' => $companies,
            'vacancy_recent' => $vacancy_recent,
            'vacancy_all' => $vacancy_all,
            'jobs_month' => json_decode(json_encode($jobs_month)),
            'companies_month' => json_decode(json_encode($companies_month)),
            'applicant_month' => json_decode(json_encode($applicant_month)),
            'jobs_year' => json_decode(json_encode($jobs_year)),
            'companies_year' => json_decode(json_encode($companies_year)),
            'applicant_year' => json_decode(json_encode($applicant_year)),
            'days' => json_decode(json_encode($days)),
            'jobs_day' => json_decode(json_encode($jobs_day)),
            'companies_day' => json_decode(json_encode($companies_day)),
            'applicant_day' => json_decode(json_encode($applicant_day))
            ]);
    }

    public function addadmin(){
        $admins = DB::table('users')->where('role', 1)->get();

        return view('admin.addadmin', ['admins' => $admins]);
    }    

    public function recent(){
        $recent_jobs = json_decode(OpenJob::where('created_at', 'like', '%'.date('Y-m').'%')->get());
        $jobs;

        foreach($recent_jobs as $job) {
            $date_raw = explode(' ', $job->created_at);
            $date_name = date_format(date_create($date_raw[0]), 'l');
            $jobs[] = [
            'id_vacant' => $job->unique_id,
            'date' => $date_raw[0],
            'date_name' => $date_name,
            'job_desc' => $job->notes,
            'job_spec' => $job->job_specialization
            ];
        }

        if(isset($jobs)) {
            return view('admin.recentjobs', ['jobs' => json_decode(json_encode($jobs))]); 
        }
        return view('admin.recentjobs', ['jobs' => null]); 
    }

    public function vacancyDetail($id) {
        $vacancy = json_decode(OpenJob::where('unique_id', $id)->get());
        $company = json_decode(CompanyProfile::where('email', $vacancy[0]->email)->get());

        return view('admin.detail-job-post', ['vacancy' => $vacancy, 'company' => $company]);
    }

    public function deleteVacancy($id) {        
        $a = OpenJob::where('unique_id', $id)->get();        
        
        OpenJob::where('unique_id', $id)->update(['status' => 'deleted']);

        $b = file_get_contents('json_files/pilgrim_trash.json');
        $json_b = json_decode($b, true);
        $json_b[] = [
        'id_job' => $a[0]->id_job,
        'job_specialization' => $a[0]->job_specialization,
        'employment_type' => $a[0]->employment_type,
        'work_location' => $a[0]->work_location,
        'sallary1' => $a[0]->sallary1,
        'sallary2' => $a[0]->sallary2,
        'benefits' => $a[0]->benefits,
        'field_of_studies' => $a[0]->field_of_studies,
        'skills' => $a[0]->skills,
        'language' => $a[0]->language,
        'notes' => $a[0]->notes,
        'due_date' => $a[0]->due_date,
        'email' => $a[0]->email,
        'company_email' => $a[0]->company_email,
        'banner_image' => $a[0]->banner_image,
        'created_at' => $a[0]->created_at,
        'updated_at' => $a[0]->updated_at
        ];

        file_put_contents('json_files/pilgrim_trash.json', json_encode($json_b));        
        OpenJob::where('unique_id', $id)->delete();

        return redirect()->route('admin.recentjobs');        
    }

    public function active(){
        $data = OpenJob::all();
        $vacancy;                

        for($i = 0; $i < count($data); $i++) {                                              
            if(strtotime($data[$i]->created_at) <= strtotime('now')) {                
                $vacancy[] = json_decode($data[$i], true);                
            }                        
        }

        if(isset($vacancy)) {
            return view('admin.activejobs', ['vacancies' => json_decode(json_encode($vacancy))]);
        }

        return view('admin.activejobs', ['vacancies' => null]);
    }

    public function applicants(){
        $seeker = DB::table('job_seeker_profile')->get();

        return view('admin.applicants', ['jobSeeker' => $seeker]);
    }

    public function searchApplicants(Request $r) {
        $input = $r->input('search');
        $name = JobSeekerProfile::where('first_name', 'like', '%'.$input.'%')->orWhere('last_name', 'like', '%'.$input.'%')->get();

        return view('admin.applicants', ['jobSeeker' => $name]);
    }

    public function searchCompanies(Request $r) {
        $input = $r->input('search');
        $name = CompanyProfile::where('company_name', 'like', '%'.$input.'%')->get();

        return view('admin.companies', ['companies' => $name]);
    }

    public function searchEmployers(Request $r) {
        $input = $r->input('search');
        $name = JobPosterProfile::where('full_name', 'like', '%'.$input.'%')->get();

        return view('admin.employers', ['employers' => $name]);
    }

    public function searchActiveJobs(Request $r) {
        $input = $r->input('search');
        $name = OpenJob::where('job_specialization', 'like', '%'.$input.'%')->get();

        return view('admin.activejobs', ['vacancies' => $name]);
    }

    public function searchRecentJobs(Request $r) {
        $input = $r->input('search');
        $name = json_decode(OpenJob::where([
            ['created_at', 'like', '%'.date('Y-m').'%'],
            ['job_specialization', 'like', '%'.$input.'%']
        ])->get());

        return view('admin.recentjobs', ['vacancies' => $name]);
    }
    public function employers(){
        $employers = DB::table('job_poster_profile')->get();

        return view('admin.employers', ['employers' => $employers]);
    }

    public function companies(){
        $companies = DB::table('company_profile')->get();

        return view('admin.companies', ['companies' => $companies]);
    }

    public function settings(){
        return view('admin.settings');
    }

    public function profile(){
        return view('admin.profile');
    }

    public function deleteAdmin($email){
        DB::table('users')->where([['role','1'],['email', $email]])->delete();
        $admins = DB::table('users')->where('role', 1)->get();

        return redirect()->route('admin.add', ['admins' => $admins]);
    }

    public function changepassadmin(){

    }


    public function showProfile($id)
    {
        $data['admin'] = User::find($id);
        return view('admin.profile')->with($data);
    }

    public function showApplicantProfile($email) {
        return view('admin.applicant-profile', ['email' => $email]);
    }
    public function showEmployersProfile($email) {
        return view('admin.employers-profile', ['email' => $email]);
    }

    public function changeRole(Request $r) {        
        $a = DB::table('users')->where('email', $r->input('email'))->get();

        if(json_decode($a)[0]->role == $r->input('role')) {
            return "It's same";
        }
        
        if($r->input('role') == "2") {
            $b = json_decode(DB::table('job_seeker_profile')->where('email', $r->input('email'))->get());                    

            $c = new JobPosterProfile;
            $c->full_name = $b[0]->first_name." ".$b[0]->last_name;
            $c->phone_number = $b[0]->phone_number;
            $c->email = $b[0]->email;
            $c->username = $r->input('username');
            $c->save();
            
            $d = new CompanyProfile;
            $d->email = $r->input('email');
            $d->save();

            DB::table('users')->where('email', $r->input('email'))->update(['role' => '2']);
            DB::table('job_seeker_profile')->where('email', $r->input('email'))->delete();

            return view('admin.applicant-profile', ['email' => $r->input('email')]);
        }
        else {
            return "Change to be jobseeker";
        }

        return view('admin.applicant-profile', ['email' => $r->input('email')]);
    }

    public function showEditProfileForm($id)
    {

    }

    public function updateProfile()
    {

    }
}
