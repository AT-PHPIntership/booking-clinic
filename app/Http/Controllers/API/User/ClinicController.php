<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clinic;

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

        $clinics = Clinic::filter()->paginate($perpage);
        $clinics = $this->formatPaginate($clinics);

        return $this->showAll($clinics);
    }
}
