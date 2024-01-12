<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CustomerInfo;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Mail;
use Illuminate\Http\Request;



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
    protected $redirectTo; // = RouteServiceProvider::HOME;

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
     public function otp_mail(Request $request){
         $this->validate($request, [
            'name'     => 'required|string|max:50',
           
            'email'    => 'required|string|email|max:255|unique:users,email',
            'phone'    => 'required|string|max:11|min:11|unique:users,phone',
            'password' => 'required|string|min:8|confirmed'
        ]);
          Session::forget('otpres');
          $rand=rand(99999,999999);
              Session::put('otpres', $rand);
              $data = [
            'email'    => $request->email,
            'code'    => $rand,
            'subject'    => 'Email Verification Code',
        ];
    
        Mail::send('frontend.contact-mail', $data, function($mail) use ($data)
        {
         
                $mail->from(config('mail.from.address'), config('app.name'))
                ->to($data['email'],'Dear Customer')
                ->subject('Email Verification Code');

        });  
         return view('auth.otp_mail',compact('request'));
     }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|string|max:50',
           
            // 'email'    => 'string|email|max:255|unique:users,email',
            'phone'    => 'required|string|max:11|min:11|unique:users,phone',
            'password' => 'required|string|min:8|confirmed'
        ]);
         
          if(1==1){
              $new_str = str_replace(' ', '', $request->name);
              
            $username=strtolower($new_str).rand(9999,999);
            $customer = User::create([
                'role_id'       => 3, 
                'name'          => $request->name,
                'username'      => $username,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'password'      => Hash::make($request->password),
                'is_approved'   => true,
                'joining_date'  => date('Y-m-d'),
                'joining_month' => date('F'),
                'joining_year'  => date('Y')
            ]);
            CustomerInfo::create([
                'user_id' => $customer->id
            ]);
            Session::forget('otpres');

            if(auth()->attempt(array('username' => $request->username, 'password' => $request->password)))
            {
                return back();
            }
            notify()->success("Your registration successful, please login your account", "Congratulation");
            return redirect('/login');
        }else{
         notify()->error("OTP Is Wrong", "Wrong");
        }
        return back();
    }
    public function sendotp(Request $request){
        
        Session::forget('otpres');
        $user=User::where('phone',$request->number)->first();
        
        if(empty($user)){
            
            $rand=rand(99999,999999);
            
            $url = env('SMS_API_URL');
            $api_key = env('SMS_API_KEY');
            $senderid = env('SMS_API_SENDER_ID');
            $number = $request->number;
            $message = "Your Demo OTP Is ".$rand;

            $data = [
                "api_key" => $api_key,
                "senderid" => $senderid,
                "number" => $number,
                "message" => $message
            ];
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            $p = explode("|",$response);
            return response()->json($response);
            
            
            $sendstatus = $p[0];
            
            if($sendstatus=='1101'){
                Session::put('otpres', $rand);
                return response()->json('We Just Otp please Check Your Phone');
            }
            
            
        }else{
            return response()->json('This number already have an account');
        }
    }
}