<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

//

    $card [] = App::make('S')(5);
    $card [] = App::make('S')(4);
    $card [] = App::make('S')(3);
    $card [] = App::make('S')(3);
    $card [] = App::make('S')(4);
    $newCard = [] ;

//ddd($card);
//     $newCards = new Cards($card);
//
//
//
//  $royalRules = new StraightRule();
//  $isSatisfied = $royalRules->isFulfilled($newCards->generateCardsArray());


    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::post('/store', 'PokerGameController@storeHands')->name('store.hands');
Route::get('/winnings', 'PlayerController@getWinnings')->name('show.winnings');
