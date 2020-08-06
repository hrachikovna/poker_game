<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $guarded = [];


    public function winner()
    {
        return $this->hasMany('App\Winner', 'player_id');
    }
    public function saveWinner($game_id)
    {
        return $this->winner()->create([ 'poker_game_id'=>$game_id ]);
    }
    public function hands()
    {
        return $this->hasMany('App\Hand', 'player_id');
    }

    public function createHands(string $hand)
    {
        return $this->hands()->create(['hand'=>$hand]);
    }

    public function getHand()
    {
        return $this->hands()->get('hand');
    }


}
