<?php

namespace App\Http\Controllers;

use Illuminate\Database\Connection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalPlayers = DB::connection('mysql_networkmanager')->table('players')->count();
        $todayPlayers = DB::connection('mysql_networkmanager')->table('players')->where('lastlogin', '>', '(UNIX_TIMESTAMP(CURDATE())*1000)')->count();
        $newPlayers = DB::connection('mysql_networkmanager')->table('players')->where('lastlogin', '>', '(UNIX_TIMESTAMP(CURDATE())*1000)')->count();

        return view('dashboard', compact('totalPlayers','todayPlayers', 'newPlayers'));
    }
}
