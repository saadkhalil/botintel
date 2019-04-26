<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Releases;

class ReleaseController extends Controller
{
    //

    public function index(){
        
        
           if(Auth::user()):
             $now=date('Y-m-d H:i:s');
            $data['releases']=Releases::where('release_date','>',$now)->where('store_id',2)->where('country','US')->get();
		
			
 
       return view('front.release',$data);
        else:
         return redirect('/');
        endif;


    }
    public function checkrelease(Request $request){
    	
          $country=$request->country;
          $brand=$request->brand;
		  $now=date('Y-m-d H:i:s');
            $query =  DB::table('releases');
            if(!empty($country) && !empty($brand)):
                foreach ($country as $cr) {
                    $query->orWhere('country',$cr);
                    $query->whereIn('store_id',$brand);
                }
             elseif(!empty($country)):
                $query->whereIn('country',$country);
            elseif(!empty($brand)):
                $query->whereIn('store_id',$brand); 
            endif;

            $query->where('release_date','>',$now);
			$row=$query->get();
            return json_decode($row);



    }


}
