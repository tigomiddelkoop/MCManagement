<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');


        //This maybe has to be moved to the AppServiceProvider but then shit will break :/
        $settings = Setting::all();

        $settings = $this->buildSettingsArray($settings);

        View::share('settings', $settings);
//        dd($settings);
    }

    private function buildSettingsArray($settings){

        $settingsArray = [];

        foreach ($settings as $setting) {
            $settingsArray[$setting->setting] = $setting->value;
        }

        return $settingsArray;
    }
}
