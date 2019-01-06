<?php

namespace App\Http\Controllers\NetworkManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MOTDController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:networkmanager.motd.access']);
    }

    public function index()
    {
        $motd = DB::connection('mysql_networkmanager')->table('values')->where('variable', 'LIKE', '%motd%')->select('variable', 'value')->get();

        $motdArray = array();

        foreach ($motd as $motdArrayData) {
            $motdArray[$motdArrayData->variable] = $motdArrayData->value;
        }

        return view('networkmanager.motd.index', [
            "motd" => $motdArray,
        ]);

    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([

            "motd_text" => "",
            "motd_description" => "",
            "motd_icon" => "url",

        ]);

        return $validatedData;
    }

}
