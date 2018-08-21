<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clinic;
use Illuminate\Http\Response;

class ClinicController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perpage = $request->has('perpage')
            ? $request->perpage
            : config('define.limit_rows');

        $clinics = Clinic::filter()->with(['images', 'clinicType:id,name'])->paginate($perpage);
        $clinics = $this->formatPaginate($clinics);

        return $this->showAll($clinics);
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id id
     *
     * @return void
     */
    public function show($id)
    {
        $clinic = Clinic::with(['images', 'clinicType:id,name'])->find($id);

        if ($clinic) {
            return $this->showOne($clinic);
        }

        return $this->errorResponse(__('api/clinic.error.404'), Response::HTTP_NOT_FOUND);
    }
}
