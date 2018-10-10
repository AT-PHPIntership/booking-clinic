<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \DateTime;

class HomeController extends Controller
{
    /**
    * Display index page when accessing the website.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    	$time= '2018-10-10 10:10:10';
    	$priceStart = new DateTime("@" . strtotime($time));
		$priceStart->modify("+1 second"); //You're pretty much done here!
		dd($time,  $priceStart->format("Y-m-d H:i:s")); //Just to see the result.
        return view('user.home');
    }
}
