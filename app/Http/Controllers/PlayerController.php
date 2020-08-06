<?php
namespace App\Http\Controllers;

use App\Hand;
use App\PockerGame;
use App\Winner;
use Illuminate\Http\Request;
use App\Player;
use Illuminate\Support\Collection;
class PlayerController extends Controller
{
    private  $_player;
    private  $_hand;
    private  $_is_winner = false;

    public function __construct(HandController $hand, Player $player)
    {
        $this->_player = $player;
        $this->_hand = $hand;
    }

    public function setWinner(bool $winner) : bool
    {
        return $this->_is_winner = $winner;
    }
    public function setHandScore($score)
    {
        return $this->_hand->setScore($score);
    }
    public function getHandScore()
    {
        return $this->_hand->getScore();
    }
    public function getHandWithPureArray()
    {
        return $this->_hand->getHandWithPureArray();
    }
    public function getHand()
    {
        return $this->_hand->getHand();
    }
    public function getHandWithSuits()
    {
        return $this->_hand->getHandWithSuits();
    }
    public function setPlayer(Player $player) : Player
    {
        return $this->_player = $player;
    }

    public function getPlayer(Player $player) : Player
    {
        return $this->_player;
    }

    public function saveHand()
    {
      return $this->_player->createHands($this->_hand->getHandAsAStringFromArray());
    }
    public function saveWinner(int $game_id)
    {
        return $this->_player->saveWinner($game_id);
    }

    public function getWinnings()
    {
        //todo get winnings
    }


}
