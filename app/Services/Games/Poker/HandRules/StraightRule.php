<?php
class StraightRule extends Rule {
    public function isFulfilled(array $_hand) : bool
    {
        return $this->isStraight($_hand)  ? true : false;
    }

    private function isStraight(array $hand) : bool
    {
        $is_straight = [];
        $card_values = $this->sortCardsValuesArray(array_column($hand, 'value') );
        while(key($card_values) !== null && key($card_values) !== 4) {
            $is_straight [] =  abs(current($card_values) - next($card_values));
        }
        if (! (count(array_unique($is_straight)) === 1)) {
            return false;
        }
        return true;
    }
}
