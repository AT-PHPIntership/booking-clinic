<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\API\User\BaseController;
use App\ClinicType;

class ClinicTypeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinicTypes = ClinicType::all();
        return $this->showAll($clinicTypes);
    }
}
