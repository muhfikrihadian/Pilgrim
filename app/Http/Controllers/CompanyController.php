<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\CompanyProfile;

class CompanyController extends Controller
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

    public function profile()
    {
    	return view('company.profile');
    }

    public function create_profile()
    {
        return view('company.create-profile');
    }

    public function edit_profile()
    {
        return view('company.edit-profile');
    }

    public function editCompanyProfile(Request $r) {        
        $bannerImage = $r->file('banner_image');
        
        if(isset($bannerImage)) {
            $imageName = $bannerImage->getClientOriginalName();
            $r->file('banner_image')->move(public_path('image/company'), $imageName);        

            $data = [
                'company_name' => $r->input('company_name'),
                'address' => $r->input('address'),
                'employee_number' => $r->input('employee_number'),
                'product_description' => $r->input('main_sector'),
                'company_email' => $r->input('company_email'),
                'phone_number' => $r->input('phone_number'),
                'other_description' => $r->input('company_description'),
                'web' => $r->input('website'),
                'banner_image' => $imageName            
            ];

            \App\CompanyProfile::where('email', $r->input('email'))->update($data);
        }
        else {
            $data = [
                'company_name' => $r->input('company_name'),
                'address' => $r->input('address'),
                'employee_number' => $r->input('employee_number'),
                'product_description' => $r->input('main_sector'),
                'company_email' => $r->input('company_email'),
                'phone_number' => $r->input('phone_number'),
                'other_description' => $r->input('company_description'),
                'web' => $r->input('website')
            ];

            \App\CompanyProfile::where('email', $r->input('email'))->update($data);
        }

        return view('company.profile');
        // return $r->all();
    }
    public function createCompanyProfile(Request $r) {        
        $bannerImage = $r->file('banner_image');
        
        if(isset($bannerImage)) {
            $imageName = $bannerImage->getClientOriginalName();
            $r->file('banner_image')->move(public_path('image/company'), $imageName);        

            $data = [
                'company_name' => $r->input('company_name'),
                'address' => $r->input('address'),
                'employee_number' => $r->input('employee_number'),
                'product_description' => $r->input('main_sector'),
                'company_email' => $r->input('company_email'),
                'phone_number' => $r->input('phone_number'),
                'other_description' => $r->input('company_description'),
                'web' => $r->input('website'),
                'banner_image' => $imageName            
            ];

            \App\CompanyProfile::where('email', $r->input('email'))->insert($data);
        }
        else {
            $data = [
                'company_name' => $r->input('company_name'),
                'address' => $r->input('address'),
                'employee_number' => $r->input('employee_number'),
                'product_description' => $r->input('main_sector'),
                'company_email' => $r->input('company_email'),
                'phone_number' => $r->input('phone_number'),
                'other_description' => $r->input('company_description'),
                'web' => $r->input('website')
            ];

            \App\CompanyProfile::where('email', $r->input('email'))->insert($data);
        }

        return view('company.profile');
        // return $r->all();
    }
}
