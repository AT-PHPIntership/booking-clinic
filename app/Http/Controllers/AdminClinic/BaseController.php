<?php

namespace App\Http\Controllers\AdminClinic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected $clinic;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->clinic =\App\Clinic::where('slug', request()->slug)->first();
    }
}
