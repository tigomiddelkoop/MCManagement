<?php

namespace App\Http\Controllers\Tools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NameConverter extends Controller
{

    public static function UUIDToName($uuid)
    {
        $name = DB::connection('mysql_networkmanager')->table('players')->where("uuid", '=', $uuid)->select("username")->first();
        return $name->username;
    }

}
