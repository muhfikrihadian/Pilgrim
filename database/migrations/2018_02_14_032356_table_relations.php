<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create table(s) relation(s)
        // Schema::table('company_profile', function(Blueprint $table) {
        //     $table->foreign('id_poster_profile')
        //     ->references('id_poster_profile')
        //     ->on('job_poster_profile')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');

        //     $table->foreign('id_company_img')
        //     ->references('id_company_img')
        //     ->on('company_profile_img')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');

        //     $table->foreign('id_company_type')
        //     ->references('id_company_type')
        //     ->on('company_type')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');

        //     $table->foreign('id_image_dir')
        //     ->references('id_img_dir')
        //     ->on('company_profile_img_dir')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');            
        // });

        // Schema::table('job_poster_notif', function(Blueprint $table) {
        //     $table->foreign('id_poster_profile')
        //     ->references('id_poster_profile')
        //     ->on('job_poster_profile')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');            
        // });

        // Schema::table('job_poster_profile', function(Blueprint $table) {
        //     $table->foreign('id_image_dir')
        //     ->references('id_image_dir')
        //     ->on('poster_profile_image_dir')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');            

        //     $table->foreign('id_poster_image')
        //     ->references('id_poster_image')
        //     ->on('poster_profile_image')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');            
        // });        

        // Schema::table('job_seeker_notif', function(Blueprint $table) {
        //     $table->foreign('id_seeker_profile')
        //     ->references('id_seeker_profile')
        //     ->on('job_seeker_profile')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');
        // });

        // Schema::table('job_seeker_profile', function(Blueprint $table) {
        //     $table->foreign('id_seeker_image')
        //     ->references('id_seeker_image')
        //     ->on('seeker_profile_image')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');            

        //     $table->foreign('id_image_dir')
        //     ->references('id_image_dir')
        //     ->on('seeker_profile_image_dir')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');            

        //     $table->foreign('id_education')
        //     ->references('id_education')
        //     ->on('education')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');            
        // });

        // Schema::table('login_job_poster', function(Blueprint $table) {
        //     $table->foreign('id_poster_profile')
        //     ->references('id_poster_profile')
        //     ->on('job_poster_profile')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');                        
        // });

        // Schema::table('login_job_seeker', function(Blueprint $table) {
        //     $table->foreign('id_seeker_profile')
        //     ->references('id_seeker_profile')
        //     ->on('job_seeker_profile')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');                        
        // });

        // Schema::table('open_job', function(Blueprint $table) {
        //     $table->foreign('id_company')
        //     ->references('id_company')
        //     ->on('company_profile')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');                        

        //     $table->foreign('id_job_func')
        //     ->references('id_job_func')
        //     ->on('job_function')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');                        

        //     $table->foreign('id_job_type')
        //     ->references('id_job_type')
        //     ->on('job_type')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');                        

        //     $table->foreign('id_poster_profile')
        //     ->references('id_poster_profile')
        //     ->on('job_poster_profile')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');                        
        // });

        // Schema::table('seeker_certificate', function(Blueprint $table) {
        //     $table->foreign('id_seeker_profile')
        //     ->references('id_seeker_profile')
        //     ->on('job_seeker_profile')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');                        
        // });

        // Schema::table('seeker_resume', function(Blueprint $table) {
        //     $table->foreign('id_seeker_profile')
        //     ->references('id_seeker_profile')
        //     ->on('job_seeker_profile')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');                        
        // });
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
