<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeekerProfileImgDir extends Model
{
    protected $table = 'seeker_profile_image_dir';
    protected $primaryKey = 'id_image_dir';
    protected $fillable = [
        'image_dir',
        'email'
    ];
}
