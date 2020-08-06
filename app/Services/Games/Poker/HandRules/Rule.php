<?php
abstract class Rule implements RulesInterface {

    public function sortCardsValuesArray(array $cards): array
    {
        sort($cards);
        return $cards;
    }

    public function getSumOfHandValues(array $_hand)
    {
         return array_sum(array_column($_hand, 'value'));
    }
}
