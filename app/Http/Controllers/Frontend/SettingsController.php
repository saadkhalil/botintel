<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Hash;
use App\User;
use App\Subscriptions;

class SettingsController extends Controller
{
    //

    public function index(){
    	
    	 
    	     if($user=Auth::user()):
            $data['subscription']=Subscriptions::all();
          $data['userdetails'] =DB::table('users')->select('users.*','users.id as UserID','subscription.*')
                ->leftjoin('subscription', 'subscription.id', '=', 'users.subscription_id')
                ->where('users.id',$user->id)
                ->first();  
                // print_r($data['userdetails']);
                // die;
         
       return view('front.settings',$data);
    	else:
    	 return redirect('/');
    	endif;


    }
     public function update(Request $request){

        
        $user=Auth::user();
        $userdetails=User::where('id',$user->id)->first();
        $userdetails->full_name=$request->input('fullname');
        $userdetails->gender=$request->input('gender');
        $userdetails->language=$request->input('language');
        $userdetails->timezone=$request->input('timezone');
        $userdetails->nick_name=$request->input('nickname');
        $userdetails->phone=$request->input('phone');
        $userdetails->country=$request->input('countries');
        $userdetails->updated_at=date("Y-m-d H:i:s");
        $userdetails->save();
         return redirect()->back()->with('message', 'Personal Information Successfully Updated.');
        
    }
    public function upgradeplan(Request $request){
    

        $user=Auth::user();
        $subscribedetails=Subscriptions::where('id',$request->subscription)->first();
      
        $planid=strtolower($subscribedetails->subscription_name);

        $userdetails=User::where('id',$user->id)->first();
        $userdetails->subscription_id=$request->subscription;
        $userdetails->updated_at=date("Y-m-d H:i:s");
        $userdetails->save();
      
        $userdetails->subscription('main')->swap($planid);
        // $subscription = DB::table('subscriptions')->where('user_id',$userdetails->id)->first();
        // $subscription->stripe_plan = $planid;
        // $subscription->save();



         return redirect()->back()->with('message', 'Plan Successfully Upgraded.');
        
    }
    public function cancelplan(Request $request)
    { 

     $user=Auth::user();

       $userdetails=User::where('id',$user->id)->first();
       
        $userdetails->updated_at=date("Y-m-d H:i:s");
        $userdetails->subscription_active=0;
        $userdetails->save();
        $subscribedetails=Subscriptions::where('id',$request->sub)->first();

        $planid=strtolower($subscribedetails->subscription_name);

       $userdetails->subscription('main')->cancel();
       echo 1;
    }

    public function changepassword(Request $request){
           
        if (Hash::check($request->input("password"), Auth::user()->password)) {
 //add logic here
             $password=bcrypt($request->input("npassword"));
          $updatepassword =User::where('id', '=', Auth::user()->id)->first();
          $updatepassword->password=bcrypt($request->input("npassword"));
          $updatepassword->updated_at=date("Y-m-d H:i:s");
          $updatepassword->save();
         
             return redirect()->back()->withMessage("Password Successfully Changed");
        }
          else {
              
              return redirect()->back()->withError("Old Password is not Valid");
          }
    }
}
