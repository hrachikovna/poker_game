<?php
class FlushRule extends Rule
{
    public function isFulfilled(array $_hand) : bool
    {
       return $this->isFlush($_hand) ? true : false;
    }

    private function isFlush(array $hand) : bool
    {
        $countSuitsInHand = array_column($hand, 'suit');
        if (!count(array_unique($countSuitsInHand)) === 1) {
            return false;
        }
        return true;
    }
}
