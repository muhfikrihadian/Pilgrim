<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobSeekerNotif extends Model
{
    protected $table = 'job_seeker_notif';
    protected $primaryKey = 'id_seeker_notif';
    protected $fillable = [
        'notif_description',
        'email'
    ];
}
