<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosterProfileImage extends Model
{
    protected $table = 'poster_profile_image';
    protected $primaryKey = 'id_poster_image';
    protected $fillable = ['image', 'email'];
}
