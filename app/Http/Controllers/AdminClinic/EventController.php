<?php

namespace App\Http\Controllers\AdminClinic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use Calendar;

class EventController extends Controller
{
    public function index()
    {
        $event = [];
        $data = Event::all();
        if ($data->count()) {
            foreach ($data as $key=>$value) {
                $event[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                        [
                            'color' => '#f05050'
                        ]
                        );
            }
        }
        $calendar = Calendar::addEvents($event);
        return view('admin_clinic.appointments.fullcalender', compact('calendar'));
    }
}
