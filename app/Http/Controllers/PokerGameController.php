<?php

namespace App\Http\Controllers;

use App\Game;
use App\Hand;
use App\Jobs\StoreHands;
use App\Player;
use App\PockerGame;
use Faker\Provider\Company;
use Faker\Provider\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PokerGameController extends Controller
{
    private $game_round = [];
    private $_faker;
    public function __construct()
    {
        PokerGameBuilder::generatePlayers();

    }
    public  function  storeHands(Request $request)
    {
        if($request->hasFile('hands'))
        {
            $file = $request->file('hands');
            $hand_pairs = $this->readHandsFromFile($file);
            StoreHands::dispatch($hand_pairs);
            return back();
        }
    }
    public  function  readHandsFromFile($file)
    {
        $hand_pairs = [];

        try {
            $openHandFile = fopen($file,'r');
            while (!feof($openHandFile))
            {
                $getTextLine = fgets($openHandFile);
                if($getTextLine == '' || $getTextLine == '\n' || $getTextLine == '\r' ) {
                   continue;
                }
                $players_hands = collect($this->getPlayersHandsFromString($getTextLine));
                if($players_hands) {
                    $hand_pairs[] = $this->getHandsByFiveCard($players_hands);
                }
            }
            fclose($openHandFile);

            return $hand_pairs;
        } catch (\Throwable $throwable ) {
            throw new \Exception($throwable->getMessage());
        }
    }
    private function  getPlayersHandsFromString(string $stringLine) : array
    {
        try {
            $explodeLine = explode(",", $stringLine);
            list($hand_lines) =  str_replace(array("\n", "\r"), '', $explodeLine);

            if (isset($hand_lines) && $hand_lines !=='') {
                return  Str::of($hand_lines)->explode(' ')->all();
            }
        } catch (\Throwable $throwable ) {
            return $throwable->getMessage();
        }
    }
    private function  getHandsByFiveCard(Collection $players_hands): array
    {
        return $players_hands->chunk(5)->all();
    }

}
