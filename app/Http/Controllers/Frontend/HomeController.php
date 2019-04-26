<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;

class HomeController extends Controller
{
    //
   

    public function index(){

    	if(!Auth::user()):
    	  return view('front.home');
    	else:
    		return Redirect::to('/release');
    	endif;


    }
}
