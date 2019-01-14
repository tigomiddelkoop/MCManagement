<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\APIController;
use App\ServerChangelog;
use App\ServerChangelogData;
use Grpc\Server;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServerChangelogController extends APIController
{
    public function __invoke()
    {
        echo "in the function";
        $changelog = ServerChangelog::All();
        $changelogData = ServerChangelogData::All();



        $resultArray = array();

        foreach($changelog as $data) {
            $versionData = [
                "serverversion" => $changelog
            ]
        }

        return $changelogData;
    }
}
