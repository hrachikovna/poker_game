<?php

class Heart extends Card
{
    const KEY = 'H';
    private $_index = 3;


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
