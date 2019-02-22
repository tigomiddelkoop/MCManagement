<?php

namespace App\Http\Controllers\MCManagement\Changelog;

use App\ServerChangelog;
use App\ServerChangelogData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChangelogController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:mcmanagement.changelog.access']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $changelog = ServerChangelog::all()->sortByDesc('id');
        return view('mcmanagement.changelog.index', compact('changelog'));

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //U
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $changelog = ServerChangelog::find($id);
        $changelogSections = ServerChangelogData::where('changelog_id', $changelog->id)->select('changelog_section', 'changelog_id')->distinct('changelog_section')->get();
//        $changelogData = ServerChangelogData::where('changelog_section', $changelog->changelog_section)->distinct('changelog_section')->get();

        $dataArray = [
            "id" => $changelog->id,
            "serverversion" => $changelog->serverversion,
            "minecraftversion" => $changelog->minecraftversion,
            "releasedate" => $changelog->created_at,
            "changelog" => array(),
        ];


        foreach ($changelogSections as $data) {
            $changelogData = ServerChangelogData::where('changelog_section', $data->changelog_section)->where('changelog_id', $data->changelog_id)->select('changelog_text')->get();

            $releasenotes =
                [
                    "section" => $data->changelog_section,
                    "data" => array()
                ];

            foreach ($changelogData as $releasenote) {
                array_push($releasenotes['data'], $releasenote->changelog_text);
            }

            array_push($dataArray['changelog'], $releasenotes);
        }

        return view('mcmanagement.changelog.edit', ['changelog' => $dataArray]);
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
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
