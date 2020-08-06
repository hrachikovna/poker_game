<?php
class Suit
{
    const HEART = 'Heart';
    const SPADE = 'Spade';
    const CLUB = 'Club';
    const DIAMOND = 'Diamond';

    private $_suit;
    private $_value;

    public function __construct($_value, $_suit)
    {
      $this->_suit = $_suit;
      $this->_value = $_value;
    }

    public function getCard($cardValue)
    {
        $CardOfSuit = new ReflectionClass($this->_suit);
        return $CardOfSuit->newInstance($cardValue);
    }
    public function getValue()
    {
        return $this->_value;

    }
    public function getSuit()
    {
        return $this->_suit;
    }

    public static function Heart()
    {
        return new Suit(1, self::Heart);
    }

    public static function Spade()
    {
        return new Suit(2, self::SPADE);
    }

    public static function Club()
    {
        return new Suit(3, self::CLUB);
    }

    public static function Diamond()
    {
        return new Suit(3,self::DIAMOND );
    }


}
