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
     * Get list appointments
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perpage = getPerPage();
        $appointments = request()->user()->appointments()
            ->with('clinic:id,name')->filter()
            ->paginate($perpage);
        $appointments = $this->formatPaginate($appointments);
        return $this->showAll($appointments);
    }

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

    /**
     * User can cancel a specify pending or confirmed appointment.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $appointment = Appointment::find($id);
        if ($appointment) {
            if (request()->user()->id == $appointment->user->id &&
                ($appointment->isPending() || $appointment->isConfirmed())) {
                $appointment->status = Appointment::STATUS_CANCEL;
                if ($appointment->save()) {
                    return $this->successResponse($appointment, Response::HTTP_OK);
                }
            }
        }
        return $this->errorResponse(__('api/user.cancel_appointment.fail'), Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
