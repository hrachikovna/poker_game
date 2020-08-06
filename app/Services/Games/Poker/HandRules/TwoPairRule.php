<?php
class TwoPairRule extends Rule
{
    public function isFulfilled(array $_hand) : bool
    {

        return $this->isTwoPair($_hand)  ? true : false;
    }

    private function isTwoPair(array $hand) : bool
    {
        $card_values =  array_column($hand, 'value') ;
        $count_cards_by_value =  array_count_values($card_values);

        $is_two_pairs =  array_filter($count_cards_by_value, function ($item) {
            return $item === 2;
        });
        if (!(count($is_two_pairs) === 2)) {
            return false;
        }
        return true;
    }
}
