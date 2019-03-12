<?php

namespace App\Http\Controllers\Minecraft;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['permission:networkmanager.chat.access']);
    }

    public function index(Request $request)
    {
        $chat = DB::connection('mysql_networkmanager')->table('chat')->orderByDesc("id")->paginate(25);

        return view("minecraft.chat.index", compact("chat"));

    }

    public function search(Request $request)
    {
        $data = $request->validate([
            "searchQuery" => "max:100"
        ]);

        $chat = DB::connection('mysql_networkmanager')->table('chat')->where('uuid' , '=' , $data['searchQuery'])->orderByDesc("id")->get();

        return view("minecraft.chat.index", compact("chat"));
    }
}
