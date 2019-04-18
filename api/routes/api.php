<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 *  Grouping of routes for team module
 * */
Route::prefix('/teams',['middleware'=>'cors'])->group(function (){
    Route::get('/','TeamController@getTeams');
    Route::get('/{id}/players','TeamController@getPlayers');
});

/*
 *  Grouping of routes for matches module
 * */
Route::prefix('/match',['middleware'=>'cors'])->group(function (){
    Route::get('/','MatchController@getMatches');
    Route::post('/','MatchController@createMatch');
    Route::put('/{id}/points','MatchController@updateWiningTeam');
    Route::put('/{id}','MatchController@updateMatch');
});

/*
 *  Grouping of routes for points
 * */
Route::prefix('/points',['middleware' => 'cors'])->group(function (){
    Route::get('/','PointsController@getPoints');
});