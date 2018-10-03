<?php
use OneForge\ForexQuotes\ForexDataClient;
use Illuminate\Support\Facades\Redis as LRedis;

if (! function_exists('checkRouteActive')) {
    /**
     * Check request route name equal a route
     *
     * @param string $route route
     *
     * @return string
     */
    function checkRouteActive($route = '#')
    {
        return strpos(request()->url(), $route) !== false ? ' active' : '';
    }
}

if (! function_exists('getPerPage')) {
    /**
     * Check request to get per_page query
     *
     * @return string
     */
    function getPerPage()
    {
        if (request()->has('perpage')) {
            return request()->perpage;
        }
        return config('define.limit_rows');
    }
}

function connect_forex()
{
    // $key= env('FOREX_KEY');
    $client = new ForexDataClient('Ddi7WvLYENQl4Cqhpom8YIbeRldaA6mx');
    // dd($client);
    //Handle incoming price updates from the server
   $client->onUpdate(function($symbol, $data)
   {
    // dd($data);
        $redis = LRedis::connection();
        $redis->publish('message', json_encode($data));

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
       //     'GBPJPY',
       //     'AUDCAD',
       //     'EURCHF'
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
 // connect_forex();
