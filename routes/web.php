<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Routes for competitions
Route::resource('/competitions', 'App\Http\Controllers\CompetitionsController')->except(['edit', 'update', 'delete']);
Route::get('/show/{competitionId}','App\Http\Controllers\CompetitionsController@show');
Route::get('/competitionIndexAjax','App\Http\Controllers\CompetitionsController@competitionIndexAjax')->name('competitionIndexAjax');
Route::get('/competitionAjax/{id}','App\Http\Controllers\CompetitionsController@competitionAjax')->name('competitionAjax');
// routes for teams
Route::resource('/teams', 'App\Http\Controllers\TeamsController')->except(['edit', 'update', 'delete']);
Route::get('/show/{teamId}', 'App\Http\Controllers\TeamsController@show');
Route::get('/teamAjax/{id}','App\Http\Controllers\TeamsController@teamAjax')->name('teamAjax');
// routes for players
Route::resource('/players', 'App\Http\Controllers\PlayersController')->except(['edit', 'update', 'delete','show']);
Route::get('/playersAjax','App\Http\Controllers\PlayersController@playersAjax')->name('playersAjax');