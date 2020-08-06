<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hand extends Model
{
    protected $guarded = [];

    public function player()
    {
        return $this->belongsTo('App\Player', 'player_id');
    }
}
