<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\AppliedJob;
use App\SavedJob;
use App\JobPosterNotif;

class JobSeekerController extends Controller
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
        return view('jobseeker.dashboard');
    }

    public function saveOrApplyVacancy($id, $email, $status, $employer_email) {
        $a = new AppliedJob;
        $a->vacancy_id = $id;
        $a->seeker_email = $email;
        $a->status = $status;
        $a->save();

        $c = new SavedJob;
        $c->vacancy_id = $id;
        $c->seeker_email = $email;
        $c->status = $status;
        $c->save();

        $b = new JobPosterNotif;
        $b->notif_description = "Someone Saved/Applied Your Vacancy";
        $b->notif_data = "Testing Notification Feature";
        $b->email = $employer_email;
        $b->status = "unread";
        $b->save();

        return redirect()->route('jobseeker', ['id' => $id]);
    }

    public function applyFromSaved($id) {
        AppliedJob::where('vacancy_id', $id)->update(['status' => 'applied']);
        return redirect()->route('jobseeker');
    }    

    public function cancelApply($id) {
        AppliedJob::where('vacancy_id', $id)->delete();

        return redirect()->route('jobseeker');
    }

    public function removeApply($id) {
        AppliedJob::where('vacancy_id', $id)->delete();

        return redirect()->route('jobseeker');
    }
}
