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
        Route::get('/', "Minecraft\PunishmentController@index")->name('minecraftPunishmentsList');
        Route::get('/bans', "Minecraft\PunishmentController@showBan")->name('minecraftPunishmentsListBans');
        Route::get('/kicks', "Minecraft\PunishmentController@showKick")->name('minecraftPunishmentsListKicks');
        Route::get('/mutes', "Minecraft\PunishmentController@showMute")->name('minecraftPunishmentsListMutes');
        Route::get('/warnings', "Minecraft\PunishmentController@showWarning")->name('minecraftPunishmentsListWarns');
    });

});



Route::get('/dashboard', 'HomeController@index')->name('dashboard');
