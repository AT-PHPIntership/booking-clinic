<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\API\User\BaseController;
use App\Http\Requests\User\BookAppointmentRequest;
use App\Appointment;
use Carbon\Carbon;

class AppointmentController extends BaseController
{

    /**
     * Store new appointment.
     *
     * @param App\Http\Requests\User\BookAppointmentRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BookAppointmentRequest $request)
    {
        $data = $request->only(['description', 'clinic_id', 'book_time']);
        $data['book_time'] = Carbon::parse($data['book_time'])->toDateTimeString();
        $data['user_id'] = $request->user()->id;
        $appointment = Appointment::make($data);
        $appointment->status = Appointment::STATUS_PENDING;
        if ($appointment->save()) {
            return $this->successResponse($appointment, Response::HTTP_CREATED);
        }
        return $this->errorResponse(__('api/appointment.store.fail'), Response::HTTP_BAD_REQUEST);
    }
}
