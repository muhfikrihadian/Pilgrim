<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $table = 'company_profile';
    protected $primaryKey = 'id_company';
    protected $fillable = [
        'company_name',
        'established_date',
        'address',
        'employee_number',
        'product_description',
        'email',
        'phone_number',
        'other_description',
        'company_email',
        'banner_image',
        'web'        
    ];
}
