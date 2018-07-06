<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('time')->nullable();
            $table->integer('section')->nulable();
            $table->longText('making')->nulable();
            $table->integer('like')->nulable();
            $table->string('cuisine')->nulable();
            $table->string('avatar')->nulable();
            $table->integer('diffculty_id')->nulable();
            $table->integer('user_id')->nulable();
            $table->integer('collection_id')->nulable();
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
        Schema::dropIfExists('recipes');
    }
}
