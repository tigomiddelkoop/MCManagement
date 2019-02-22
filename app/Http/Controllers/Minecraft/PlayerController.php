<?php

namespace App\Http\Controllers\Minecraft;

use App\Http\Controllers\Tools\MCVersionController;
use App\Http\Controllers\Tools\RandomUtils;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class PlayerController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $players = DB::connection('mysql_networkmanager')->table('players')->select('id', 'uuid', 'username', 'country', 'online')->paginate(25);
        return view('minecraft.players.index', compact('players'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $validatedData = $request->validate([
            "playername" => "max:25",
        ]);

        $players = DB::connection('mysql_networkmanager')->table('players')->where('username', 'LIKE', '%' . $validatedData['playername'] . '%')->orWhere('ip', 'LIKE', '%' . $validatedData['playername'] . '%')->select('id', 'uuid', 'username', 'country', 'online')->paginate(25);
        $searchResult = $validatedData['playername'];
        return view('minecraft.players.index', compact('players', 'searchResult'));
    }

    /**
     * @param $uuid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function show($uuid)
    {
        $uuidWithoutDashes = RandomUtils::removeDashes($uuid);


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.mojang.com/user/profiles/" . $uuidWithoutDashes . "/names");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $previousNamesJSON = curl_exec($ch);
        curl_close($ch);


        $previousNames = json_decode($previousNamesJSON);
        array_reverse($previousNames);


        $networkmanager = DB::connection('mysql_networkmanager')->table('players')->where('uuid', '=', $uuid)->first();
        $luckperms = DB::connection('mysql_luckperms')->table('players')->where('uuid', '=', $uuid)->select('primary_group')->first();
        $litebans_bans = DB::connection('mysql_litebans')->table('bans')->where('uuid', '=', $uuid)->get();
        $litebans_kicks = DB::connection('mysql_litebans')->table('kicks')->where('uuid', '=', $uuid)->get();
        $litebans_mutes = DB::connection('mysql_litebans')->table('mutes')->where('uuid', '=', $uuid)->get();
        $litebans_warnings = DB::connection('mysql_litebans')->table('warnings')->where('uuid', '=', $uuid)->get();


        if ($networkmanager == NULL) {
//            return view('minecraft.players.errorpnf');
        }

        $networkmanager_additional = DB::connection('mysql_networkmanager')->table('players')->where('ip', '=', $networkmanager->ip)->get();
        $networkmanager_sessions = DB::connection('mysql_networkmanager')->table('sessions')->where('uuid', '=', $networkmanager->uuid)->take(8)->orderByDesc('id')->get();
        $networkmanager_version = DB::connection('mysql_networkmanager')->table('logins')->where('uuid', '=', $networkmanager->uuid)->distinct('version')->get()->groupBy('version');

        $networkmanager_versions = MCVersionController::convertToChart($networkmanager_version);

        return view('minecraft.players.show', compact('networkmanager', 'networkmanager_additional', 'networkmanager_sessions', 'networkmanager_versions', 'luckperms', 'litebans_bans', 'litebans_kicks', 'litebans_mutes', 'litebans_warnings', 'previousNames'));
    }
}
