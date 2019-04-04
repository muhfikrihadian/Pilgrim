<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosterProfileImageDir extends Model
{
    protected $table = 'poster_profile_image_dir';
    protected $primaryKey = 'id_image_dir';
    protected $fillable = ['image_dir', 'email'];
}
