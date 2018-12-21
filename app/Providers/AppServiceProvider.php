<?php

namespace App\Providers;

use App\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $permissions = null;
        $settings = null;

        if (!app()->runningInConsole()) {
            $permissions = $this->getPermissions();
            $settings = $this->getSettings();

            View::share('permissions', $permissions);
            View::share('settings', $settings);

        }

        Schema::defaultStringLength('191');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function getPermissions()
    {

//        $permission =


    }

    private function getSettings()
    {

        $settings = Setting::all();

        $settingsArray = [];

        foreach ($settings as $setting) {
            $settingsArray[$setting->setting] = $setting->value;
        }

        return $settingsArray;

    }
}
