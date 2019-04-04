<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppliedJob extends Model
{
    protected $table = 'applied_job';
    protected $fillable = [
        'vacancy_id',
        'seeker_email',
        'status'
    ];
}
