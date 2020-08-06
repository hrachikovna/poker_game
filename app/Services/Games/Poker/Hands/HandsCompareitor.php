<?php
use Illuminate\Support\Arr;

class HandsCompareitor
{
   private $_handService;
   private $_Rules = [
       [
           'name' => 'RoyalFlushRule',
           'score' => 10,
       ],
       [
           'name' => 'StraightFlushRule',
           'score' => 9,
       ],
       [
           'name' => 'FourOfAKindRule',
           'score' => 8,
       ],
       [
           'name' => 'FullHouseRule',
           'score' => 7,
       ],
       [
           'name' => 'FlushRule',
           'score' => 6,
       ],
       [
           'name' => 'StraightRule',
           'score' => 5,
       ],
       [
           'name' => 'ThreeOfAKindRule',
           'score' => 4,
       ],
       [
           'name' => 'TwoPairRule',
           'score' => 3,
       ],
       [
           'name' => 'OnePairRule',
           'score' => 2,
       ],
       [
           'name' => 'HighCardRule',
           'score' => 1,
       ],
   ];

   public function __construct()
   {
       $this->_handService = new Hand();;
   }

   private function getScoreOfTheRule(array $rule) : int
   {
       return Arr::get($rule, 'score');
   }

   public function getNameOfTheRule( array $rule): string {
       return Arr::get($rule, 'name');
   }
   public function getRulesClassInstance(string $ruleName)
   {
       $rule = new ReflectionClass($ruleName);
       return $rule->newInstance();
   }
   public function compareHands($players)
   {
        collect($players)->map(function ( \App\Http\Controllers\PlayerController $player) {
            $score_rules = $this->checkHandRule( $player->getHandWithPureArray());
            $player->setHandScore($score_rules[0]['score']);
        });

        $max_score = max(collect($players)->map(function ($player){
           return $player->getHandScore() ;
         })->all());

        $winner = collect($players)->map(function ($player) use($max_score){
            return $player->getHandScore() == $max_score ? $player : false;
        });

         return $winner->first();
   }

   private function checkHandRule($hand)
   {
     $rule_collections = collect($this->_Rules);
     return array_values($rule_collections->filter(function ($rule) use($hand) {
         return $this->getRulesClassInstance($rule['name'])->isFulfilled($hand) ;
     })->all());


   }

}
