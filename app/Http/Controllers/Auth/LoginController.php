<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Throwable;
use App\Models\CartInfo;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectAdmin = RouteServiceProvider::ADMIN;
    protected $redirectHome  = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request)
    {   
        $input = $request->all();
  
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
  
        // $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        
        if(auth()->attempt(array('phone' => $input['username'], 'password' => $input['password'])))
        {
            if (Auth::user()->role_id == 1) {
                Auth::logout();
                  notify()->error("Username and password not match.", "Wrong");
            return back();
            }
            $this->cartadd();
              return redirect(Session::get('link'));
            
        }elseif(auth()->attempt(array('username' => $input['username'], 'password' => $input['password'])))
        {
            if (Auth::user()->role_id == 1) {
                 Auth::logout();
                   notify()->error("Username and password not match.", "Wrong");
            return back();
            }
             $this->cartadd();
            return redirect(Session::get('link'));
            
        }elseif(auth()->attempt(array('email' => $input['username'], 'password' => $input['password'])))
        {
            if (Auth::user()->role_id == 1) {
                 Auth::logout();
                   notify()->error("Username and password not match.", "Wrong");
            return back();
            }
             $this->cartadd();
            return redirect(Session::get('link'));
            
        }else{
            notify()->error("Username and password not match.", "Wrong");
            return back();
        }
          
    }
    public function cartadd(){
        $carts=CartInfo::where('user_id',auth()->id())->get();
        
        foreach($carts as $cart){
            $product=Product::find($cart->product_id);
             Cart::add([
            'id'        => $product->id, 
            'name'      => $product->title, 
            
            'qty'       => $cart->qty, 
            'price'     => $cart->price,
            'weight'    => $product->user_id,
            'options'   => [
                'slug'     => $product->slug, 
                'image'    => $product->image, 
                'attributes'     => $cart->attr??Null,
                'color'    => $cart->color ?? Null,
                  'vendor'      => $product->user_id, 
                   'seller'      => $product->user->name, 
            ],
            
        ]);
        }
    }

     public function superLogin(Request $request)
    {   
        $input = $request->all();
  
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
  
          if(auth()->attempt(array('phone' => $input['username'], 'password' => $input['password'])))
        {
            if (Auth::user()->role_id == 1) {
                 return Redirect::to('/admin/dashboard');
            }else{
                notify()->error("Phone and password not match.", "Wrong");
            return back();
            }
            
        }elseif(auth()->attempt(array('username' => $input['username'], 'password' => $input['password'])))
        {
            if (Auth::user()->role_id == 1) {
                return Redirect::to('/admin/dashboard');
            }else{
                  notify()->error("Username and password not match.", "Wrong");
            return back();
            }
            
        }else{
            notify()->error("Username and password not match.", "Wrong");
           return back();
        }
    }
      public function superLoginconfirm(Request $request)
    {   
        $otp=Session::get('spotpres');
        $user=Session::get('spuser');
        $pass=Session::get('sppass');
        if($request['otp']!='1021417'){
            notify()->error("Wrong Otp", "Wrong");
           return view('auth.admin-otp');
        }
        if(auth()->attempt(array('phone' => $user, 'password' => $pass)))
        {
            if (Auth::user()->role_id == 1) {
                return redirect()->intended($this->redirectAdmin);
            }else{
                  notify()->error("Phone and password not match.", "Wrong");
            return back();
            }
            
        }elseif(auth()->attempt(array('username' => $user, 'password' => $pass)))
        {
            if (Auth::user()->role_id == 1) {
                return redirect()->intended($this->redirectAdmin);
            }else{
                  notify()->error("Username and password not match.", "Wrong");
            return view('auth.admin-otp');
            }
            
        }else{
            notify()->error("Username and password not match.", "Wrong");
           return view('auth.admin-otp') ;
        }
          
    }
 
    public function handleFacebookCallback(){
      
        try{
            $user = Socialite::driver('facebook')->user();
            dd($user);
        }catch(\Throwable $th){
            throw $th;
        }
        $login=User::where('facebook_id',$user->getId())->first();
        if(!$login){
            User::create([
                'name'=>$user->getName(),
                'email'=>$user->getEmail(),
                'facebook_id'=>$user->getId(),
            ]);
        }
        if(Auth::loginUsingId($login->id)){
            return redirect()->intended('/');
        }
    }
}
