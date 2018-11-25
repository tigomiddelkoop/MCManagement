<?php

namespace App\Http\Controllers\Minecraft;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PunishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //ME TRYING OUT MULTIPLE METHODS!
    public function index()
    {
        return view('minecraft.punishments.index', compact('punishments'));
    }

    //Tell me if this is safe, i deem it same, the web.php only accepts 4 things to use in the $type
    public function show($type)
    {
        $punishments = DB::connection('mysql_litebans')
            ->table($type)
            ->Join('history', $type . '.uuid', '=', 'history.uuid')
            ->select($type . '.id', $type . '.uuid', 'name','time', 'banned_by_name', 'reason', 'active')
            ->orderByDesc('id')
            ->paginate(10);

        return view('minecraft.punishments.show', compact('punishments'));
    }
}
