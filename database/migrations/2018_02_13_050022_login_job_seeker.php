<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LoginJobSeeker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login_job_seeker', function (Blueprint $table) {
            $table->increments('id_login_seeker');
            $table->char('username', 100);
            $table->char('password', 100);
            $table->integer('id_seeker_profile')->unsigned();
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
        // Schema::dropIfExists('login_job_seeker');
    }
}
