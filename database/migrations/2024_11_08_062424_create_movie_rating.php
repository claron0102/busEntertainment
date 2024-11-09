<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movie_rating', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id'); // movie_id without foreign key
            $table->unsignedBigInteger('user_id')->nullable(); 
        $table->integer('rating')->unsigned()->comment('1 to 5 scale');
        $table->text('review')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_rating');
    }
};
