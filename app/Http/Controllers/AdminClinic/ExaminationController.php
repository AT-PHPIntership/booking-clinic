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
        $appointment = Appointment::findOrFail($request->appointmentId);
        if ($this->clinic->id == $appointment->clinic->id and $appointment->isStatus('Confirmed')) {
            try{
                $data = $request->all();
                $data['appointment_id'] = $appointment->id;
                \App\Examination::create($data);
                $appointment->update(['status' => Appointment::STATUS['Completed']]);
                return response()->json( \App\Examination::latest()->first(), 200);
            } catch(\Exception $e) {
                return response()->json($e, 200);
            }

        }
        unset($slug);
        return response()->json(400);

    }
}
