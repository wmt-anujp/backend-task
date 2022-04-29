<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track', function (Blueprint $table) {
            $table->foreignId("album_id")->references('album_id')->on("album");
            $table->string("title", 800);
            $table->binary("file");
            $table->enum('track_type', ['POP', 'Classic', 'Jazz', 'Rock', 'Disco']);
            $table->time("track_time");
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
        Schema::dropIfExists('track');
    }
}
