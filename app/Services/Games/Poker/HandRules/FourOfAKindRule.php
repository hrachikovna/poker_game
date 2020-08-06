<?php
class FourOfAKindRule extends Rule
{
    public function isFulfilled(array $_hand) : bool
    {
        return $this->isFourOfAKind($_hand)  ? true : false;
    }

    private function isFourOfAKind(array $hand) : bool
    {
        $card_values =  array_column($hand, 'value') ;
        $count_cards_by_value =  array_count_values($card_values);
        if (!count(array_unique($card_values)) === 2 && in_array(4, $count_cards_by_value)) {
            return false;
        } return true;

    }



}
