<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWinnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('winners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('poker_game_id');
            $table->foreign('poker_game_id')->references('id')->on('poker_game');
            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id')->references('id')->on('players');
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
        Schema::dropIfExists('winner');
    }
}
