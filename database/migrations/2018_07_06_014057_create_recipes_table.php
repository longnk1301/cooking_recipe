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
            $table->integer('like')->default(0);
            $table->string('cuisine')->nulable();
            $table->string('avatar')->nulable();
            $table->integer('status')->default(1);
            $table->integer('diffculty_id')->nulable();
            $table->integer('dish_type_id')->nulable();
            $table->integer('user_id')->nulable();
            $table->integer('collection_id')->default(-1);
            $table->integer('cooking_method_id')->nulable();
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
