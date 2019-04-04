<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        if($this->role == 1) return true;
        return false;
    }

    public function isJobPoster()
    {
        if($this->role == 2) return true;
        return false;
    }

    public function isJobSeeker()
    {
        if($this->role == 3) return true;
        return false;
    }

    public function adminProfile() 
    {
        return $this->hasOne('App\AdminProfile','id_user','id');
    }

    public function jobposterProfile() 
    {
        return $this->hasOne('App\JobPosterProfile','email','email');
    }

    public function jobseekerProfile() 
    {
        return $this->hasOne('App\JobSeekerProfile','email','email');
    }    

    public function companyProfile() {
        return $this->hasOne('App\CompanyProfile', 'email', 'email');
    }

    public function ArkademyProfile($param) {
        $curl = curl_init("https://arkademy.com/admin/API_users_dev/getProfile_byemail/".urlencode($param));

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Bearer ELHvxxfwpXuAy60lXI.fSOv78Z5.gcnVdvTceCxmLPDwg7Ry29cGi"));

        $response = curl_exec($curl);
        $response=json_decode($response);

        return $response;
    }

    public function jobSeekerApply() {
        return $this->hasOne('App\OpenJob', 'email', 'email');
    }
}