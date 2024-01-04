<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\CustomerInfo;
use Laravel\Jetstream\Events\AddingTeam;
use Laravel\Socialite\Facades\Socialite;

class socialController extends Controller
{

    public function handleGoogleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try{
            $user = Socialite::driver('google')->user();
        }catch(\Throwable $th){
           
        }
        $log=User::where('email',$user->getEmail())->first();
        
        $login=User::where('oauth_id',$user->getId())->where('oauth_type','google')->first();
        
        if(!$login){
            if($log){
              notify()->warning("The email has already been taken., please login your account", "Warning");
            return redirect('/login');
        }
            
             $i=explode(' ',$user->getName(),-1);
                $username= $i[0].rand(9999,99999);
            $newUser=User::create([
               
                'role_id'=>'3',
                'username'      => $username,
                'phone'         => 'null',
                'name'=>$user->getName(),
                'email'=>$user->getEmail(),
                'oauth_id'=>$user->getId(),
                'oauth_type'=>'google',
                'password'      => '',
                'joining_date'  => date('Y-m-d'),
                'joining_month' => date('F'),
                'joining_year'  => date('Y'),
                'is_approved'=>true,
                'status'=>true,

            ]);
            CustomerInfo::create([
                'user_id' => $newUser->id
            ]);
            Auth::loginUsingId($newUser->id);
              return redirect()->intended('/');
        }elseif(Auth::loginUsingId($login->id)){
            return redirect()->intended('');
        }

    }

    public function handleFacebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try{
            $user = Socialite::driver('facebook')->user();
        }catch(\Throwable $th){
           
        }
        $login=User::where('oauth_id',$user->getId())->where('oauth_type','fb')->first();
        if(!$login){
            $i=explode(' ',$user->getName(),-1);
            $username= $i[0].rand(9999,99999);
            $newUser=User::create([
                'role_id'=>'3',
                'username'      => $username,
                'phone'         => 'null',
                'name'=>$user->getName(),
                'email'=>$user->getEmail(),
                'oauth_id'=>$user->getId(),
                'oauth_type'=>'fb',
                'password'      => '',
                'joining_date'  => date('Y-m-d'),
                'joining_month' => date('F'),
                'joining_year'  => date('Y'),
                'is_approved'=>true,
                'status'=>true,

            ]);
            CustomerInfo::create([
                'user_id' => $newUser->id
            ]);
            Auth::loginUsingId($newUser->id);
              return redirect()->intended('/');
        }elseif(Auth::loginUsingId($login->id)){
            return redirect()->intended('');
        }

    }
}
