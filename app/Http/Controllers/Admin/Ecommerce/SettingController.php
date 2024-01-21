<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\ShopInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::get();
        return view('admin.e-commerce.setting', compact('settings'));
    }
    
    public function home()
    {
        $mega_cat = Setting::where('name', 'mega_cat')->first();
        $sub_cat = Setting::where('name', 'sub_cat')->first();

        $mini_cat = Setting::where('name', 'mini_cat')->first();
        $extra_cat = Setting::where('name', 'extra_cat')->first();
        return view('admin.e-commerce.home-setting', compact('mega_cat', 'sub_cat', 'mini_cat', 'extra_cat'));
    }












    public function update(Request $request)
    {
        if ($request->type == 1) {
            $this->validate($request, [
                'shipping_charge' => 'string|integer',
                'shipping_charge_out_of_range' => 'string|integer',
                'email'           => 'string|string|email|max:255',
                'shop_commission' => 'nullable|integer',
                'bkash'           => 'nullable|string|max:255',
                'nagad'           => 'nullable|string|max:255',
                'rocket'          => 'nullable|string|max:255',
                'bank_name'       => 'nullable|string|max:255',
                'bank_account'    => 'nullable|string|max:255',
                'branch_name'     => 'nullable|string|max:255',
                'holder_name'     => 'nullable|string|max:255',
                'routing'         => 'nullable|string|max:255',
                'bank_account'    => 'nullable|string|max:255',
                'copy_right_text' => 'nullable|string|max:255',
                'facebook'        => 'nullable|url',
                'whatsapp'        => 'nullable|string|max:255',
                'twitter'         => 'nullable|url',
                'linkedin'           => 'nullable|string|max:255',
                'footer_description' => 'string|string',
                'fb_pixel' => 'nullable|string',
                'headerCode' => 'nullable|string',
            ]);

            Setting::updateOrCreate(['name' => 'placeholder_one'], ['value' => $request->get('placeholder_one')]);
            Setting::updateOrCreate(['name' => 'placeholder_two'], ['value' => $request->get('placeholder_two')]);
            Setting::updateOrCreate(['name' => 'placeholder_three'], ['value' => $request->get('placeholder_three')]);
            Setting::updateOrCreate(['name' => 'placeholder_four'], ['value' => $request->get('placeholder_four')]);
            Setting::updateOrCreate(['name' => 'shipping_charge'], ['value' => $request->get('shipping_charge')]);
            Setting::updateOrCreate(['name' => 'shipping_charge_out_of_range'], ['value' => $request->get('shipping_charge_out_of_range')]);
            Setting::updateOrCreate(['name' => 'email'], ['value' => $request->get('email')]);
            Setting::updateOrCreate(['name' => 'shop_commission'], ['value' => $request->get('shop_commission')]);

            Setting::updateOrCreate(['name' => 'min_rec'], ['value' => $request->get('min_rec')]);
            Setting::updateOrCreate(['name' => 'min_with'], ['value' => $request->get('min_with')]);


            Setting::updateOrCreate(['name' => 'bkash'], ['value' => $request->get('bkash')]);
            Setting::updateOrCreate(['name' => 'nagad'], ['value' => $request->get('nagad')]);
            Setting::updateOrCreate(['name' => 'rocket'], ['value' => $request->get('rocket')]);
            Setting::updateOrCreate(['name' => 'bank_name'], ['value' => $request->get('bank_name')]);
            Setting::updateOrCreate(['name' => 'bank_account'], ['value' => $request->get('bank_account')]);
            Setting::updateOrCreate(['name' => 'branch_name'], ['value' => $request->get('branch_name')]);
            Setting::updateOrCreate(['name' => 'holder_name'], ['value' => $request->get('holder_name')]);
            Setting::updateOrCreate(['name' => 'routing'], ['value' => $request->get('routing')]);
            Setting::updateOrCreate(['name' => 'copy_right_text'], ['value' => $request->get('copy_right_text')]);
            Setting::updateOrCreate(['name' => 'facebook'], ['value' => $request->get('facebook')]);
            Setting::updateOrCreate(['name' => 'whatsapp'], ['value' => $request->get('whatsapp')]);
            Setting::updateOrCreate(['name' => 'twitter'], ['value' => $request->get('twitter')]);
            Setting::updateOrCreate(['name' => 'linkedin'], ['value' => $request->get('linkedin')]);
            Setting::updateOrCreate(['name' => 'youtube'], ['value' => $request->get('youtube')]);
            Setting::updateOrCreate(['name' => 'instagram'], ['value' => $request->get('instagram')]);
            Setting::updateOrCreate(['name' => 'messanger'], ['value' => $request->get('messanger')]);
            Setting::updateOrCreate(['name' => 'is_point'], ['value' => $request->get('is_point')]);
            Setting::updateOrCreate(['name' => 'Point_rate'], ['value' => $request->get('Point_rate')]);
            Setting::updateOrCreate(['name' => 'Default_Point'], ['value' => $request->get('Default_Point')]);
            Setting::updateOrCreate(['name' => 'footer_description'], ['value' => $request->get('footer_description')]);
            Setting::updateOrCreate(['name' => 'fb_pixel'], ['value' => $request->get('fb_pixel')]);
            Setting::updateOrCreate(['name' => 'fb_pixel'], ['value' => $request->fb_pixel]);
            notify()->success("Setting successfully updated", "Success");
            return back();
        }
        elseif ($request->type == 2) {
            Setting::updateOrCreate(['name' => 'header_code'], ['value' => $request->get('header_code')]);
            Setting::updateOrCreate(['name' => 'fb_pixel'], ['value' => $request->get('fb_pixel')]);
            notify()->success("Successfully updated", "Success");
            return back();
        }
        elseif ($request->type == 3) {
            Setting::updateOrCreate(['name' => 'mega_cat'], ['value' => json_encode($request->get('mega'))]);
            Setting::updateOrCreate(['name' => 'sub_cat'], ['value' => json_encode($request->get('sub'))]);
            Setting::updateOrCreate(['name' => 'mini_cat'], ['value' => json_encode($request->get('mini'))]);
            Setting::updateOrCreate(['name' => 'extra_cat'], ['value' => json_encode($request->get('extra'))]);
            notify()->success("Successfully updated", "Success");
            return back();
        }
        elseif ($request->type == 4) {
            
            Setting::updateOrCreate(['name' => 'PRIMARY_COLOR'], ['value' => $request->get('PRIMARY_COLOR')]);
            Setting::updateOrCreate(['name' => 'PRIMARY_BG_TEXT_COLOR'], ['value' => $request->get('PRIMARY_BG_TEXT_COLOR')]);
            Setting::updateOrCreate(['name' => 'SECONDARY_COLOR'], ['value' => $request->get('SECONDARY_COLOR')]);
            Setting::updateOrCreate(['name' => 'OPTIONAL_COLOR'], ['value' => $request->get('OPTIONAL_COLOR')]);
            Setting::updateOrCreate(['name' => 'OPTIONAL_BG_TEXT_COLOR'], ['value' => $request->get('OPTIONAL_BG_TEXT_COLOR')]);
            
            
            notify()->success("Successfully updated", "Success");
            return back();
        }
        else{
            notify()->error("Update type not mathing, check form hidden input with type number, change the controller", "Error");
            return back();
        }



    }









    public function mailsmsapireglogIndex(){

        $get_PRIMARY_COLOR = Setting::where('name', 'PRIMARY_COLOR')->first();
        $PRIMARY_COLOR = (!$get_PRIMARY_COLOR) ? (object)['value' => '#108b3a'] : $get_PRIMARY_COLOR;

        // mail_config=0;
        // MAIL_DRIVER="smtp"
        // MAIL_HOST="smtp.titan.email"
        // MAIL_PORT="465"
        // MAIL_USERNAME="noreply@tamjidmart.com"
        // MAIL_PASSWORD="#Tamjidmart2024"
        // MAIL_ENCRYPTION="ssl"
        // MAIL_FROM_ADDRESS="noreply@tamjidmart.com"
        // MAIL_FROM_NAME="Tamjid Mart"

        $PRIMARY_COLOR = '#000000';
        
        
        return view('admin.e-commerce.setting.mailsmsapireglogIndex', compact(
            'PRIMARY_COLOR',
        ));

    }











    public function updateLogo(Request $request)
    {
        $this->validate($request, [
            'logo'      => 'nullable',
            'auth_logo' => 'nullable',
            'favicon'   => 'nullable'
        ]);

        $logo = $request->file('logo');
        if ($logo) {
            $logoName   = 'logo' . '.' . $logo->getClientOriginalExtension();

            if (file_exists('uploads/setting/' . setting('logo'))) {
                unlink('uploads/setting/' . setting('logo'));
            }

            if (!file_exists('uploads/setting')) {
                mkdir('uploads/setting', 0777, true);
            }
            $logo->move(public_path('uploads/setting'), $logoName);
        } else {
            $logoName = setting('logo');
        }

        $auth_logo = $request->file('auth_logo');
        if ($auth_logo) {
            $authLogoName   = 'auth_logo' . '.' . $auth_logo->getClientOriginalExtension();

            if (file_exists('uploads/setting/' . setting('auth_logo'))) {
                unlink('uploads/setting/' . setting('auth_logo'));
            }

            if (!file_exists('uploads/setting')) {
                mkdir('uploads/setting', 0777, true);
            }
            $auth_logo->move(public_path('uploads/setting'), $authLogoName);
        } else {
            $authLogoName = setting('auth_logo');
        }

        $favicon = $request->file('favicon');
        if ($favicon) {
            $faviconName   = 'favicon' . '.' . $favicon->getClientOriginalExtension();

            if (file_exists('uploads/setting/' . setting('favicon'))) {
                unlink('uploads/setting/' . setting('favicon'));
            }

            if (!file_exists('uploads/setting')) {
                mkdir('uploads/setting', 0777, true);
            }
            $favicon->move(public_path('uploads/setting'), $faviconName);
        } else {
            $faviconName = setting('favicon');
        }

        Setting::updateOrCreate(['name' => 'logo'], ['value' => $logoName]);
        Setting::updateOrCreate(['name' => 'auth_logo'], ['value' => $authLogoName]);
        Setting::updateOrCreate(['name' => 'favicon'], ['value' => $faviconName]);

        notify()->success("Application logo successfully updated", "Success");
        return back();
    }

    public function showShop()
    {
        $shop_info = ShopInfo::where('user_id', 1)->first();
        return view('admin.e-commerce.shop', compact('shop_info'));
    }

    public function shopUpdate(Request $request)
    {
        $this->validate($request, [
            'shop_name'    => 'required|string|max:255',
            'url'          => 'required|string|max:255',
            'bank_account' => 'required|string|max:255',
            'bank_name'    => 'required|string|max:255',
            'holder_name'  => 'required|string|max:255',
            'branch_name'  => 'required|string|max:255',
            'routing'      => 'required|string|max:255',
            'address'      => 'required|string|max:255',
            'description'  => 'required|string',
            'profile'      => 'nullable',
            'cover_photo'  => 'nullable'
        ]);

        $shop_info = ShopInfo::where('user_id', 1)->first();

        $profile = $request->file('profile');
        $cover   = $request->file('cover_photo');
        if ($profile) {
            $currentDate = Carbon::now()->toDateString();
            $profileName = $currentDate . '-' . uniqid() . '.' . $profile->getClientOriginalExtension();

            if (file_exists('uploads/shop/profile/' . $shop_info->profile)) {
                unlink('uploads/shop/profile/' . $shop_info->profile);
            }
            if (!file_exists('uploads/shop/profile')) {
                mkdir('uploads/shop/profile', 0777, true);
            }
            $profile->move(public_path('uploads/shop/profile'), $profileName);
        }
        if ($cover) {
            $currentDate = Carbon::now()->toDateString();
            $coverName   = $currentDate . '-' . uniqid() . '.' . $cover->getClientOriginalExtension();

            if (file_exists('uploads/shop/cover/' . $shop_info->cover_photo)) {
                unlink('uploads/shop/cover/' . $shop_info->cover_photo);
            }

            if (!file_exists('uploads/shop/cover')) {
                mkdir('uploads/shop/cover', 0777, true);
            }
            $cover->move(public_path('uploads/shop/cover'), $coverName);
        }

        $shop_info->update([
            'name'         => $request->shop_name,
            'address'      => $request->address,
            'url'          => $request->url,
            'bank_account' => $request->bank_account,
            'bank_name'    => $request->bank_name,
            'holder_name'  => $request->holder_name,
            'branch_name'  => $request->branch_name,
            'routing'      => $request->routing,
            'description'  => $request->description,
            'commission'   => $request->commission,
            'profile'      => $profileName ?? $shop_info->profile,
            'cover_photo'  => $coverName ?? $shop_info->cover_photo
        ]);

        notify()->success("Shop Info successfully updated", "Congratulations");
        return back();
    }

    public function colorIndex(){

        $get_PRIMARY_COLOR = Setting::where('name', 'PRIMARY_COLOR')->first();
        $get_PRIMARY_BG_TEXT_COLOR = Setting::where('name', 'PRIMARY_BG_TEXT_COLOR')->first();
        $get_SECONDARY_COLOR = Setting::where('name', 'SECONDARY_COLOR')->first();
        $get_OPTIONAL_COLOR = Setting::where('name', 'OPTIONAL_COLOR')->first();
        $get_OPTIONAL_BG_TEXT_COLOR = Setting::where('name', 'OPTIONAL_BG_TEXT_COLOR')->first();

        $PRIMARY_COLOR = (!$get_PRIMARY_COLOR) ? (object)['value' => '#108b3a'] : $get_PRIMARY_COLOR;
        $PRIMARY_BG_TEXT_COLOR = (!$get_PRIMARY_BG_TEXT_COLOR) ? (object)['value' => '#ffffff'] : $get_PRIMARY_BG_TEXT_COLOR;
        $SECONDARY_COLOR = (!$get_SECONDARY_COLOR) ? (object)['value' => '#000'] : $get_SECONDARY_COLOR;
        $OPTIONAL_COLOR = (!$get_OPTIONAL_COLOR) ? (object)['value' => '#007bc4'] : $get_OPTIONAL_COLOR;
        $OPTIONAL_BG_TEXT_COLOR = (!$get_OPTIONAL_BG_TEXT_COLOR) ? (object)['value' => '#ffffff'] : $get_OPTIONAL_BG_TEXT_COLOR;
        
        return view('admin.e-commerce.setting.colorIndex', compact(
            'PRIMARY_COLOR', 
            'PRIMARY_BG_TEXT_COLOR',
            'SECONDARY_COLOR',
            'OPTIONAL_COLOR',
            'OPTIONAL_BG_TEXT_COLOR'
        ));

        // echo $PRIMARY_BG_TEXT_COLOR;
    }


    public function headerIndex(){

        $get_header_code = Setting::where('name', 'header_code')->first();
        $get_fb_pixel = Setting::where('name', 'fb_pixel')->first();

        if (!$get_header_code) {
            $header_code = (object)['value' => ''];
        } else {
            $header_code = $get_header_code;
        }

        if (!$get_fb_pixel) {
            $fb_pixel = (object)['value' => ''];
        } else {
            $fb_pixel = $get_fb_pixel;
        }

        return view('admin.e-commerce.setting.headerIndex', compact('header_code', 'fb_pixel'));
    }


    // public function social()
    // {
    //     $pixel = Setting::where('name', 'fb_pixel')->first();

    //     $fci = Setting::where('name', 'fci')->first();
    //     $fcs = Setting::where('name', 'fcs')->first();

    //     $gci = Setting::where('name', 'gci')->first();
    //     $gcs = Setting::where('name', 'gcs')->first();

    //     return view('admin.e-commerce.social', compact('pixel', 'fci', 'fcs', 'gci', 'gcs'));
    // }

    public function docs()
    {
        return view('admin.e-commerce.docs');
    }

    public function getway()
    {
        return view('admin.e-commerce.getway');
    }

    public function setting_g(Request $request)
    {
        Setting::updateOrCreate(['name' => 'g_bkash'], ['value' => json_encode($request->filled('bkash'))]);
        Setting::updateOrCreate(['name' => 'g_nagad'], ['value' => json_encode($request->filled('nagad'))]);
        Setting::updateOrCreate(['name' => 'g_rocket'], ['value' => json_encode($request->filled('rocket'))]);
        Setting::updateOrCreate(['name' => 'g_bank'], ['value' => json_encode($request->filled('bank'))]);
        Setting::updateOrCreate(['name' => 'g_wallate'], ['value' => json_encode($request->filled('wallate'))]);
        Setting::updateOrCreate(['name' => 'g_cod'], ['value' => json_encode($request->filled('cod'))]);
        Setting::updateOrCreate(['name' => 'g_aamar'], ['value' => json_encode($request->filled('aamar'))]);
        Setting::updateOrCreate(['name' => 'g_uddok'], ['value' => json_encode($request->filled('uddok'))]);
        Setting::updateOrCreate(['name' => 'uapi'], ['value' =>  $request->uapi]);
        Setting::updateOrCreate(['name' => 'astore'], ['value' => $request->astore]);
        Setting::updateOrCreate(['name' => 'akey'], ['value' =>  $request->akey]);
        Setting::updateOrCreate(['name' => 'amode'], ['value' =>  $request->amode]);
        Setting::updateOrCreate(['name' => 'umode'], ['value' =>  $request->umode]);


        Setting::updateOrCreate(['name' => 'ubase'], ['value' => $request->ubase]);
        notify()->success("Setting successfully updated", "Success");
        return back();
    }
}
