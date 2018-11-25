<?php

namespace App\Http\Controllers\Minecraft;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = DB::connection('mysql_networkmanager')->table('players')->paginate(13);
//        return $players;
        return view('minecraft.players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
    public function show($uuid)
    {

        $networkmanager = DB::connection('mysql_networkmanager')->table('players')->where('uuid', '=', $uuid)->first();
        $luckperms = DB::connection('mysql_luckperms')->table('players')->where('uuid', '=', $uuid)->select('primary_group')->first();
        $litebans = DB::connection('mysql_litebans');

        if($networkmanager == NULL)
        {
            return view('minecraft.players.errorpnf');
        }

        $networkmanager_additional = DB::connection('mysql_networkmanager')->table('players')->where('ip', '=' , $networkmanager->ip)->get();


//        return $networkmanager;
//        return $networkmanager_additional;
//        return $luckperms;
//        return $litebans;
        return view('minecraft.players.show', compact('networkmanager', 'networkmanager_additional', 'luckperms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
