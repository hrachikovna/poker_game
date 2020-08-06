<?php
class Cards
{
    const T = 10; // Jack
    const J = 11; // Jack
    const Q = 12; // Queen
    const K = 13; // King
    const A = 14; // Ace

    protected $_cards = [];

    public function __construct(array $cards)
    {
        $this->_cards = $cards;
    }

    public static function get($constant)
    {
      return self::$constant;
    }

    public function getCardsAsString()
    {
       return collect(array_map(array($this, 'transformCardIntoString'), $this->_cards))->implode(' ');
    }

    private function transformCardIntoString(\Card $card)
    {
        $face_value =  $card->getValue() >= 10 ?
            Arr::first(array_values(array_keys($this->getSuitKeyFromConsts( $card->getValue())))) :
            $card->getValue();
        return  $face_value.$card->getSuit();
    }

    private function getSuitKeyFromConsts($suit_value)
    {
        $refl = new ReflectionClass(get_class());
        return Arr::where($refl->getConstants(), function ($const, $key) use($suit_value) {
            return $suit_value === $const;
        });

    }
}
