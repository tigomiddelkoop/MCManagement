<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\APIController;
use App\ServerChangelog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServerChangelogController extends APIController
{
    public function __invoke()
    {
        dd(ServerChangelog::get()->getChangelog());
    }
}
