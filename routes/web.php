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

Auth::routes(['register' => false]);

Route::get('/', 'DashboardController')->name('dashboard');
Route::get('/dashboard', 'DashboardController')->name('dashboard');
Route::get('/analytics', 'AnalyticsController')->name('analytics');
Route::get('/about', 'MCManagement\AboutController')->name('about');


Route::prefix('minecraft')->group(function () {

    Route::prefix('players')->group(function () {

        Route::get('/', 'Minecraft\PlayerController@index')->name('networkmanagerPlayersIndex');
        Route::get('/{uuid}', 'Minecraft\PlayerController@show')->name('networkmanagerPlayersShow');

        Route::post('/search', 'Minecraft\PlayerController@search')->name('networkmanagerPlayersSearch');


    });

    Route::prefix('chat')->group(function () {

        Route::get('/', 'Minecraft\ChatController@index')->name("networkChatIndex");
        Route::post('/search', 'Minecraft\ChatController@search')->name("networkChatSearch");

    });

});

Route::prefix('litebans')->group(function () {

    Route::get('/', "LiteBans\PunishmentController@index")->name('litebansIndex');
    Route::get('/{type}', "LiteBans\PunishmentController@show")->where('type', 'bans|kicks|mutes|warnings')->name('litebansShow');
    Route::get('/{type}/{id}', "LiteBans\PunishmentController@detailed")->where('type', 'bans|kicks|mutes|warnings')->name('litebansDetailed');

});

Route::prefix('networkmanager')->group(function () {

    Route::prefix('motd')->group(function () {

        Route::get('/', 'NetworkManager\MOTDController@index')->name('networkmanagerMOTDIndex');
        Route::post('/', 'NetworkManager\MOTDController@update')->name('networkmanagerMOTDUpdate');

    });
    Route::prefix('permissions')->group(function () {

    });
    Route::prefix('servers')->group(function () {

        Route::get('/', 'NetworkManager\ServerManager')->name('networkmanagerServerIndex');

        Route::get('/addserver', 'NetworkManager\ServerManager\ServerController@create')->name('networkmanagerServerCreateServer');
        Route::get('/addservergroup', 'NetworkManager\ServerManager\ServerGroupController@create')->name('networkmanagerServerCreateServerGroup');

        Route::post('/addserver', 'NetworkManager\ServerManager\ServerController@store')->name('networkmanagerServerStoreServer');
        Route::post('/addservergroup', 'NetworkManager\ServerManager\ServerGroupController@store')->name('networkmanagerServerStoreServerGroup');

        Route::get('/editserver/{id}', 'NetworkManager\ServerManager\ServerController@edit')->name('networkmanagerServerEditServer');
        Route::get('/editservergroup/{id}', 'NetworkManager\ServerManager\ServerGroupController@edit')->name('networkmanagerServerEditServerGroup');

        Route::post('/editserver/{id}', 'NetworkManager\ServerManager\ServerController@update')->name('networkmanagerServerUpdateServer');
        Route::post('/editservergroup/{id}', 'NetworkManager\ServerManager\ServerGroupController@update')->name('networkmanagerServerUpdateServerGroup');

        Route::delete('/removeserver/{id}', 'NetworkManager\ServerManager\ServerController@destroy')->name('networkmanagerServerDestroyServer');
        Route::delete('/removeservergroup/{id}', 'NetworkManager\ServerManager\ServerGroupController@destory')->name('networkmanagerServerDestroyServerGroup');


    });
    Route::prefix('tags')->group(function () {

    });
    Route::prefix('filter')->group(function () {

    });
    Route::prefix('commandblocker')->group(function () {

    });
    Route::prefix('announcements')->group(function () {

        Route::get('/', "NetworkManager\AnnouncementController@index")->name('networkmanagerAnnouncementsIndex');
        Route::get('/create', "NetworkManager\AnnouncementController@create")->name('networkmanagerAnnouncementsCreate');
        Route::post('/create', "NetworkManager\AnnouncementController@store")->name('networkmanagerAnnouncementsStore');
        Route::get('/{id}', "NetworkManager\AnnouncementController@edit")->name('networkmanagerAnnouncementsEdit');
        Route::post('/{id}', "NetworkManager\AnnouncementController@update")->name('networkmanagerAnnouncementsUpdate');
        Route::delete('/delete/{id}', "NetworkManager\AnnouncementController@destroy")->name('networkmanagerAnnouncementsDelete');

    });
    Route::prefix('tabcompletecommands')->group(function () {

    });
    Route::prefix('settings')->group(function () {
       Route::get('/', "NetworkManager\SettingsController@index")->name('networkmanagerSettingsIndex');
       Route::post('/', "NetworkManager\SettingsController@update")->name('networkmanagerSettingsUpdate');
    });

});

Route::prefix('nameless')->group(function () {});

Route::prefix('mcmanagement')->group(function () {
    Route::prefix('changelog')->group(function () {
       Route::get('/', 'MCManagement\Changelog\ChangelogController@index')->name('changelogIndex');
       Route::get('show', 'MCManagement\Changelog\ChangelogController@show')->name('changelogShow');
       Route::get('edit/{id}', 'MCManagement\Changelog\ChangelogController@edit')->name('changelogEdit');
       Route::post('update/{id}', 'MCManagement\Changelog\ChangelogController@update')->name('changelogUpdate');
       Route::delete('destroy/{id}', 'MCManagement\Changelog\ChangelogController@destroy')->name('changelogDestroy');
    });
});

Route::prefix('panel')->group(function () {

    Route::prefix('settings')->group(function () {

        Route::prefix('general')->group(function () {

            Route::get('/', "MCManagement\Settings\General\IndexController@index")->name('panelSettingsGeneralIndex');

        });

        Route::prefix('language')->group(function () {

            Route::get('/', "MCManagement\Settings\Language\IndexController@index")->name('panelSettingsLanguageIndex');

        });

    });
    Route::prefix('users')->group(function () {

        Route::get('/', 'MCManagement\Users\UserController@index')->name('panelSettingsUserIndex');

        Route::prefix('/add')->group(function () {
            Route::get('/', 'Auth\RegisterController@showRegistrationForm');
            Route::post('/', 'Auth\RegisterController@register')->name('register');

        });
        Route::get('/{user}', 'MCManagement\Users\UserController@show')->name('panelSettingsUserShow');
    });
    Route::prefix('roles')->group(function () {

        Route::get('/', 'MCManagement\Roles\RoleController@index')->name('panelSettingsRoleIndex');

        Route::prefix('/edit')->group(function () {
            Route::get('/{id}', 'MCManagement\Roles\RoleController@edit')->name('panelSettingsRoleEdit');
            Route::post('/{id}', 'MCManagement\Roles\RoleController@update')->name('panelSettingsRoleUpdate');

        });

    });
});


