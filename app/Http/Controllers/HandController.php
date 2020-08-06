<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

use Illuminate\Support\Str;


class HandController extends Controller
{
    private $_hand;
    private $_score = 0;

    public function __construct( Collection $hand)
    {
        $this->_hand = $hand;
    }

    public function getHandsFromStringLineAsAnArray(string  $handsStringLine) : array
    {
        // todo @return array of cards
    }

    public function setScore($score)
    {
        return $this->_score = $score;
    }

    public function getScore()
    {
        return $this->_score;
    }

    public function getHand()
    {
        return $this->_hand;
    }

    public function setHand(  \Hand $hand): \Hand
    {
        return $this->_hand;
    }

    public function getHandAsAStringFromArray() : string
    {
        return $this->_hand->implode(' ');
    }

    protected function getHandAsArrayFromString(string $hand) : array
    {
        //todo get array from string
    }

    public function getHandWithSuits()
    {
        try {
            return $this->_hand->map(function ($item) {
                $face =  (string) Str::of($item)->substr(0,1);
                $suit = strtoupper((string) Str::of($item)->substr(1));
                $value = (int) $face ? (int) $face : constant('Cards::'.$face);

                return  App::make($suit)($value);

            })->all();
        } catch (Throwable $throwable) {
            return $throwable->getMessage();
        }
    }


    public function getHandWithPureArray()
    {
        return array_map(array($this, 'transformCardIntoArray'), $this->getHandWithSuits());
    }
    private function transformCardIntoArray($hand)
    {
        return array('suit' => $hand->getIndex(), 'value' => $hand->getValue());
    }

































    public  function  makeHandOfStringCards(string $hand)
    {
        return App::make('HandService')($hand);
    }



    private function  getCardsCollection($hand)
    {
        $players_cards =  $this->makeHandOfStringCards($hand);
        return $this->makeHandWithCardObjects($players_cards);
    }



    public  function  makeHandWithCardObjects( $hand)
    {
        return new \Cards($hand->getGeneratedHand());
    }
}
