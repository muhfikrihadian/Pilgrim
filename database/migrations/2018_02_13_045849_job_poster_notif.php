<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JobPosterNotif extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_poster_notif', function (Blueprint $table) {
            $table->increments('id_poster_notif');
            $table->char('notif_description', 100);
            $table->longText('notif_data');
            $table->char('email', 100);
            $table->char('status');
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
        // Schema::dropIfExists('job_poster_notif');
    }
}
