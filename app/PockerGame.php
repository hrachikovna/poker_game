<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PockerGame extends Model
{
    protected $guarded = [];
    protected $table = 'poker_game';
    public function player()
    {
        return $this->belongsTo('App\Player');
    }
    public function hands()
    {
        return $this->hasMany('App\Hands', 'winner_hand_id');
    }
}
