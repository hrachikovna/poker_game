<?php
class ThreeOfAKindRule extends Rule
{
    public function isFulfilled(array $_hand):bool
    {
        return $this->isThreeOfAKind($_hand)  ? true : false;
    }

    private function isThreeOfAKind(array $hand) : bool
    {
        $card_values =  array_column($hand, 'value') ;
        $count_cards_by_value =  array_count_values($card_values);
        if (!in_array(3, $count_cards_by_value)) {
            return false;
        } return true;
    }

}
