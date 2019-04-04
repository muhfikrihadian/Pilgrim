<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPosterNotif extends Model
{
    protected $table = 'job_poster_notif';
    protected $primaryKey = 'id_poster_notif';    
    protected $fillable = [
    	'notif_description',
    	'notif_data',
    	'email',
    	'status'
    ];
}
