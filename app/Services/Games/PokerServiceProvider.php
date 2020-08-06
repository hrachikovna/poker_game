<?php
namespace App\Services;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\App;

class PokerServiceProvider extends ServiceProvider {
    public function register()
    {
        $_suit_collections = collect([ 'Club', 'Heart', 'Diamond', 'Spade']);

        $_suit_collections->map(function ($item) {
            $class = new \ReflectionClass($item);
            $this->app->bind($class->getConstant('KEY'), function ($app) use ($class) {
                return function ($param) use ($class) {
                    return  $class->newInstance($param);
                };
            });
        });

        $this->app->bind('HandService',  function ($app) {
            return function ($param)  {
                return new \HandsCompareitor($param);
            };
        });

        $this->app->bind('CardsService',  function ($app) {
            return function (array $param)  {
                return new \Cards($param);
            };
        });
    }


}
