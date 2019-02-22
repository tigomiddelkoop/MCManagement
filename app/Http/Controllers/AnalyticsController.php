<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $countryList = DB::connection('mysql_networkmanager')->table('players')->select('country')->distinct('country')->get();
        $countryAmount = DB::connection('mysql_networkmanager')->table('players')->select('country')->get();
        $regions = array();

        foreach ($countryList as $countryDistinct) {
            $miniArray = array();
            $miniArray["country"] = $countryDistinct->country;
            $miniArray["amount"] = 0;
            foreach ($countryAmount as $amount) {
                if ($countryDistinct->country == $amount->country) {
                    $miniArray["amount"] = $miniArray["amount"] + 1;
                }
            }
            array_push($regions, $miniArray);
        }
        return view('analytics', compact('regions'));
    }
}
