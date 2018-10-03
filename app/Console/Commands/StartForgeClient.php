<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use LRedis;
use OneForge\ForexQuotes\ForexDataClient;

class StartForgeClient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'forge-client:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start Forge client to get data socket from forge service';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $key= env('FOREX_KEY');
        // dd($key);
        $client = new ForexDataClient('Ddi7WvLYENQl4Cqhpom8YIbeRldaA6mx');

        //Handle incoming price updates from the server
       $client->onUpdate(function($symbol, $data)
       {
            $redis = LRedis::connection();
            $redis->publish('message', json_encode($data));
       });

       //Handle non-price update messages
       $client->onMessage(function($message)
       {
           echo $message;
       });
       //Connect to the server
       $client->connect(function($client)
       {
           //Subscribe to a single currency pair
           $client->subscribeTo('EURUSD');
           //Subscribe to an array of currency pairs
           // $client->subscribeTo([
           //     'USDJPY',
           //     'JPYUSD',
           //     'EURJPY',
           //     'JPYEUR'
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
    }
}
