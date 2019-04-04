<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PosterProfileImageDir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poster_profile_image_dir', function (Blueprint $table) {
            $table->increments('id_image_dir');
            $table->char('image_dir', 100)->default('user_default');
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
        // Schema::dropIfExists('poster_profile_image_dir');
    }
}
