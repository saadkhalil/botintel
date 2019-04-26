<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Pages;

class PagesController extends Controller
{
    //

    public function index($slug){
   				
    		$data['pagedetails']=Pages::where('page_slug',$slug)->where('is_blog',0)->where('status',1)->first();

    		$data['Title']=explode(' ',$data['pagedetails']->page_name);
    	
    		return view('front.pages',$data);

    					

    }
}
