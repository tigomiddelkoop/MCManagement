<?php

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

Auth::routes();

Route::get('/', 'HomeController@index');


Route::prefix('minecraft')->group(function() {
    Route::prefix('players')->group(function() {
        Route::get('/', 'Minecraft\PlayerController@index')->name('minecraftPlayers');
        Route::get('/{uuid}', 'Minecraft\PlayerController@show')->name('minecraftSpecificPlayer');
    });
    Route::prefix('punishments')->group(function() {
        Route::get('/', "Minecraft\PunishmentController@index");
        Route::get('/{type}', "Minecraft\PunishmentController@show")->where('type', 'bans|kicks|mutes|warnings')->name('minecraftPunishmentsList');
    });

});



Route::get('/dashboard', 'HomeController@index')->name('dashboard');
