<?php

use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("name", 50);
            $table->string('email')->unique();
            $table->string("password", 30);
            $table->string("username")->unique();
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
        Schema::dropIfExists('artist');
    }
}
// Relationship via documentation and video and also implmented, mutators video and implementation.
// mutators in progress