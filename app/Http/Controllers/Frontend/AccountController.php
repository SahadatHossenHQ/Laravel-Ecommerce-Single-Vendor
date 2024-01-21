<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Blog;
use App\Models\Order;
use App\Models\Withdraw;
use Carbon\Carbon;
use App\Models\CustomerInfo;
use App\Models\VendorAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
class AccountController extends Controller
{
    
    public function index(){
        $blog=Blog::where('user_id',auth()->id())->count();
        $order=Order::where('user_id',auth()->id())->count();
        $pending=Order::where('user_id',auth()->id())->where('status','0')->count();
        $processing=Order::where('user_id',auth()->id())->where('status','1')->count();
        $cancel=Order::where('user_id',auth()->id())->where('status','2')->count();
        $shipping=Order::where('user_id',auth()->id())->where('status','4')->count();
        $delevery=Order::where('user_id',auth()->id())->where('status','3')->count();
        return view('frontend.account-dashboard',compact('blog','order','pending','processing','cancel','shipping','delevery'));
    }
    

    public function sendEotp(Request $request){
        
        $email=$request->email;
        Session::put('ntemail', $email);
        $code=rand(9999,99999);
        Session::put('ntcode', $code);
        
        $data = [
            'email'    => $email,
            'code'    => $code,
            'subject'    => 'Email Verification Code',
        ];
    
        Mail::send('frontend.contact-mail', $data, function($mail) use ($data)
        {
                $mail->from(config('mail.from.address'), config('app.name'))
                ->to($data['email'],'Dear Customer')
                ->subject('Email Verification Code');

        });  
        
        return view('frontend.email-verify',compact('email'));
    }


    public function otpconfirm(Request $request){
        if($request->otp == Session::get('ntcode')){
            $user=User::find(auth()->id());
            $user->email=Session::get('ntemail');
            $user->email_verified_at=date('y-m-d');
            $user->update();
             notify()->success("Your information updated successfully", "Congratulations");
            return redirect()->to('/account/dashboard');
        }else{
            $email=Session::get('ntemail');
              notify()->error("Wrong Code", "Warning");
             return view('frontend.email-verify',compact('email'));
        }
    }


    public function verify(){
        return view('frontend.email-verify');
    }


    /**
     * show authenticated user account
     *
     * @return void
     */
    public function showAccount()
    {
        // auth user check
        if (Auth::check()) {
            return view('frontend.account');
        }
        return redirect()->route('home');
    }

        
    /**
     * update authenticated user account info
     *
     * @param  mixed $request
     * @return void
     */


    public function accountUpdate(Request $request)
    {
        $auth = User::find(auth()->id());
        $this->validate($request, [
            'name'      => 'required|string|max:255',
            'username'  => 'required|string|max:255|unique:users,username,'.$auth->id,
            'email'     => 'required|string|max:255',
            'phone'     => 'required|string|max:11|min:11'
        ]);
        $avatar = $request->file('avatar');
        if ($avatar) {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $currentDate.'-'.uniqid().'.'.$avatar->getClientOriginalExtension();
            
            if (file_exists('uploads/member/'.auth()->user()->avatar)) {
                unlink('uploads/member/'.auth()->user()->avatar);
            }

            if (!file_exists('uploads/member')) {
                mkdir('uploads/member', 0777, true);
            }
            $avatar->move(public_path('uploads/member'), $imageName);

        } else {
            $imageName = auth()->user()->avatar;
        }
        $auth->update([
            'name'      => $request->name,
            'username'  => $request->username,
              'phone'  => $request->phone,
            'avatar' =>$imageName,
        ]);
        
        if (isset(auth()->user()->customer_info)) {
            $auth->customer_info()->update([
                'country'   => $request->country,
                'city'      => $request->city,
                'distric'      => $request->distric,
                'thana'      => $request->thana,
                'street'    => $request->street,
                'post_code' => $request->post_code
            ]);
        }
        
        notify()->success("Your information updated successfully", "Congratulations");
        return back();
    }


    public function pasmRecover(){
        // echo 'Recover by mobile';
        return view('auth.passwords.mobile');
    }

    public function pasm(Request $request){
        
        // random number generator
        $rand=rand(99999,999999);
        

        if($request->method=='Phone'){
    
            // Checking user exist || not
            $user=User::where('phone',$request->phone)->first();
            
            if($user){
                // Changing the password with encryption bcrypt
                $user->password=bcrypt($rand);
                $user->save();

                // Sending the password
                $url = setting('sms_api_url');
                $api_key = setting('sms_api_key');
                $senderid = setting('sms_api_senderid');
                $number = $request->phone;
                $message = "Your Password: ".$rand;

                $data = [
                    "api_key" => $api_key,
                    "senderid" => $senderid,
                    "number" => $number,
                    "message" => $message
                ];
                
                // command for sending by curl
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                
                // response catch from SMS api server by curl
                $response = curl_exec($ch);
                $p = explode("|",$response);
                $sendstatus = $p[0];
                
                // If response status 1101 by SMS api service then return success
                if($sendstatus=='1101'){
                    notify()->success("We Send New Password", "Check Phone");
                    return redirect('/login');
                }

                notify()->success("We Send New Password", "Check Phone");
                return redirect('/login');
                

            } else{
                notify()->error("We can't find your account", "Wrong");
                return back();
            }
        } elseif($request->method=='Email'){
            
            // echo $request->username;


            $user=User::where('email', $request->username)->first();
            echo $user;

            if($user){
                $user->password=bcrypt($rand);
                $user->save(); 
                $email=$request->username;                 
                $data = [
                    'email'    => $email,
                    'code'    => $rand,
                    'subject'    => 'New Password',
                ];
            
                Mail::send('frontend.pass-mail', $data, function($mail) use ($data){
                        $mail->from(config('mail.from.address'),config('app.name'))
                        ->to($data['email'],'Dear Customer' )
                        ->subject('New Password');

                });

                notify()->success("We Send New Password", "Check Email");
                return redirect('/login');
            
            } else{

                notify()->error("We can't find your account", "Wrong");
                return back();
        
            }
        }

        // echo $request->method;
    }


    public function passChangeUser(){
        return view('frontend.passchange');
    }


    public function redem(){
        return view('frontend.redem');
    }


    public function cashout(){
        return view('frontend.cashout');
    }


    public function withdraw(Request $request){
        if($request->method==4){
            if($request->amount<setting('min_rec')){
                notify()->error("Check Limit or insufficient wallate", "Wrong");
                return back();
            }
        }else{
            if($request->amount<setting('min_with')){
                notify()->error("Check Limit or  insufficient wallate", "Wrong");
                return back();
            }
        }
        
        $vendor=User::find(auth()->id());
        if($request->amount>$vendor->wallate){
                notify()->error("insufficient wallate balance", "Wrong");
                return back();
        }
            
        $vendor->wallate -=$request->amount;
            $vendor->update();
        Withdraw::create([
                'user_id'=>auth()->id(),
                'user_type'=>'1',
                'number'=>$request->number,
                'amount'=>$request->amount,
                'payment_method'=>$request->method,
            ]);
          notify()->success("Done", "Successfully");
            return back();
    }
    

    public function vendorJoin(){
        return view('auth.vendor_join');
    }


    public function register2(Request $request)
    {
          $this->validate($request, [
            
            'phone'     => 'required|string|max:11|min:11'
        ]);
        $vendor = User::create([
            'role_id'       => 2,
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'password'      => Hash::make($request->password),
            'is_approved'   => true,
            'joining_date'  => date('Y-m-d'),
            'joining_month' => date('F'),
            'joining_year'  => date('Y'),
            'is_approved' => '0'
        ]);
        
        CustomerInfo::create([
            'user_id' => $vendor->id
        ]);

        VendorAccount::create([
            'vendor_id' => $vendor->id
        ]);

        $vendor->shop_info()->create([
            'name'         => 'null_wait',
            'slug'         => rand(pow(10, 5-1), pow(10, 15)-1),
            'address'      => $request->address,
            'url'          => Null,
            'bank_account' => Null,
            'bank_name'    => Null,
            'holder_name'  => Null,
            'branch_name'  => Null,
            'routing'      => Null,
            'description'  => 'No Description',
            'commission'   => 5,
            'gmail'=>$request->email,
            'profile'      => 'p.png',
            'cover_photo'  => 'cp.png',
            'trade'  => 't.png',
            'nid'  => 'n.png'
        ]);
        
         notify()->success("Register Successfully Success", "Successfully");
        return redirect('/login');
        
    }


    public function covert(Request $request){
        $blance=auth()->user()->point*setting('Point_rate');
        $user=User::find(auth()->id());
        $user->point=0;
        $user->wallate +=$blance;
        $user->update();
        notify()->success("Convert Success", "Successfully");
        return back();
    }

}