<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Subscriptions;
use App\Pages;
use Mail;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Query\Builder;

class RegisterController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/release';

    


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'phone' => 'required|',
            'subscription_id' => 'required_without_all:subscription_id',
            'email' => 'required|string|email|max:255|unique:users',
             'agree' =>'accepted'
        ]);


    }




    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
     
               $fullname=$data['fname'].' '.$data['lname'];
        $userarray=array('full_name' => $fullname,
            'email' => $data['email'],
            'phone' => $data['phone'],
            'subscription_id' => $data['subscription_id']);
        // print_r($userarray);
        // die;
        
        return User::create($userarray);
      
    }

    public function showRegistrationForm()
	{
		// if(!Auth::user()):
    	  // return Redirect::to('/release');
		// endif;
		
		$data['subscriptions']=Subscriptions::all();
		$data['variable1'] = Pages::latest('id','desc')->where('is_blog',0)->where('status',1)->limit(4)->get();
		return view('auth.register', $data);
	}

public function store(Request $request)
{
         
         $randstring=str_random(8);
         $password = Hash::make($randstring);
         $fullname=$request->input('fname').' '.$request->input('lname');
         $user= new User ;
         $user->full_name=  $fullname;
         $user->email= $request->input('email');
         $user->password= $password;
         $user->phone= $request->input('phone');
         $user->subscription_id= $request->input('subscription_id');
         $user->remember_token=$request->input("_token");
         $user->subscription_active=1;
         $user->save();  
         $userID=$user->id;


         $subscripedetail=Subscriptions::where('id',$request->input('subscription_id'))->first();
         $subscriped=strtolower($subscripedetail->subscription_name);
		 $user->newSubscription('main',$subscriped)->create($request->stripeToken);
		 $link=url('/').'/verification/'.$user->remember_token;
		 $email=$request->input('email');
		 $data=array(
		 'fullname' => $fullname,
		 'subscription_name' => strtoupper($subscripedetail->subscription_name),
		 'email' => $email,
		 'password' => $randstring,
		 'link' => $link,
		 );
		  Mail::send('emails.register', $data, function ($message) use ($email){	
			$message->to($email);
			$message->from('admin@botintel.com','Botintel');				
			$message->subject('Sign Up  - Botintel');
		  });	

           if ($user->subscribed('main',$subscriped)) {
              return redirect('/')->with('message', 'Registered Successfully, Check your mail !');
        }
             return redirect()-back()->with('error', 'Not Registered Successfully');
}

 public function verification($id)
    {
		 
          if (User::where('remember_token', '=', $id)->count() > 0) {
        
         
          $update= DB::table('users')
            ->where('remember_token', $id)
            ->update(['status' => 1 , 'updated_at'=>date("Y-m-d H:i:s")]);
				
             return redirect('/')->withMessage("Activated , Please login with your password");
          }
          else {
              
              return redirect('/')->withError("User is not valid");
          }
		
        //
		
		
		
    }
public function cancel(Request $request)
{
        

        

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
            $token = $_POST['stripeToken'];
           
            $customer = \Stripe\Customer::create([
             'source' => $token,
                'email' => 'test@gmail.com',
            ]);
            $charge = \Stripe\Charge::create([
            'amount' => 1000,
            'currency' => 'usd',
            'customer' => $customer->id,
            ]);
            print_r($charge);
            die;

            return redirect()->back()->with('message', 'Payment Successfully Updated.');
            



}

}
