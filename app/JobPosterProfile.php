<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPosterProfile extends Model
{
    protected $table = 'job_poster_profile';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'full_name', 'phone_number', 'position_title', 'email'
    ];

    public function user() 
    {
        return $this->hasOne('App\JobPosterProfile', 'id', 'id_user');
    }
}
