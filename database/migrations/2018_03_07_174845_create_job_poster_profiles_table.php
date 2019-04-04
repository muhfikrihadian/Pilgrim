<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPosterProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_poster_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('position_title')->nullable();
            $table->string('profile_image')->nullable();
            $table->char('email', 100);
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
        Schema::dropIfExists('job_poster_profile');
    }
}
