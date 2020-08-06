<?php

namespace App\Jobs;

use App\Game;
use App\Hand;
use App\Http\Controllers\HandController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PokerGameBuilder;
use App\Player;
use App\PockerGame;
use Faker\Factory as Faker;
use Faker\Provider\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;

class StoreHands implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $_hand_pairs_of_game;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($hand_pairs_of_game)
    {
      $this->_hand_pairs_of_game = $hand_pairs_of_game;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function   handle()
    {
        try {
            collect($this->_hand_pairs_of_game)->each(function ($hand_pair) {
                $players = PokerGameBuilder::getPlayers(count($hand_pair));
                $game_players_with_hands = collect($hand_pair)->map(function ($hand_, $key) use ($players){
                    $player = new PlayerController(new HandController($hand_), $players[$key]);
                    $player->saveHand();
                    return $player;
                });

                $game = $this->createTheGame();
                $this->savePlayersForCurrentGame($game, $players);
                $winner = $this->compareHands($game_players_with_hands->all());

                $winner->saveWinner($game->id);


            });


        } catch (\Throwable $throwable) {
            return $throwable->getMessage();
        }
    }
    protected function generateGameName() : string
    {
        $random_name = Faker::create(Company::companySuffix());
        return  $random_name->name .' Game';
    }
    protected function saveGameRound($data) :PockerGame
    {
        return PockerGame::create($data);
    }
    protected function createTheGame() : Game
    {
        return Game::create(['name'=>$this->generateGameName()]);
    }
    protected function savePlayersForCurrentGame($game, $players)
    {
        return $players->map(function ($player) use($game) {
            return $this->saveGameRound(['game_id'=>$game->id, 'player_id'=>$player->id]);
        });
    }
    protected function compareHands($players)
    {
        $poker_game_service = App::make('HandService')($players);
        return $poker_game_service->compareHands($players);
    }

}
