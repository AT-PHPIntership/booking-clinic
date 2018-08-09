<?php

namespace App\Http\Controllers\AdminClinic;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminClinic\BaseController;
use App\Appointment;

class ExaminationController extends BaseController
{
    /**
     * Store a examination of clinic
     *
     * @param \Illuminate\Http\Requests $request     request
     * @param String                    $slug        slug
     * @param \App\Appointment          $appointment appointment
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {
        $status = Appointment::STATUS;
        if ($this->clinic->id == $appointment->id and $status[$appointment->status] == $status['Pending']) {
            $data = $request->all();
            $data['appointment_id'] = $appointment->id;
            \App\Examination::create($data);
            $appointment->update(['status' => $status['Completed']]);
            return response()->json(204);
        }
        unset($slug);
        return response()->json(400);

    }
}
