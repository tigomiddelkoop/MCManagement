<?php

namespace App\Http\Controllers\NetworkManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Tools\RandomUtils;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Paginating it in case you have more than 25 Announcements
        $announcements = DB::connection('mysql_networkmanager')->table('announcements')->paginate(25);
//        return $announcements;
        return view('networkmanager.announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('networkmanager.announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            "type" => "required|integer|min:1|max:9",
            "message" => "required|max:500",
            "server" => "",
            "active" => "alpha"

        ]);

        if (isset($validatedData['active'])) {
            $active = RandomUtils::checkboxTranslater($validatedData['active']);
        } else {
            $active = 0;
        }

        DB::connection('mysql_networkmanager')->table('announcements')->insert(
            ['type' => $validatedData['type'], 'message' => $validatedData['message'], 'server' => $validatedData['server'], 'active' => $active]
        );

        $infoMessage = [
            'code' => 1,
            "message" => "Announcement saved! It should appear in the server within a few minutes"
        ];
        return redirect(route('networkmanagerAnnouncementsIndex'))->with(compact('infoMessage'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcement = DB::connection('mysql_networkmanager')->table('announcements')->where("id", "=", $id)->first();
        return view('networkmanager.announcements.edit', compact('announcement'));
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
        $validatedData = $request->validate([

            "type" => "required|integer|min:1|max:9",
            "message" => "required|max:500",
            "server" => "",
            "active" => "alpha"

        ]);

        if (isset($validatedData['active'])) {
            $active = RandomUtils::checkboxTranslater($validatedData['active']);
        } else {
            $active = 0;
        }

        DB::connection('mysql_networkmanager')->table('announcements')->where('id', '=', $id)->update(
            ['type' => $validatedData['type'], 'message' => $validatedData['message'], 'server' => $validatedData['server'], 'active' => $active]
        );

        $infoMessage = [
            'code' => 1,
            "message" => "Announcement edited! It should appear in the server within a few minutes"
        ];
        return redirect(route('networkmanagerAnnouncementsIndex'))->with(compact('infoMessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exists = DB::connection('mysql_networkmanager')->table('announcements')->where('id', '=', $id)->exists();

        if($exists) {
            DB::connection('mysql_networkmanager')->table('announcements')->where('id', '=', $id)->delete();

            $infoMessage = [
                'code' => 1,
                "message" => "Announcement removed! It should be removed in a few minutes from your network"
            ];
        } else {
            $infoMessage = [
                'code' => 0,
                "message" => "Announcement does not exist"
            ];
        }

        return redirect(route('networkmanagerAnnouncementsIndex'))->with(compact('infoMessage'));
    }
}
