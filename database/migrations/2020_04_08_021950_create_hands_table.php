<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('hands', function (Blueprint $table) {
        $table->id()->autoIncrement()->unique();
        $table->unsignedBigInteger('player_id');
        $table->foreign('player_id')->references('id')->on('players');
        $table->string('hand');
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
        Schema::dropIfExists('hands');
    }
}
