<?php
class StraightFlushRule extends Rule
{
    public function isFulfilled(array $_hand) : bool
    {
        return $this->isStraightFlush($_hand)  ? true : false;
    }

    public function isStraightFlush(array $hand) : bool
    {
        $is_straight = [];
        $card_values = $this->sortCardsValuesArray(array_column($hand, 'value') );
        while(key($card_values) !== null && key($card_values) !== 4) {
            $is_straight [] =  abs(current($card_values) - next($card_values));
        }
        if (!count(array_unique($is_straight)) === 1) {
            return false;
        }
        return true;
    }
}
