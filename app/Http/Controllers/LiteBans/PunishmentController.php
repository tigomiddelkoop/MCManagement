<?php
/**
 * Created by PhpStorm.
 * User: tigog
 * Date: 12/16/2018
 * Time: 7:05 PM
 */

namespace App\Http\Controllers\LiteBans;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PunishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //ME TRYING OUT MULTIPLE METHODS!
    public function index()
    {

        $amount = 10;

        $punishments = new Collection([
            'Bans' => $this->getPunishment('bans', $amount),
            'Kicks' => $this->getPunishment('kicks', $amount),
            'Mutes' => $this->getPunishment('mutes', $amount),
            'Warnings' => $this->getPunishment('warnings', $amount)
        ]);


        return view('minecraft.punishments.index', compact('punishments'));
    }

    //Tell me if this is safe, i deem it safe, the web.php only accepts 4 things to use in the $type
    public function show($type)
    {

        $page_title = $type;
        $punishments = $this->getPunishmentPaginated($type, 25);


        return view('minecraft.punishments.show', compact('punishments', "page_title"));
    }

    public function getPunishmentPaginated($type, $amount)
    {
        $punishment = DB::connection('mysql_litebans')
            ->table($type)
            ->Join('history', $type . '.uuid', '=', 'history.uuid')
            ->select($type . '.id', $type . '.uuid', 'name', 'time', 'banned_by_name', 'reason', 'active')
            ->orderByDesc('id')
            ->paginate($amount);

        return $punishment;
    }

    public function getPunishment($type, $amount)
    {
        $punishment = DB::connection('mysql_litebans')
            ->table($type)
            ->Join('history', $type . '.uuid', '=', 'history.uuid')
            ->select($type . '.id', $type . '.uuid', 'name', 'time', 'banned_by_name', 'reason', 'active')
            ->orderByDesc('id')
            ->take($amount)
            ->get();

        return $punishment;
    }
}
