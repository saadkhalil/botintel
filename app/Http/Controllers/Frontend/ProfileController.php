<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Profile;
use App\User;

class ProfileController extends Controller
{
    //

    public function index(){
    	
    	if($user=Auth::user()):
    	
    		$data['userprofiles'] =DB::table('users')->select('users.*','users.id as UserID','profile.*')
                ->leftjoin('profile', 'profile.user_id', '=', 'users.id')
                ->where('profile.user_id',$user->id)
                ->get();  
                 
                $data['subscriped']=DB::table('users')->select('users.*','users.id as UserID','subscription.*')
                ->leftjoin('subscription', 'subscription.id', '=', 'users.subscription_id')
                ->where('users.id',$user->id)
                ->first(); 
               
             
               
               
    	  return view('front.profile',$data);
    	else:
    	 return redirect('/');
    	endif;


    }


    public function getprofile(Request $request){
    	
    	$getprofile=Profile::where('id',$request->input('id'))->first(); 
    	if($getprofile):
    		echo $getprofile;
    	endif;


    } 
     public function delprofile(Request $request){
    	
    	$delprofile=Profile::find($request->input('id')); 
    	$delprofile->delete();   
    	echo true;


    } 
    public function insertprofile(Request $request){

		$userprofile = Profile::where('user_id',Auth::user()->id)->get();

    	$insertprofile= new Profile;
    	$insertprofile->user_id=Auth::user()->id;
    	$i=2;
    	if(count($userprofile) >0):
    	foreach($userprofile as $userprof):
    	$insertprofile->profile_name='Profile '.$i;
    	$i++;
    	endforeach;
    	else:
    	$insertprofile->profile_name='Profile 1';
    	endif;	

    	$insertprofile->created_at=date('Y-m-d H:i:s');
    	$insertprofile->save();

    	echo true;



    }

    public function submit(Request $request)
    {
		
		// print_r($request->input());
		// die;
        if(!empty($request->input('id'))){
			
			$userprofile=Profile::where('id',$request->input('id'))->first();
    	$userprofile->profile_name=$request->input('profilename');
    	$userprofile->delivery_fname=$request->input('fname');
    	$userprofile->delivery_lname=$request->input('lname');
    	$userprofile->delivery_address1=$request->input('address1');
    	$userprofile->delivery_address2=$request->input('address2');
    	$userprofile->delivery_city=$request->input('city');
    	$userprofile->delivery_state=$request->input('state');
    	$userprofile->delivery_country=$request->input('countries');
    	$userprofile->delivery_zip=$request->input('zip');
    	$userprofile->delivery_phone=$request->input('phone');
    	$userprofile->payment_email=$request->input('paymentemail');
    	$userprofile->payment_card_type=$request->input('cardtype');
    	$userprofile->payment_cvv=$request->input('cvv');
    	$userprofile->payment_cardno=$request->input('cardnumber');
    	$userprofile->payment_expmon=$request->input('expmon');
    	$userprofile->payment_expyear=$request->input('expyear');
    	$userprofile->updated_at=date('Y-m-d H:i:s');
    	$userprofile->save();
    	 return redirect()->back()->with('message', 'Profile Successfully Updated.');
        
        }
        else{
			
			   // $userprofile = Profile::where('user_id',Auth::user()->id)->get();
		
    	// $insertprofile= new Profile;
    	// $insertprofile->user_id=Auth::user()->id;
    	// $i=2;
    	// if(count($userprofile) >0):
    	// foreach($userprofile as $userprof):
    	// $insertprofile->profile_name='Profile '.$i;
    	// $i++;
    	// endforeach;
    	// else:
    	// $insertprofile->profile_name='Profile 1';
    	// endif;	
		$insertprofile= new Profile;
    	$insertprofile->user_id=Auth::user()->id;
		$insertprofile->profile_name=$request->input('profilename');
		$insertprofile->delivery_fname=$request->input('fname');
    	$insertprofile->delivery_lname=$request->input('lname');
    	$insertprofile->delivery_address1=$request->input('address1');
    	$insertprofile->delivery_address2=$request->input('address2');
    	$insertprofile->delivery_city=$request->input('city');
    	$insertprofile->delivery_state=$request->input('state');
    	$insertprofile->delivery_country=$request->input('countries');
    	$insertprofile->delivery_zip=$request->input('zip');
    	$insertprofile->delivery_phone=$request->input('phone');
    	$insertprofile->payment_email=$request->input('paymentemail');
    	$insertprofile->payment_card_type=$request->input('cardtype');
    	$insertprofile->payment_cvv=$request->input('cvv');
    	$insertprofile->payment_cardno=$request->input('cardnumber');
    	$insertprofile->payment_expmon=$request->input('expmon');
    	$insertprofile->payment_expyear=$request->input('expyear');
    	$insertprofile->created_at=date('Y-m-d H:i:s');
    	$insertprofile->save();
		
            return redirect()->back()->with('message', 'Profile Successfully Inserted.');
			
    	
        }



    }
}
