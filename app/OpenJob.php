<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpenJob extends Model
{
    protected $table = 'open_job';
    protected $primaryKey = 'id_job';
    protected $fillable = [
        'employment_type',
        'job_specialization',
        'work_location',
        'sallary1',
        'sallary2',
        'benefits',
        'skills',
        'language',
        'notes',
        'due_date',
        'email',
        'company_email',
        'banner_image',
        'unique_id',
        'currency',
        'status'
    ];
    
    static public function openJob($email) {        
        return OpenJob::where('email', '=', $email)->get();
    }

    static public function openJobAll() {
        return OpenJob::all();
    }

    static public function openJobByID($id) {        
        return OpenJob::where('unique_id', '=', $id)->get();
    }
}
