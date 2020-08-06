<?php
interface RulesInterface
{
  public function isFulfilled(array $_hand) : bool;
}
