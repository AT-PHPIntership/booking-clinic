<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LRedis;

class SocketController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('socket');
    }

    public function writemessage()
    {
        return view('abc');
    }

    public function sendMessage(Request $request){
        $redis = LRedis::connection();
        // dd($redis, $request->get('message'));
        $redis->publish('message', $request->get('message'));
        return redirect('writemessage');
    }
}
