<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Mail;
use App\User;
use Hash;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function forgotsubmit(Request $request)
    {
      
      
      if (User::where('email', '=', $request->email)->exists()) {
   // user found
            
            $userdetail=User::where('email', '=', $request->email)->first();
                $email=$userdetail->email;
              $link=url('/').'/changepassword/'.$userdetail->remember_token;
            
             $message_text="Hello ".$userdetail->full_name."
            Please <a href='".$link."'>click here</a> to change your password. 
            ";
        	Mail::raw($message_text, function ($message) use ($email){	
			$message->to($email);
			$message->from('admin@botintel.com','Botintel');				
			$message->subject('Forgotten Password Request  - Botintel');			});	

         return json_encode('sent');
        }
}
	public function changepassword(Request $request,$token){
	
	
	if (User::where('remember_token', '=', $token)->exists()) {
		$data['token']=$token;
		 return view('front.changepassword',$data);
		
		}
		else{
			return redirect('/')->withError('Error , Token is not valid');
			
		}
   
	}
	public function passwordsubmit(Request $request){
			
		   $remember=$request->remember_token;
		  $password=$request->input('npassword');
          $updatepassword =User::where('remember_token',$remember)->first();
          $updatepassword->password=Hash::make($password);
          $updatepassword->remember_token=$request->input('_token');
          $updatepassword->updated_at=date("Y-m-d H:i:s");
          $updatepassword->save();
		   return redirect('/')->withMessage("Password Successfully Changed");
		
	}


    }
    
    

