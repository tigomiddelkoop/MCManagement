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
    public function index()
    {
        return view('minecraft.punishments.index');
    }

    //I KNOW THIS IS NOT EFFICIENT TO PUT THE SAME QUERY IN EVERY METHOD, IM SEARCHING FOR A METHOD THAT CAN DO THIS BETTER.
    public function showBan()
    {
        $punishments = DB::connection('mysql_litebans')
            ->table('bans')
            ->Join('history', 'bans.uuid', '=', 'history.uuid')
            ->select('bans.id', 'history.name','bans.time', 'bans.uuid', 'bans.banned_by_name', 'bans.reason', 'bans.active')
            ->get();
//        return $punishments;

        return view('minecraft.punishments.show', compact('punishments'));
    }

    public function showKick()
    {
        $punishments = DB::connection('mysql_litebans')
            ->table('kicks')
            ->Join('history', 'kicks.uuid', '=', 'history.uuid')
            ->select('kicks.id', 'history.name','kicks.time', 'kicks.uuid', 'kicks.banned_by_name', 'kicks.reason', 'kicks.active')
            ->get();
//        return $punishments;

        return view('minecraft.punishments.show', compact('punishments'));
    }

    public function showMute()
    {
        $punishments = DB::connection('mysql_litebans')
            ->table('mutes')
            ->Join('history', 'mutes.uuid', '=', 'history.uuid')
            ->select('mutes.id', 'history.name','mutes.time', 'mutes.uuid', 'mutes.banned_by_name', 'mutes.reason', 'mutes.active')
            ->get();
//        return $punishments;

        return view('minecraft.punishments.show', compact('punishments'));
    }

    public function showWarning()
    {
        $punishments = DB::connection('mysql_litebans')
            ->table('warnings')
            ->Join('history', 'warnings.uuid', '=', 'history.uuid')
            ->select('warnings.id', 'history.name','warnings.time', 'warnings.uuid', 'warnings.banned_by_name', 'warnings.reason', 'warnings.active')
            ->get();
//        return $punishments;

        return view('minecraft.punishments.show', compact('punishments'));
    }
}
