<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VendorAccount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Show Authenticated User Profile
    public function index()
    {
        return view('vendor.profile.index');
    }

    // Show Authenticated User Profile
    public function showUpdateProfileForm()
    {
        $vendor = Auth::user();
        return view('vendor.profile.update', compact('vendor'));
    }

    // Show Change Password Form
    public function showChangePasswordForm()
    {
        return view('vendor.profile.password-change');
    }

    // Update Password to Authenticated Admin
    public function updatePassword(Request $request) 
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        // Get logged in user.
        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            
            if (!Hash::check($request->password, $user->password)) {
                
                $authUser = User::find($user->id);
                $authUser->update([
                    'password' => Hash::make($request->password),
                ]);
                
              
                notify()->success("Success", "Password Change Successfully");
                
                return back();
                
            } else {
                notify()->warning("New password can't be same as current password! ⚡️", "Sorry!");
            }

        } else {
            notify()->error("Password does not match!!", "Not Match");
        }

        return back();
        
    }

    public function updateInfo(Request $request)
    {
        $data = User::find(auth()->id());
        $this->validate($request, [
            'avatar'       => 'nullable|image|max:1024|mimes:jpeg,jpg,png,bmp',
            'name'         => 'required|string|max:50',
            'username'     => 'required|string|max:50|unique:users,username,'.$data->id,
            'email'        => 'required|string|email|max:255',
            'phone'        => 'required|string|max:30',
            'shop_name'    => 'required|string|max:255',
            'url'          => 'nullable|string|max:255',
            'bank_account' => 'required|string|max:255',
            'bank_name'    => 'required|string|max:255',
            'holder_name'  => 'required|string|max:255',
            'branch_name'  => 'required|string|max:255',
            'routing'      => 'required|string|max:255',
            'address'      => 'required|string|max:255',
            'description'  => 'required|string',
            'profile'      => 'nullable|image|max:1024|mimes:jpg,jpeg,bmp,png',
            'cover_photo'  => 'nullable|image|max:1024|mimes:jpg,jpeg,bmp,png'
        ]);
        
        $avatar = $request->file('avatar');
        if ($avatar) {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $currentDate.'-'.uniqid().'.'.$avatar->getClientOriginalExtension();
            
            if (file_exists('uploads/member/'.$data->avatar)) {
                unlink('uploads/member/'.$data->avatar);
            }

            if (!file_exists('uploads/member')) {
                mkdir('uploads/member', 0777, true);
            }
            $avatar->move(public_path('uploads/member'), $imageName);

        } else {
            $imageName = $data->avatar;
        }
        $profile = $request->file('profile');
        $cover   = $request->file('cover_photo');
          $trade   = $request->file('trade');
        $nid   = $request->file('nid');
        if ($profile) {
            $currentDate = Carbon::now()->toDateString();
            $profileName = $currentDate.'-'.uniqid().'.'.$profile->getClientOriginalExtension();
            
            if (!file_exists('uploads/shop/profile')) {
                mkdir('uploads/shop/profile', 0777, true);
            }
            $profile->move(public_path('uploads/shop/profile'), $profileName);
        } 
        else {
            $profileName = $data->shop_info->profile;
        }
        if ($cover) {
            $currentDate = Carbon::now()->toDateString();
            $coverName   = $currentDate.'-'.uniqid().'.'.$cover->getClientOriginalExtension();
            
            if (!file_exists('uploads/shop/cover')) {
                mkdir('uploads/shop/cover', 0777, true);
            }
            $cover->move(public_path('uploads/shop/cover'), $coverName);
        }
        else {
            $coverName = $data->shop_info->cover_photo;
        }

        if ($trade) {
            $currentDate = Carbon::now()->toDateString();
            $tradeName   = $currentDate.'-'.uniqid().'.'.$trade->getClientOriginalExtension();
            
            if (file_exists('uploads/shop/trade/'.$data->shop_info->trade)) {
                unlink('uploads/shop/trade/'.$data->shop_info->trade);
            }

            if (!file_exists('uploads/shop/trade')) {
                mkdir('uploads/shop/trade', 0777, true);
            }
            $trade->move(public_path('uploads/shop/trade'), $tradeName);
        }
        else {
            $tradeName = $data->shop_info->trade;
        }
         if ($nid) {
            $currentDate = Carbon::now()->toDateString();
            $nidName   = $currentDate.'-'.uniqid().'.'.$nid->getClientOriginalExtension();
            
            if (file_exists('uploads/shop/nid/'.$data->shop_info->nid)) {
                unlink('uploads/shop/nid/'.$data->shop_info->nid);
            }

            if (!file_exists('uploads/shop/nid')) {
                mkdir('uploads/shop/nid', 0777, true);
            }
            $nid->move(public_path('uploads/shop/nid'), $nidName);
        }
        else {
            $nidName = $data->shop_info->nid;
        }



        $data->update([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'avatar'   => $imageName,
            'is_approved'=>0
        ]);

        $data->shop_info()->update([
            'name'         => $request->shop_name,
            'address'      => $request->address,
            'url'          => $request->url,
            'bank_account' => $request->bank_account,
            'bank_name'    => $request->bank_name,
            'holder_name'  => $request->holder_name,
             'bkash'         => $request->Bkash,
            'nogod'         => $request->Nagad,
            'rocket'         => $request->Rocket,
            'branch_name'  => $request->branch_name,
            'routing'      => $request->routing,
            'description'  => $request->description,
            'profile'      => $profileName,
            'cover_photo'  => $coverName,
             'trade'  => $tradeName,
            'nid'  => $nidName
        ]);
        notify()->success("Profile info successfully updated", "Success");
    
        return redirect()->to(routeHelper('profile'));
        
    }
}