<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeekerResume extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seeker_resume', function (Blueprint $table) {
            $table->increments('id_resume');            
            $table->text('project_experience')->nullable();
            $table->text('academic_achievement')->nullable();
            $table->text('skill')->nullable();
            $table->text('member_of_org')->nullable();
            $table->char('email', 100)->unique();
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
        // Schema::dropIfExists('seeker_resume');
    }
}
