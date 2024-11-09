<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class createdbmovie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moviesdb', function (Blueprint $table) {
            $table->id();
            $table->integer('tmdb_id');
            $table->string('title');
            $table->string('tagline')->nullable();
            $table->string('path_movie')->nullable();
            $table->date('release_date')->nullable();
            $table->text('overview')->nullable();
            $table->string('poster_path')->nullable();
            $table->string('background_path')->nullable();
            $table->decimal('vote_average', 3, 1)->nullable();
            $table->json('genre_ids')->nullable();
            $table->integer('runtime')->nullable();
            $table->json('subtitle_link')->nullable();  // JSON field for subtitle links
            $table->integer('vote_count')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('moviesdbt');
    }
}
