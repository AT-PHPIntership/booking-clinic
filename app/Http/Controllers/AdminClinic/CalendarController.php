<?php

namespace App\Http\Controllers\AdminClinic;

use Illuminate\Http\Request;
use App\Event;
use App\Appointment;
use Calendar;

class CalendarController extends BaseController
{
    /**
     * Display appointment calendar of clinic.
     *
     * @param String $slug slug
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $events = [];
        $appointments = $this->clinic->appointments;

        foreach ($appointments as $appointment) {
            $events[] = Calendar::event(
                __('admin_clinic/calendar.appointment_title', [
                    'id' => $appointment->id,
                    'username' =>  $appointment->user->name
                ]),
                false,
                $appointment->book_time,
                $appointment->book_time->addHour(),
                null,
                [
                    'color' => Appointment::COLOR[$appointment->status_code],
                    'url' => route('admin_clinic.appointments.show', [$slug, $appointment->id]),
                ]
            );
        }

        $calendar = Calendar::addEvents($events)
            ->setOptions([
                "header" => [
                    "left" => "prev,next today",
                    "center" => "title",
                    "right" =>"month,agendaWeek,listWeek"
                ]
            ]);

        return view('admin_clinic.calendar.index', compact('calendar'));
    }
}
