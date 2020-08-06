<?php


class Spade extends Card
{
    const KEY = 'S';
    private $_index = 4;

    public function getKey()
    {
        return $this->_key;
    }
    public function getIndex()
    {
        return $this->_index;
    }
    public function getSuit()
    {
        return self::KEY;
    }


}
