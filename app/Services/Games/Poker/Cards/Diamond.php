<?php


class Diamond extends Card
{
    const KEY = 'D';
    private $_index = 2;

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
