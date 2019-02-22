<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $onlinePlayers = DB::connection('mysql_networkmanager')->table('players')->where('online', '=',1)->count();
        $totalPlayers = DB::connection('mysql_networkmanager')->table('players')->count();
        $todayPlayers = DB::connection('mysql_networkmanager')->table('players')->where('lastlogin', '>', '(UNIX_TIMESTAMP(CURDATE())*1000)')->count();
        $newPlayers = DB::connection('mysql_networkmanager')->table('players')->where('lastlogin', '>', '(UNIX_TIMESTAMP(CURDATE())*1000)')->count();
        $totalPlaytime = DB::connection('mysql_networkmanager')->table('players')->select('playtime')->get();

        $playtime = 0;

        foreach ($totalPlaytime as $time)
        {

            $playtime += $time->playtime;

        }

        return view('dashboard', compact('onlinePlayers', 'totalPlayers', 'todayPlayers', 'newPlayers', 'playtime'));
    }
}
