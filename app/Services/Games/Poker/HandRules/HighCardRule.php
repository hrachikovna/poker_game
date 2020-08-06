<?php
class HighCardRule extends Rule
{
    public function isFulfilled(array $_hand) : bool
    {
      return $this->getHighestCard($_hand) ;
    }
    private function getHighestCard(array $hand) : bool
    {
        $card_values =  array_column($hand, 'value');
        return max($card_values);
    }
}
