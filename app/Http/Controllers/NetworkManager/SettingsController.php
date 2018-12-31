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

    public function update(Request $request)
    {

        $validatedData = $request->validate([
            '*' => "max:255",
        ]);
        //Remove the token from the list
        unset($validatedData['_token']);

        foreach($validatedData as $data) {
            DB::connection('mysql_networkmanager')->table('values')->where('variable' , '=', $data['setting'])->update(['value' => $data['value']]);
        }

        $infoMessage = [
            'code' => 1,
            'message' => "Settings are saved!"
        ];

        return redirect(route('networkmanagerSettingsIndex'))->with(compact('infoMessage'));

    }


}
