<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::table('users')->insert(
            [
                'email' => 'fikri@admin.com',
                'password' => bcrypt('fikri'),
                'role' => 1                
            ]
        );        

        DB::table('job_poster_notif')->insert(
            [
                'notif_description' => 'Test Notifikasi',
                'notif_data' => 'Hello Nigga',
                'email' => 'tamboto@gmail.com',
                'status' => 'sended'            
            ]
        );
    }
}
