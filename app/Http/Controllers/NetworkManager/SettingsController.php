<?php

namespace App\Http\Controllers\NetworkManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function index()
    {

        $settings = DB::connection('mysql_networkmanager')->table('values')->get();

        $settingArray = array();

        foreach ($settings as $setting)
        {
            $variable = explode('_', $setting->variable, 2);

            $array = Array();

            $array['settingTotalName'] = $setting->variable;
            $array['category'] = $variable[0];
            $array['setting'] = $variable[1];
            $array['value'] = $setting->value;

            array_push($settingArray, $array);


        }

//        return $settingArray;
        return view('networkmanager.settings.index', [
            'nmSettings' => $settingArray,
        ]);
    }

    public function update()
    {

    }


}
