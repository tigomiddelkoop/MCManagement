<?php

namespace App\Http\Controllers\NetworkManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servers = DB::connection('mysql_networkmanager')->table('servers')->get();
        $serverGroups = DB::connection('mysql_networkmanager')->table('server_groups')->get();

        return view('networkmanager.servermanager.index',  compact('servers', 'serverGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createServer()
    {
        return view('networkmanager.servermanager.server.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeServer(Request $request)
    {
        $validatedData = $request->validate([
            'servername' => 'required|max:100',
            'serverip' => 'required|max:100',
            'serverport' => 'required|min:1|max:65535|integer',
            'servermotd' => 'required|max:255',
        ]);

//        dd($validatedData);

        DB::connection('mysql_networkmanager')->table('servers')->insert(
            ['servername' => $validatedData['servername'], 'ip' => $validatedData['serverip'], 'port' => $validatedData['serverport'], 'motd' => $validatedData['servermotd'], 'restricted' => 0]
        );

        return redirect(route('networkmanagerServerIndex'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editServer($id)
    {
        return view('networkmanager.servermanager.server.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateServer(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyServer($id)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createServerGroup()
    {
        return view('networkmanager.servermanager.servergroup.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeServerGroup(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editServerGroup($id)
    {
        return view('networkmanager.servermanager.servergroup.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateServerGroup(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyServerGroup($id)
    {
        //
    }
}
