<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\OpenJob;
use App\CompanyProfile;
use App\JobPosterProfile;
use App\JobPosterNotif;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$openJob = DB::table('open_job')->get();
    return view('welcome', ['openJob' => $openJob]);
});

Route::get('employer','HomeController@landing_page_company')->name('company.landing.page');

//Search page
Route::get('search-result', function() {
	return view('search-result', ['vacancies' => null, 'web' => null]);
})->name('search-vacancy');

//search result
Route::post('search-result', function(Request $r) {
	$companyWeb = null;
	$vacancy;
	if(isset($r->search_position)) {
		$vacancy = OpenJob::where([
			['job_specialization', 'like', '%'.$r->search_position.'%'],
			['employment_type', 'like', '%'.$r->search_type.'%'],
			['skills', 'like', '%'.$r->search_skills.'%']
		])->get();
	}

	else {
		$vacancy = OpenJob::where([
			['job_specialization', 'like', '%'.$r->search_position.'%'],
			['employment_type', 'like', '%'.$r->search_type.'%']			
		])->get();	
	}
	foreach($vacancy as $result) {
		$companyWeb = CompanyProfile::select('web')->where('email', $result->email)->get();
	}
	return view('search-result', ['vacancies' => $vacancy, 'web' => $companyWeb]);
});

//Vacancy Detail
Route::get('vacancy-detail/{id}', function($id) {
	$openJob = OpenJob::where('unique_id', $id)->get();
	$company = CompanyProfile::where('email', $openJob[0]->email)->get();	

	return view('detail-job-post', ['vacancy' => $openJob, 'company' => $company]);
})->name('vacancy-detail');

Route::get('employer/register', 'Auth\RegisterController@showRegisterFormJobPoster')->name('jobposter.register');
Route::post('employer/register', 'Auth\RegisterController@registerJobPoster')->name('jobposter.register.submit');
Route::get('jobseeker/register', 'Auth\RegisterController@showRegisterFormJobSeeker')->name('jobseeker.register');
Route::post('jobseeker/register', 'Auth\RegisterController@registerJobSeeker')->name('jobseeker.register.submit');

Route::get('job-search/','HomeController@jobsearch')->name('jobsearch');
Route::get('search-result-talent/','HomeController@talentSearch')->name('talentsearch');

Auth::routes();

Route::group(['prefix' => 'admin'] , function()	{
	Route::group(['middleware' => 'admin'], function()	{
		Route::get('admin/register', 'Auth\RegisterController@showRegisterFormAdmin')->name('admin.register');
		Route::post('admin/register', 'Auth\RegisterController@registerAdmin')->name('admin.register.submit');
		Route::get('/dashboard', 'AdminController@dashboard')->name('admin');
		Route::get('/addadmin', 'AdminController@addadmin')->name('admin.add');
		Route::get('/recentjobs', 'AdminController@recent')->name('admin.recentjobs');
		Route::get('/activejobs', 'AdminController@active')->name('admin.active');
		Route::get('/applicants', 'AdminController@applicants')->name('admin.applicants');
		Route::get('/employers', 'AdminController@employers')->name('admin.employers');	
		Route::get('/companies', 'AdminController@companies')->name('admin.companies');
		Route::get('/settings', 'AdminController@settings')->name('admin.settings');
		Route::post('/addadmin/submit', 'AdminController@registerAdmin')->name('admin.add.submit');		
		Route::get('/vacancy_detail/{id}', ['uses' => 'AdminController@vacancyDetail'])->name('admin.detail.vacancy');
		Route::get('/delete_vacancy/{id}', ['uses' => 'AdminController@deleteVacancy'])->name('admin.delete.vacancy');
		
		// Admin Profile
		Route::get('/{id}/profile', ['uses' => 'AdminController@showProfile'])->name('admin.profile');		
		Route::get('/edit/profile/{id}', 'AdminController@showEditProfileForm')->name('admin.edit.profile');
		Route::get('/applicant/{email}', ['uses' => 'AdminController@showApplicantProfile'])->name('admin.applicant.profile');
		Route::get('/employers/{email}', ['uses' => 'AdminController@showEmployersProfile'])->name('admin.employers.profile');
		Route::post('/edit/profile', 'AdminController@updateProfile')->name('admin.edit.profile.submit');		
		Route::post('/edit/role', 'AdminController@changeRole')->name('admin.edit.role');
		Route::post('/delete/{email}', ['uses' => 'AdminController@deleteAdmin'])->name('admin.delete.submit');
		Route::post('/applicants', 'AdminController@searchApplicants')->name('admin.applicants.search');
		Route::post('/companies', 'AdminController@searchCompanies')->name('admin.companies.search');
		Route::post('/employers', 'AdminController@searchEmployers')->name('admin.employers.search');
		Route::post('/activejobs', 'AdminController@searchActiveJobs')->name('admin.activejobs.search');
		Route::post('/recentjobs', 'AdminController@searchRecentJobs')->name('admin.recentjobs.search');
	});
});

Route::group(['prefix' => 'employer'] , function()	{
	Route::group(['middleware' => 'jobposter'], function()	{
		Route::get('/dashboard', 'JobPosterController@dashboard')->name('jobposter');
		Route::get('/job_ads', 'JobPosterController@jobAds')->name('jobposter.ads');
		Route::get('/form_job_posting', 'JobPosterController@jobposting')->name('jobposter.post.job');
		Route::get('/remove/vacancy/{id}', ['uses' => 'JobPosterController@removeVacancy'])->name('jobposter.remove.vacancy');
		Route::post('/form_job_posting', 'JobPosterController@jobPostingSubmit')->name('jobposter.post.submit');
		Route::get('/detail_job/{id}',['uses' => 'JobPosterController@detailJobPosting'])->name('jobposter.detail.job');
		Route::get('/edit_job/{jobID}', ['uses' => 'JobPosterController@editJob'])->name('jobposter.edit.job');
		Route::post('/edit_job/edit', 'JobPosterController@editJobSubmit')->name('jobposter.edit.job.submit');
		Route::get('/notification/{email}', function($email){
			$notif = JobPosterNotif::where([
				['status', '!=', 'read'],
				['email', $email]
			])->get();

			return $notif;
		});
		Route::get('/detail/applicant','JobPosterController@showApplicant')->name('jobposter.detail.applicant');
	});
});

Route::group(['prefix' => 'company'], function() {
	Route::get('/create/profile','CompanyController@create_profile')->name('company.profile.add');
	Route::get('/profile','CompanyController@profile')->name('company.profile');
	Route::get('/edit/profile/','CompanyController@edit_profile')->name('company.profile.edit');
  	Route::post('/company/profile','CompanyController@editCompanyProfile')->name('company.profile.update');
  	Route::post('/create/profile','CompanyController@createCompanyProfile')->name('company.profile.create');
});

Route::group(['prefix' => 'jobseeker'] , function()	{
	Route::group(['middleware' => 'jobseeker'], function()	{
		Route::get('/', 'JobSeekerController@dashboard')->name('jobseeker');
		Route::get('applyOrSaved/{id}/{email}/{status}/{employer_email}', ['uses' => 'JobSeekerController@saveOrApplyVacancy'])->name('apply-or-saved');
		Route::get('apply-from-saved/{id}', ['uses' => 'JobSeekerController@applyFromSaved'])->name('apply.from.saved');
		Route::get('cancel-apply/{id}', ['uses' => 'JobSeekerController@cancelApply'])->name('cancel.apply');
		Route::get('remove-apply/{id}', ['uses' => 'JobSeekerController@removeApply'])->name('remove.apply');
	});
});