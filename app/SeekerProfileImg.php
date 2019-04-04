<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeekerProfileImg extends Model
{
    protected $table = 'seeker_profile_image';
    protected $primaryKey = 'id_seeker_image';
    protected $fillable = [
        'image',
        'email'
    ];
}
