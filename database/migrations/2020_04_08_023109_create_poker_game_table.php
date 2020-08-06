<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokerGameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poker_game', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id')->references('id')->on('players');
            $table->bigInteger('game_id');
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
        Schema::dropIfExists('poker_game');
    }
}
