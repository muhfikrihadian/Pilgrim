<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobSeekerProfile extends Model
{
    protected $table = 'job_seeker_profile';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone_number', 'image_dir', 'email', 'email_txt'
    ];

    public function user() 
    {
        return $this->hasOne('App\JobSeekerProfile', 'id', 'id_user');
    }
}
