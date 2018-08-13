<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    use ApiResponser;

    /**
     * Construct parent Controller
     *
     * @return void
     */
    public function __construct()
    {

    }
}
