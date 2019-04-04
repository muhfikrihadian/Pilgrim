<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeekerCertificate extends Model
{
    protected $table = 'seeker_certificate';
    protected $primaryKey = 'id_certificate';
    protected $fillable = [
        'certificate',
        'email'
    ];
}
