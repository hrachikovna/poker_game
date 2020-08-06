<?php

abstract class Card
{
    protected $_value;
    protected $_suit;
    public function __construct( $value = 0 )
    {
        $this->_value = $value;
    }

    public function getValue()
    {
        return $this->_value;
    }
    public function setValue($value)
    {
        return $this->_value = $value;
    }
    public function getClassName()
    {
      return get_called_class();
    }

    private function setSuit()
    {
       $this->_suit = strtolower(get_called_class());
    }

    abstract public function getKey();
    abstract public function getSuit();
    abstract public function getIndex();



}
