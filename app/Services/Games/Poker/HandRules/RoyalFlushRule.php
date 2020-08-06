<?php
class RoyalFlushRule extends Rule
{
    public function isFulfilled(array $_hand) : bool
    {
        return $this->isRoyalFlush($_hand)  ? true : false;
    }

    private function isRoyalFlush (array $hand) : bool
    {
        $countSuitsInHand = array_column($hand, 'suit');
        $card_values = array_column($hand, 'value');
        $sorted_cards_values = $this->sortCardsValuesArray($card_values);
        if (! (count(array_unique($countSuitsInHand)) === 1 &&
            $sorted_cards_values[0] === 10 &&
            $sorted_cards_values[count($hand)-1] === Cards::ACE )
         )
        {
            return false;
        }
        return true;
    }

}
