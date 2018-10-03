<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LRedis;
use OneForge\ForexQuotes\ForexDataClient;

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


    public function test()
    {
    	$key= env('FOREX_KEY');
    	$client = new ForexDataClient('Ddi7WvLYENQl4Cqhpom8YIbeRldaA6mx');
    	//Handle incoming price updates from the server
	   $client->onUpdate(function($symbol, $data)
	   {

	   		$redis = LRedis::connection();

        	$redis->publish("message", json_encode($data));

	       // echo $symbol . ": " . $data["bid"] . " " .$data["ask"] . " " . $data["price"]."\n";
	   });
	   //Handle non-price update messages
	   $client->onMessage(function($message)
	   {
	       // dd($message);
	       echo $message;
	   });
	   //Connect to the server
	   $client->connect(function($client)
	   {
	       //Subscribe to a single currency pair
	       $client->subscribeTo('EURUSD');
	       //Subscribe to an array of currency pairs
	       // $client->subscribeTo([
	       //     'EURJPY',
	       //     'USDJPY',
	       //     'CNHJPY',
	       //     'SGDJPY',

	       // ]);
	       // //Subscribe to all currency pairs
	       // $client->subscribeToAll();
	       // //Unsubscribe from a single currency pair
	       // $client->unsubscribeFrom('EURUSD');
	       // //Unsubscribe from an array of currency pairs
	       // $client->unsubscribeFrom([
	       //     'GBPJPY',
	       //     'AUDCAD',
	       //     'EURCHF'
	       // ]);
	       // //Unsubscribe from all currency pairs
	       // $client->unsubscribeFromAll();
	   });
        return view('writemessage');
    }
}
