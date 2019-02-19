<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWatchedVideosTable extends Migration
{
    public function up()
    {
        Schema::create('watched_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('video_id');
            $table->string('image_url');
            $table->string('title');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('watched_videos');
    }
}
