<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DataSeeder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //Seeding data statis

    public function up()
    {
        DB::table('job_type')->insert([
            ['type'=> 'IT Support'],
            ['type'=> 'Software Engineer'],
            ['type'=> 'Database Administrator'],
            ['type'=> 'Web Administrator'],
            ['type'=> 'Web Developer'],
            ['type'=> 'Web Designer'],
            ['type'=> 'Network Engineer'],
            ['type'=> 'System Analyst'],
            ['type'=> 'Network Engineer'],
            ['type'=> 'Computer Security Specialists'],
            ['type'=> 'Game Developer'],
            ['type'=> 'Game Tester'],
            ['type'=> 'Social Media Support'],
            ['type'=> 'Network Developer'],
            ['type'=> 'Network Information and Security'],
            ['type'=> 'Software Management'],
            ['type'=> 'Software Modeling and Process Design'],
            ['type'=> 'Software Tester and Analysis'],
            ['type'=> 'SEO Marketing'],
            ['type'=> 'Java Development'],
            ['type'=> 'Mobile Development'],
            ['type'=> 'Statistical Analysis dan Data Mining'],
            ['type'=> 'Artificial Intelligence']            
        ]);   

        DB::table('education')->insert([
            ['education' => 'SD'],
            ['education' => 'SMP'],
            ['education' => 'SMK']
        ]);
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
