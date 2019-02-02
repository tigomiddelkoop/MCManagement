<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\APIController;
use App\ServerChangelog;
use App\ServerChangelogData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServerChangelogController extends APIController
{
    public function __invoke()
    {
//        return ServerChangelog::find(1)->getChangelog;
        $changelog = ServerChangelog::where('released', 1)->orderBy('id', 'DESC')->get();
        $resultData = array();

        foreach ($changelog as $data) {


            $dataArray = [
                "id" => $data->id,
                "serverversion" => $data->serverversion,
//                "released" => $data->released,
                "releasedate" => $data->created_at,
                "changelog" => array(),
            ];


            $changelogData = ServerChangelogData::where('changelog_id', $data->id)->select('changelog_section', 'changelog_id')->distinct('changelog_section')->get();

            foreach ($changelogData as $data) {
                $specificData = ServerChangelogData::where('changelog_section', $data->changelog_section)->where('changelog_id', $data->changelog_id)->select('changelog_text')->get();

                $releasenotes =
                    [
                        "section" => $data->changelog_section,
                        "data" => array()
                    ];

                foreach ($specificData as $releasenote) {
                    array_push($releasenotes['data'], $releasenote->changelog_text
                    );
                }

                array_push($dataArray['changelog'], $releasenotes);
            }


            array_push($resultData, $dataArray);


        }

        return $resultData;

    }
}
