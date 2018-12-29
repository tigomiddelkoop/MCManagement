<?php

namespace App\Http\Controllers\NetworkManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ServerManager extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $servers = DB::connection('mysql_networkmanager')->table('servers')->get();
        $serverGroups = DB::connection('mysql_networkmanager')->table('server_groups')->get();

        return view('networkmanager.servermanager.index', compact('servers', 'serverGroups'));
    }
}
