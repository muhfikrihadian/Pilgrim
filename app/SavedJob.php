<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedJob extends Model
{
    protected $table = 'saved_job';
    protected $fillable = [
        'vacancy_id',
        'seeker_email',
        'status'
    ];
}
