<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OpenJob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open_job', function (Blueprint $table) {
            $table->increments('id_job');            
            $table->char('unique_id', 255);
            $table->char('job_specialization', 100);
            $table->char('others_job_specialization',100)->default('No Others');
            $table->char('employment_type', 100);
            $table->char('work_location', 100);
            $table->char('currency', 100);
            $table->char('sallary1', 100);
            $table->char('sallary2', 100);
            $table->char('benefits', 100);
            $table->char('skills', 100);
            $table->char('language', 100);
            $table->text('notes')->nullable();
            $table->char('due_date', 100);
            $table->char('email');
            $table->char('company_email', 100);
            $table->text('banner_image')->nullable();
            $table->char('status')->default('exist');
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
        // Schema::dropIfExists('open_job');
    }
}
