<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        //For droping tables
        Schema::dropIfExists('company_profile');
        Schema::dropIfExists('company_profile_img');
        Schema::dropIfExists('company_profile_img_dir');
        Schema::dropIfExists('company_type');
        Schema::dropIfExists('education');
        Schema::dropIfExists('job_function');
        Schema::dropIfExists('job_poster_profile');
        Schema::dropIfExists('job_poster_notif');
        Schema::dropIfExists('job_seeker_notif');
        Schema::dropIfExists('job_seeker_profile');
        Schema::dropIfExists('job_type');
        Schema::dropIfExists('login_job_poster');
        Schema::dropIfExists('login_job_seeker');
        Schema::dropIfExists('open_job');
        Schema::dropIfExists('poster_profile_image');
        Schema::dropIfExists('poster_profile_image_dir');
        Schema::dropIfExists('seeker_certificate');
        Schema::dropIfExists('seeker_profile_image');
        Schema::dropIfExists('seeker_profile_image_dir');
        Schema::dropIfExists('seeker_resume');
        Schema::dropIfExists('applied_job');
    }
}
