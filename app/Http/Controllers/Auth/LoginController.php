<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use App\CompanyProfile;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('guest')->except('logout');
    }

    public function login(Request $request) 
    {
      $this->validateLogin($request);
      
      if ($this->hasTooManyLoginAttempts($request)) {
        $this->fireLockoutEvent($request);
        return $this->sendLockoutResponse($request);
      }

      if ($this->attemptLogin($request)) {
        if (Auth::user()->role == 1) {
          return redirect('/admin/dashboard')->with('success','Login Success!');;
        }
        if (Auth::user()->role == 2) {          
          $profile = json_decode(CompanyProfile::where('email', Auth::user()->companyProfile->email)->get());

          if($profile[0]->company_name === "null" || $profile[0]->address === "null" || $profile[0]->employee_number === "null" || $profile[0]->product_description === "null" || $profile[0]->company_email === "null" || $profile[0]->phone_number === "null" || $profile[0]->other_description === "null" || $profile[0]->web === "null" || $profile[0]->banner_image === "null") {
            return redirect('/company/create/profile/')->with('success','Complete Profile!');;
          }

          return redirect('/employer/dashboard')->with('success','Login Success!');
        }
        if (Auth::user()->role == 3) {
          return redirect('/jobseeker')->with('success','Login Success!');;
        }
        return $this->sendLoginResponse($request);
      }

      $this->incrementLoginAttempts($request);
      return $this->sendFailedLoginResponse($request);
    }
}
