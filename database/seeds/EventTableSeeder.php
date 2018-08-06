<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['title'=>'Demo Event-1', 'start_date'=>'2018-08-5', 'end_date'=>'2017-08-6'],
        	['title'=>'Demo Event-2', 'start_date'=>'2018-08-6', 'end_date'=>'2018-08-9'],
        	['title'=>'Demo Event-3', 'start_date'=>'2018-08-4', 'end_date'=>'2018-08-7'],
        	['title'=>'Demo Event-3', 'start_date'=>'2018-08-8', 'end_date'=>'2018-08-9'],
        ];
        foreach ($data as $key => $value) {
        	\App\Event::create($value);
        }
    }
}
