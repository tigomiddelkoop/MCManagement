<?php

namespace App\Http\Controllers\NetworkManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

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

        return view('networkmanager.servermanager.index', compact('servers', 'serverGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('networkmanager.servermanager.server.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'servername' => 'required|max:100|unique:mysql_networkmanager.servers',
            'serverip' => 'required|max:100',
            'serverport' => 'required|min:1|max:65535|integer',
            'servermotd' => 'max:255',
            'serverrestricted' => 'alpha',
            'allowedversions' => 'nullable'
        ]);

//        dd($validatedData);


        $versionArray = null;

        if (isset($validatedData['allowedversions'])) {
            $versionArray = $this->createVersionArray($validatedData['allowedversions']);
        }
        if (isset($validatedData['serverrestricted'])) {
            $restricted = $this->checkIfRestricted($validatedData['serverrestricted']);
        } else {
            $restricted = 0;
        }


        DB::connection('mysql_networkmanager')->table('servers')->insert(
            ['servername' => $validatedData['servername'], 'ip' => $validatedData['serverip'], 'port' => $validatedData['serverport'], 'motd' => $validatedData['servermotd'], 'allowed_versions' => $versionArray, 'restricted' => $restricted, 'online' => null]
        );

        $success = [
            'code' => 0,
            "servername" => $validatedData['servername']
        ];
        return redirect(route('networkmanagerServerIndex'))->with(compact('success'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $server = DB::connection('mysql_networkmanager')->table('servers')->where('id', '=', $id)->first();
        return view('networkmanager.servermanager.server.edit', compact('server'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'servername' => 'required|max:100',
            'serverip' => 'required|max:100',
            'serverport' => 'required|min:1|max:65535|integer',
            'servermotd' => 'max:255',
            'serverrestricted' => 'alpha',
            'allowedversions' => 'nullable'
        ]);

        $versionArray = null;

        if (isset($validatedData['allowedversions'])) {
            $versionArray = $this->createVersionArray($validatedData['allowedversions']);
        }

        if (isset($validatedData['serverrestricted'])) {
            $restricted = $this->checkIfRestricted($validatedData['serverrestricted']);
        } else {
            $restricted = 0;
        }


        DB::connection('mysql_networkmanager')->table('servers')->where('id', '=', $id)->update(
            ['servername' => $validatedData['servername'], 'ip' => $validatedData['serverip'], 'port' => $validatedData['serverport'], 'motd' => $validatedData['servermotd'], 'allowed_versions' => $versionArray, 'restricted' => $restricted, 'online' => null]
        );

        $success = [
            'code' => 0,
            "servername" => $validatedData['servername']
        ];
        return redirect(route('networkmanagerServerIndex'))->with(compact('success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $serverExists = DB::connection('mysql_networkmanager')->table('servers')->where('id', '=', $id)->exists();

        if ($serverExists) {
            $server = DB::connection('mysql_networkmanager')->table('servers')->where('id', '=', $id)->select('servername')->first();

            DB::connection('mysql_networkmanager')->table('servers')->where('id', '=', $id)->delete();

            $success = [
                'code' => 1,
                'servername' => $server->servername,
            ];
        } else {
            $success = [
                'code' => 99,
                'message' => "Server does not exist",
            ];
        }
        return redirect(route('networkmanagerServerIndex'))->with(compact('success'));
    }

    private function createVersionArray($array)
    {
        $convertedarray = null;

        foreach ($array as $version) {
            $convertedarray .= $version . ', ';
        }

        return $convertedarray;
    }

    private function checkIfRestricted($value)
    {

        switch ($value) {
            case('on'):
                $restricted = 1;
                break;
            case('off'):
                $restricted = 0;
                break;
            default:
                $restricted = NULL;
                break;
        }

        return $restricted;

    }
}
