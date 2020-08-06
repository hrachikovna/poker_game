<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class PokerGameBuilder extends Controller
{
    public function __construct()
    {
    }

    public static function getPlayers($limit)
    {
        return Player::all()->take($limit);
    }

    // It will assume that in real world the players are active users, but for this test we will just generate them
    // from database
    public static function generatePlayers()
    {
      return Artisan::call('db:seed');
    }

}
