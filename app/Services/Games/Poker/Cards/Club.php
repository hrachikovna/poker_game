<?php


class Club extends Card
{
    const KEY = 'C';
    private $_index = 1;

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
