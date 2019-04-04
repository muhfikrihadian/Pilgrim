<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeekerResume extends Model
{
    protected $table = 'seeker_resume';
    protected $primaryKey = 'id_resume';
    protected $fillable = [
        'project_experience',
        'academic_achievement',
        'skill',
        'member_of_org',
        'email'
    ];
}
