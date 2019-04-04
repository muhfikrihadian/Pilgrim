<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompanyProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profile', function (Blueprint $table) {
            $table->increments('id_company');
            $table->char('company_name', 100)->default('null');
            $table->date('established_date')->default('2000-10-10');
            $table->text('address')->nullable();
            $table->char('employee_number')->default('null');
            $table->text('product_description')->nullable();
            $table->char('email', 100);
            $table->char('company_email', 100)->default('NULL');
            $table->char('phone_number', 100)->default('null');
            $table->text('other_description')->nullable();            
            $table->char('web', 100)->default('null');
            $table->text('banner_image')->nullable();
            $table->char('state')->default('active');
            $table->timestamps();            
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        
        //
    }
}
