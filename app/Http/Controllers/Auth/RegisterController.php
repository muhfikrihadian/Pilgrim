<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\User;
use App\AdminProfile;
use App\JobPosterProfile;
use App\JobSeekerProfile;
use App\PosterProfileImage;
use App\PosterProfileImageDir;
use App\CompanyProfile;
use App\SeekerProfileImg;
use App\SeekerProfileImgDir;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:6|confirmed',
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //     ]);
    // }

    public function showRegisterFormJobPoster()
    {
        return view('auth.jobposter_register');
    }

    public function registerJobPoster(Request $r)
    {
        $user = new User;
        $user->email = $r->input('email');
        $user->password = bcrypt($r->input('password'));
        $user->role = 2;
        $user->save();

        $profile = new JobPosterProfile;
        $profile->username = $r->input('username');
        $profile->full_name = $r->input('full_name');
        $profile->phone_number = $r->input('phone_number');
        $profile->position_title = $r->input('position_title');
        $profile->email = $r->input('email');
        $profile->save();        

        $companyProfile = new CompanyProfile;
        $companyProfile->email = $r->input('email');        
        $companyProfile->save();

        return redirect(route('jobposter'));
    }

    public function showRegisterFormJobSeeker()
    {
        return view('auth.jobseeker_register');
    }

    public function registerJobSeeker(Request $r)
    {
        $curl = curl_init("https://arkademy.com/admin/API_users_dev/getProfile_byemail/".urlencode($r->input('email')));

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Bearer ELHvxxfwpXuAy60lXI.fSOv78Z5.gcnVdvTceCxmLPDwg7Ry29cGi"));

        $response = curl_exec($curl);
        $response=json_decode($response);
        
        if(isset($response->basicInfo[0]->email)) {
            $user = new User;
            $user->email = $r->input('email');
            $user->password = bcrypt($r->input('password'));
            $user->role = 3;
            $user->save();

            $profile = new JobSeekerProfile;
            $profile->id_user = $user->id;
            $profile->first_name = $r->input('first_name');
            $profile->last_name = $r->input('last_name');
            $profile->phone_number = $r->input('phone_number');
            $profile->email = $r->input('email');
            $profile->save();            

            return redirect(route('jobseeker'));
        }                

        return view('layouts.exception');
    }    
}
