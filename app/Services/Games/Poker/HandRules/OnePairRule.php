<?php
class OnePairRule extends Rule
{
    public function isFulfilled(array $_hand) : bool
    {
        return $this->isOnePair($_hand)  ? true : false;
    }

    private function isOnePair(array $hand) : bool
    {
        $card_values =  array_column($hand, 'value') ;
        $count_cards_by_value =  array_count_values($card_values);

        $is_one_pairs =  array_filter($count_cards_by_value, function ($item) {
            return $item === 2;
        });

        if (count($is_one_pairs) === 1) {
            return false;
        } return true;
    }
}
