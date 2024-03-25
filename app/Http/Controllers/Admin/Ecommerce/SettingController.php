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

        // dd($request);

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

            
            notify()->success("Setting successfully updated", "Success");
            return back();
        }
        elseif ($request->type == 2) {

            Setting::updateOrCreate(['name' => 'header_code'], ['value' => $request->get('header_code')]);
            Setting::updateOrCreate(['name' => 'fb_pixel'], ['value' => $request->get('fb_pixel')]);
            Setting::updateOrCreate(['name' => 'body_code'], ['value' => $request->get('body_code')]);
            Setting::updateOrCreate(['name' => 'global_css'], ['value' => $request->get('global_css')]);
            Setting::updateOrCreate(['name' => 'global_js'], ['value' => $request->get('global_js')]);
            Setting::updateOrCreate(['name' => 'override_css'], ['value' => $request->get('override_css')]);
            Setting::updateOrCreate(['name' => 'NOTICE_STATUS'], ['value' => $request->get('NOTICE_STATUS')]);
            Setting::updateOrCreate(['name' => 'CUSTOM_NOTICE'], ['value' => $request->get('CUSTOM_NOTICE')]);
            Setting::updateOrCreate(['name' => 'BELOW_SLIDER_HTML_CODE_STATUS'], ['value' => $request->get('BELOW_SLIDER_HTML_CODE_STATUS')]);
            Setting::updateOrCreate(['name' => 'BELOW_SLIDER_HTML_CODE'], ['value' => $request->get('BELOW_SLIDER_HTML_CODE')]);
            Setting::updateOrCreate(['name' => 'FOOTER_COL_4_HTML'], ['value' => $request->get('FOOTER_COL_4_HTML')]);
            Setting::updateOrCreate(['name' => 'android_app'], ['value' => $request->get('android_app')]);
            
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
            Setting::updateOrCreate(['name' => 'MAIN_MENU_BG'], ['value' => $request->get('MAIN_MENU_BG')]);
            Setting::updateOrCreate(['name' => 'MAIN_MENU_ul_li_color'], ['value' => $request->get('MAIN_MENU_ul_li_color')]);
                        
            notify()->success("Successfully updated", "Success");
            return back();
        }
        elseif ($request->type == 5) {
            // Email configuration
            Setting::updateOrCreate(['name' => 'mail_config'], ['value' => $request->get('mail_config')]);
            Setting::updateOrCreate(['name' => 'MAIL_DRIVER'], ['value' => $request->get('MAIL_DRIVER')]);
            Setting::updateOrCreate(['name' => 'MAIL_HOST'], ['value' => $request->get('MAIL_HOST')]);
            Setting::updateOrCreate(['name' => 'MAIL_PORT'], ['value' => $request->get('MAIL_PORT')]);
            Setting::updateOrCreate(['name' => 'MAIL_USERNAME'], ['value' => $request->get('MAIL_USERNAME')]);
            Setting::updateOrCreate(['name' => 'MAIL_PASSWORD'], ['value' => $request->get('MAIL_PASSWORD')]);
            Setting::updateOrCreate(['name' => 'MAIL_ENCRYPTION'], ['value' => $request->get('MAIL_ENCRYPTION')]);
            Setting::updateOrCreate(['name' => 'MAIL_FROM_ADDRESS'], ['value' => $request->get('MAIL_FROM_ADDRESS')]);
            Setting::updateOrCreate(['name' => 'MAIL_FROM_NAME'], ['value' => $request->get('MAIL_FROM_NAME')]);

            notify()->success("E-mail configuration successfully updated", "Success");
            return back();
        }
        elseif ($request->type == 6) {
            Setting::updateOrCreate(['name' => 'SMS_API_URL'], ['value' => $request->get('SMS_API_URL')]);
            Setting::updateOrCreate(['name' => 'SMS_API_KEY'], ['value' => $request->get('SMS_API_KEY')]);
            Setting::updateOrCreate(['name' => 'SMS_API_SENDER_ID'], ['value' => $request->get('SMS_API_SENDER_ID')]);
            notify()->success("SMS configuration successfully updated", "Success");
            return back();
        }
        elseif ($request->type == 7) {
            Setting::updateOrCreate(['name' => 'regVerify'], ['value' => $request->get('regVerify')]);
            Setting::updateOrCreate(['name' => 'recovrAC'], ['value' => $request->get('recovrAC')]);
            notify()->success("SMS configuration successfully updated", "Success");
            return back();
        }
        elseif ($request->type == 8) {

            Setting::updateOrCreate(['name' => 'SITE_INFO_ADDRESS'], ['value' => $request->get('SITE_INFO_ADDRESS')]);
            Setting::updateOrCreate(['name' => 'SITE_INFO_PHONE'], ['value' => $request->get('SITE_INFO_PHONE')]);
            Setting::updateOrCreate(['name' => 'SITE_INFO_SUPPORT_MAIL'], ['value' => $request->get('SITE_INFO_SUPPORT_MAIL')]);

            Setting::updateOrCreate(['name' => 'footer_description'], ['value' => $request->get('footer_description')]);
            Setting::updateOrCreate(['name' => 'copy_right_text'], ['value' => $request->get('copy_right_text')]);

            Setting::updateOrCreate(['name' => 'email'], ['value' => $request->get('email')]);
            Setting::updateOrCreate(['name' => 'whatsapp'], ['value' => $request->get('whatsapp')]);
            Setting::updateOrCreate(['name' => 'facebook'], ['value' => $request->get('facebook')]);
            Setting::updateOrCreate(['name' => 'messanger'], ['value' => $request->get('messanger')]);
            Setting::updateOrCreate(['name' => 'linkedin'], ['value' => $request->get('linkedin')]);
            Setting::updateOrCreate(['name' => 'twitter'], ['value' => $request->get('twitter')]);
            Setting::updateOrCreate(['name' => 'youtube'], ['value' => $request->get('youtube')]);
            Setting::updateOrCreate(['name' => 'instagram'], ['value' => $request->get('instagram')]);

            notify()->success("SMS configuration successfully updated", "Success");
            return back();
        }
        elseif ($request->type == 9) {
            // GLOBAL
                Setting::updateOrCreate(['name' => 'TOP_HEADER_STYLE'], ['value' => $request->get('TOP_HEADER_STYLE')]);
                Setting::updateOrCreate(['name' => 'STYLE_3_TOP_MENU'], ['value' => $request->get('STYLE_3_TOP_MENU')]);
                Setting::updateOrCreate(['name' => 'STYLE_3_TOP_MENU_BG_COLOR'], ['value' => $request->get('STYLE_3_TOP_MENU_BG_COLOR')]);
                Setting::updateOrCreate(['name' => 'STYLE_3_TOP_MENU_LINK_COLOR'], ['value' => $request->get('STYLE_3_TOP_MENU_LINK_COLOR')]);
                Setting::updateOrCreate(['name' => 'STYLE_3_TOP_MENU_LINK_HOVER_COLOR'], ['value' => $request->get('STYLE_3_TOP_MENU_LINK_HOVER_COLOR')]);
                Setting::updateOrCreate(['name' => 'STYLE_3_HEADER_SEARCH_INPUT_BAR_WIDHT'], ['value' => $request->get('STYLE_3_HEADER_SEARCH_INPUT_BAR_WIDHT')]);
                Setting::updateOrCreate(['name' => 'MAIN_MENU_STYLE'], ['value' => $request->get('MAIN_MENU_STYLE')]);

                // Place Holder Text
                    Setting::updateOrCreate(['name' => 'placeholder_one'], ['value' => $request->get('placeholder_one')]);
                    Setting::updateOrCreate(['name' => 'placeholder_two'], ['value' => $request->get('placeholder_two')]);
                    Setting::updateOrCreate(['name' => 'placeholder_three'], ['value' => $request->get('placeholder_three')]);
                    Setting::updateOrCreate(['name' => 'placeholder_four'], ['value' => $request->get('placeholder_four')]);
    

            // COMPONENTS
                Setting::updateOrCreate(['name' => 'SLIDER_LAYOUT_STATUS'], ['value' => $request->get('SLIDER_LAYOUT_STATUS')]);
                Setting::updateOrCreate(['name' => 'SLIDER_LAYOUT'], ['value' => $request->get('SLIDER_LAYOUT')]);
                Setting::updateOrCreate(['name' => 'HERO_SLIDER_1'], ['value' => $request->get('HERO_SLIDER_1')]);
                Setting::updateOrCreate(['name' => 'HERO_SLIDER_1_TEXT'], ['value' => $request->get('HERO_SLIDER_1_TEXT')]);
                Setting::updateOrCreate(['name' => 'HERO_SLIDER_2'], ['value' => $request->get('HERO_SLIDER_2')]);
                Setting::updateOrCreate(['name' => 'FLOAT_LIVE_CHAT'], ['value' => $request->get('FLOAT_LIVE_CHAT')]);
                
                
            // HOME PAGE
                Setting::updateOrCreate(['name' => 'TOP_CAT_STATUS'], ['value' => $request->get('TOP_CAT_STATUS')]);
                Setting::updateOrCreate(['name' => 'TOP_CAT'], ['value' => $request->get('TOP_CAT')]);
                
                Setting::updateOrCreate(['name' => 'SELLER_STATUS'], ['value' => $request->get('SELLER_STATUS')]);
                Setting::updateOrCreate(['name' => 'LATEST_PRODUCT_STATUS'], ['value' => $request->get('LATEST_PRODUCT_STATUS')]);
                Setting::updateOrCreate(['name' => 'FEATURE_PRODUCT_STATUS'], ['value' => $request->get('FEATURE_PRODUCT_STATUS')]);
                
                Setting::updateOrCreate(['name' => 'CLASSIFIED_SELL_STATUS'], ['value' => $request->get('CLASSIFIED_SELL_STATUS')]);
                Setting::updateOrCreate(['name' => 'MEGA_CAT_PRODUCT_STATUS'], ['value' => $request->get('MEGA_CAT_PRODUCT_STATUS')]);
                Setting::updateOrCreate(['name' => 'SUB_CAT_PRODUCT_STATUS'], ['value' => $request->get('SUB_CAT_PRODUCT_STATUS')]);
                Setting::updateOrCreate(['name' => 'MINI_CAT_PRODUCT_STATUS'], ['value' => $request->get('MINI_CAT_PRODUCT_STATUS')]);
                Setting::updateOrCreate(['name' => 'EXTRA_CAT_PRODUCT_STATUS'], ['value' => $request->get('EXTRA_CAT_PRODUCT_STATUS')]);
                Setting::updateOrCreate(['name' => 'BRAND_STATUS'], ['value' => $request->get('BRAND_STATUS')]);
                Setting::updateOrCreate(['name' => 'CATEGORY_SMALL_SUMMERY'], ['value' => $request->get('CATEGORY_SMALL_SUMMERY')]);
                Setting::updateOrCreate(['name' => 'NEWS_LETTER_STATUS'], ['value' => $request->get('NEWS_LETTER_STATUS')]);
                
            notify()->success("Layout successfully updated", "Success");
            return back();
        }
        elseif ($request->type == 10) {
            // Shop Setting
            Setting::updateOrCreate(['name' => 'GUEST_CHECKOUT'], ['value' => $request->get('GUEST_CHECKOUT')]);
            Setting::updateOrCreate(['name' => 'CHECKOUT_TYPE'], ['value' => $request->get('CHECKOUT_TYPE')]);

            Setting::updateOrCreate(['name' => 'min_rec'], ['value' => $request->get('min_rec')]);
            Setting::updateOrCreate(['name' => 'min_with'], ['value' => $request->get('min_with')]);

            Setting::updateOrCreate(['name' => 'COUNTRY_SERVE'], ['value' => $request->get('COUNTRY_SERVE')]);
            Setting::updateOrCreate(['name' => 'shipping_range_inside'], ['value' => $request->get('shipping_range_inside')]);
            Setting::updateOrCreate(['name' => 'CURRENCY_CODE'], ['value' => $request->get('CURRENCY_CODE')]);
            Setting::updateOrCreate(['name' => 'CURRENCY_CODE_MIN'], ['value' => $request->get('CURRENCY_CODE_MIN')]);
            Setting::updateOrCreate(['name' => 'CURRENCY_ICON'], ['value' => $request->get('CURRENCY_ICON')]);

            Setting::updateOrCreate(['name' => 'shop_commission'], ['value' => $request->get('shop_commission')]);
            Setting::updateOrCreate(['name' => 'is_point'], ['value' => $request->get('is_point')]);
            Setting::updateOrCreate(['name' => 'Point_rate'], ['value' => $request->get('Point_rate')]);
            Setting::updateOrCreate(['name' => 'Default_Point'], ['value' => $request->get('Default_Point')]);

            Setting::updateOrCreate(['name' => 'phone_min_dgt'], ['value' => $request->get('phone_min_dgt')]);
            Setting::updateOrCreate(['name' => 'phone_max_dgt'], ['value' => $request->get('phone_max_dgt')]);




            notify()->success("Shop settings successfully updated", "Success");
            return back();
        }
        elseif ($request->type == 11) {
            Setting::updateOrCreate(['name' => 'NOTICE_STATUS'], ['value' => $request->get('NOTICE_STATUS')]);
            Setting::updateOrCreate(['name' => 'CUSTOM_NOTICE'], ['value' => $request->get('CUSTOM_NOTICE')]);

            Setting::updateOrCreate(['name' => 'BELOW_SLIDER_HTML_CODE_STATUS'], ['value' => $request->get('BELOW_SLIDER_HTML_CODE_STATUS')]);
            Setting::updateOrCreate(['name' => 'BELOW_SLIDER_HTML_CODE'], ['value' => $request->get('BELOW_SLIDER_HTML_CODE')]);
            
            
            notify()->success("Notice successfully updated", "Success");
            return back();
        }
        elseif ($request->type == 12) {
            Setting::updateOrCreate(['name' => 'STEEDFAST_STATUS'], ['value' => $request->get('STEEDFAST_STATUS')]);
            Setting::updateOrCreate(['name' => 'STEEDFAST_API_KEY'], ['value' => $request->get('STEEDFAST_API_KEY')]);
            Setting::updateOrCreate(['name' => 'STEEDFAST_API_SECRET_KEY'], ['value' => $request->get('STEEDFAST_API_SECRET_KEY')]);

            notify()->success("Steedfast api successfully updated", "Success");
            return back();
        }
        elseif ($request->type == 13) {
            Setting::updateOrCreate(['name' => 'site_title'], ['value' => $request->get('site_title')]);
            Setting::updateOrCreate(['name' => 'meta_description'], ['value' => $request->get('meta_description')]);
            Setting::updateOrCreate(['name' => 'meta_keywords'], ['value' => $request->get('meta_keywords')]);
            
            notify()->success("Steedfast api successfully updated", "Success");
            return back();
        }
        else{
            notify()->error("Update type not mathing, check form hidden input with type number, change the controller", "Error");
            return back();
        }

    }


    public function noticeIndex(){
        $get_NOTICE_STATUS = Setting::where('name', 'NOTICE_STATUS')->first();
        $NOTICE_STATUS = (!$get_NOTICE_STATUS) ? (object)['value' => 0 ] : $get_NOTICE_STATUS;

        $get_CUSTOM_NOTICE = Setting::where('name', 'CUSTOM_NOTICE')->first();
        $CUSTOM_NOTICE = (!$get_CUSTOM_NOTICE) ? (object)['value' => 'Today running best offer' ] : $get_CUSTOM_NOTICE;

        $get_BELOW_SLIDER_HTML_CODE_STATUS = Setting::where('name', 'BELOW_SLIDER_HTML_CODE_STATUS')->first();
        $BELOW_SLIDER_HTML_CODE_STATUS = (!$get_BELOW_SLIDER_HTML_CODE_STATUS) ? (object)['value' => 0] : $get_BELOW_SLIDER_HTML_CODE_STATUS;

        $get_BELOW_SLIDER_HTML_CODE = Setting::where('name', 'BELOW_SLIDER_HTML_CODE')->first();
        $BELOW_SLIDER_HTML_CODE = (!$get_BELOW_SLIDER_HTML_CODE) ? (object)['value' => '<b>Hello</b>' ] : $get_BELOW_SLIDER_HTML_CODE;



        
    
        return view('admin.e-commerce.noticeIndex', compact(
            'NOTICE_STATUS',
            'CUSTOM_NOTICE',
            'BELOW_SLIDER_HTML_CODE_STATUS',
            'BELOW_SLIDER_HTML_CODE'
        ));
    }


    public function shop_infoIndex(){
        $get_SITE_INFO_ADDRESS = Setting::where('name', 'SITE_INFO_ADDRESS')->first();
        $SITE_INFO_ADDRESS = (!$get_SITE_INFO_ADDRESS) ? (object)['value' => 'Dhaka, Bangladesh' ] : $get_SITE_INFO_ADDRESS;

        $get_SITE_INFO_PHONE = Setting::where('name', 'SITE_INFO_PHONE')->first();
        $SITE_INFO_PHONE = (!$get_SITE_INFO_PHONE) ? (object)['value' => '+8801721600688' ] : $get_SITE_INFO_PHONE;

        $get_SITE_INFO_SUPPORT_MAIL = Setting::where('name', 'SITE_INFO_SUPPORT_MAIL')->first();
        $SITE_INFO_SUPPORT_MAIL = (!$get_SITE_INFO_SUPPORT_MAIL) ? (object)['value' => 'hello@asifulmamun.info.bd' ] : $get_SITE_INFO_SUPPORT_MAIL;


        return view('admin.e-commerce.setting.shop_infoIndex', compact(
            'SITE_INFO_ADDRESS',
            'SITE_INFO_PHONE',
            'SITE_INFO_SUPPORT_MAIL',
        
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


    public function shopSettingsIndex(){
        $get_GUEST_CHECKOUT = Setting::where('name', 'GUEST_CHECKOUT')->first();
        $GUEST_CHECKOUT = (!$get_GUEST_CHECKOUT) ? (object)['value' => '1'] : $get_GUEST_CHECKOUT;


        return view('admin.e-commerce.setting.shopSettingsIndex', compact(
            'GUEST_CHECKOUT',
        ));
    }

    public function layoutIndex(){

        // GLOBAL
            $get_TOP_HEADER_STYLE = Setting::where('name', 'TOP_HEADER_STYLE')->first();
            $TOP_HEADER_STYLE = (!$get_TOP_HEADER_STYLE) ? (object)['value' => '1'] : $get_TOP_HEADER_STYLE;

            $get_STYLE_3_TOP_MENU = Setting::where('name', 'STYLE_3_TOP_MENU')->first();
            $STYLE_3_TOP_MENU = (!$get_STYLE_3_TOP_MENU) ? (object)['value' => ''] : $get_STYLE_3_TOP_MENU;

            $get_STYLE_3_TOP_MENU_BG_COLOR = Setting::where('name', 'STYLE_3_TOP_MENU_BG_COLOR')->first();
            $STYLE_3_TOP_MENU_BG_COLOR = (!$get_STYLE_3_TOP_MENU_BG_COLOR) ? (object)['value' => ''] : $get_STYLE_3_TOP_MENU_BG_COLOR;

            $get_STYLE_3_TOP_MENU_LINK_COLOR = Setting::where('name', 'STYLE_3_TOP_MENU_LINK_COLOR')->first();
            $STYLE_3_TOP_MENU_LINK_COLOR = (!$get_STYLE_3_TOP_MENU_LINK_COLOR) ? (object)['value' => ''] : $get_STYLE_3_TOP_MENU_LINK_COLOR;

            $get_STYLE_3_TOP_MENU_LINK_HOVER_COLOR = Setting::where('name', 'STYLE_3_TOP_MENU_LINK_HOVER_COLOR')->first();
            $STYLE_3_TOP_MENU_LINK_HOVER_COLOR = (!$get_STYLE_3_TOP_MENU_LINK_HOVER_COLOR) ? (object)['value' => ''] : $get_STYLE_3_TOP_MENU_LINK_HOVER_COLOR;
            
            $get_MAIN_MENU_STYLE = Setting::where('name', 'MAIN_MENU_STYLE')->first();
            $MAIN_MENU_STYLE = (!$get_MAIN_MENU_STYLE) ? (object)['value' => '1'] : $get_MAIN_MENU_STYLE;

        // COMPONENTS
            $get_SLIDER_LAYOUT_STATUS = Setting::where('name', 'SLIDER_LAYOUT_STATUS')->first();
            $SLIDER_LAYOUT_STATUS = (!$get_SLIDER_LAYOUT_STATUS) ? (object)['value' => '1'] : $get_SLIDER_LAYOUT_STATUS;
        
            $get_SLIDER_LAYOUT = Setting::where('name', 'SLIDER_LAYOUT')->first();
            $SLIDER_LAYOUT = (!$get_SLIDER_LAYOUT) ? (object)['value' => '1'] : $get_SLIDER_LAYOUT;

            $get_HERO_SLIDER_1 = Setting::where('name', 'HERO_SLIDER_1')->first();
            $HERO_SLIDER_1 = (!$get_HERO_SLIDER_1) ? (object)['value' => '1'] : $get_HERO_SLIDER_1;

            $get_HERO_SLIDER_2 = Setting::where('name', 'HERO_SLIDER_2')->first();
            $HERO_SLIDER_2 = (!$get_HERO_SLIDER_2) ? (object)['value' => '1'] : $get_HERO_SLIDER_2;

            $get_FLOAT_LIVE_CHAT = Setting::where('name', 'FLOAT_LIVE_CHAT')->first();
            $FLOAT_LIVE_CHAT = (!$get_FLOAT_LIVE_CHAT) ? (object)['value' => '0'] : $get_FLOAT_LIVE_CHAT;


        // HOME PAGE
            $get_TOP_CAT_STATUS = Setting::where('name', 'TOP_CAT_STATUS')->first();
            $TOP_CAT_STATUS = (!$get_TOP_CAT_STATUS) ? (object)['value' => '1'] : $get_TOP_CAT_STATUS;

            $get_SELLER_STATUS = Setting::where('name', 'SELLER_STATUS')->first();
            $SELLER_STATUS = (!$get_SELLER_STATUS) ? (object)['value' => '1'] : $get_SELLER_STATUS;

            $get_LATEST_PRODUCT_STATUS = Setting::where('name', 'LATEST_PRODUCT_STATUS')->first();
            $LATEST_PRODUCT_STATUS = (!$get_LATEST_PRODUCT_STATUS) ? (object)['value' => '1'] : $get_LATEST_PRODUCT_STATUS;

            $get_FEATURE_PRODUCT_STATUS = Setting::where('name', 'FEATURE_PRODUCT_STATUS')->first();
            $FEATURE_PRODUCT_STATUS = (!$get_FEATURE_PRODUCT_STATUS) ? (object)['value' => '1'] : $get_FEATURE_PRODUCT_STATUS;

            $get_CLASSIFIED_SELL_STATUS = Setting::where('name', 'CLASSIFIED_SELL_STATUS')->first();
            $CLASSIFIED_SELL_STATUS = (!$get_CLASSIFIED_SELL_STATUS) ? (object)['value' => '1'] : $get_CLASSIFIED_SELL_STATUS;

            $get_MEGA_CAT_PRODUCT_STATUS = Setting::where('name', 'MEGA_CAT_PRODUCT_STATUS')->first();
            $MEGA_CAT_PRODUCT_STATUS = (!$get_MEGA_CAT_PRODUCT_STATUS) ? (object)['value' => '1'] : $get_MEGA_CAT_PRODUCT_STATUS;

            $get_SUB_CAT_PRODUCT_STATUS = Setting::where('name', 'SUB_CAT_PRODUCT_STATUS')->first();
            $SUB_CAT_PRODUCT_STATUS = (!$get_SUB_CAT_PRODUCT_STATUS) ? (object)['value' => '1'] : $get_SUB_CAT_PRODUCT_STATUS;

            $get_MINI_CAT_PRODUCT_STATUS = Setting::where('name', 'MINI_CAT_PRODUCT_STATUS')->first();
            $MINI_CAT_PRODUCT_STATUS = (!$get_MINI_CAT_PRODUCT_STATUS) ? (object)['value' => '1'] : $get_MINI_CAT_PRODUCT_STATUS;

            $get_EXTRA_CAT_PRODUCT_STATUS = Setting::where('name', 'EXTRA_CAT_PRODUCT_STATUS')->first();
            $EXTRA_CAT_PRODUCT_STATUS = (!$get_EXTRA_CAT_PRODUCT_STATUS) ? (object)['value' => '1'] : $get_EXTRA_CAT_PRODUCT_STATUS;

            $get_BRAND_STATUS = Setting::where('name', 'BRAND_STATUS')->first();
            $BRAND_STATUS = (!$get_BRAND_STATUS) ? (object)['value' => '1'] : $get_BRAND_STATUS;

            $get_CATEGORY_SMALL_SUMMERY = Setting::where('name', 'CATEGORY_SMALL_SUMMERY')->first();
            $CATEGORY_SMALL_SUMMERY = (!$get_CATEGORY_SMALL_SUMMERY) ? (object)['value' => '1'] : $get_CATEGORY_SMALL_SUMMERY;

            $get_NEWS_LETTER_STATUS = Setting::where('name', 'NEWS_LETTER_STATUS')->first();
            $NEWS_LETTER_STATUS = (!$get_NEWS_LETTER_STATUS) ? (object)['value' => '1'] : $get_NEWS_LETTER_STATUS;


        return view('admin.e-commerce.setting.layoutIndex', compact(
            'SLIDER_LAYOUT_STATUS',
            'TOP_HEADER_STYLE',
            'STYLE_3_TOP_MENU',
            'STYLE_3_TOP_MENU_BG_COLOR',
            'STYLE_3_TOP_MENU_LINK_COLOR',
            'STYLE_3_TOP_MENU_LINK_HOVER_COLOR',
            'MAIN_MENU_STYLE',
            'SLIDER_LAYOUT',
            'TOP_CAT_STATUS',
            'SELLER_STATUS',
            'LATEST_PRODUCT_STATUS',
            'FEATURE_PRODUCT_STATUS',
            'HERO_SLIDER_1',
            'HERO_SLIDER_2',
            'FLOAT_LIVE_CHAT',
            'CLASSIFIED_SELL_STATUS',
            'MEGA_CAT_PRODUCT_STATUS',
            'SUB_CAT_PRODUCT_STATUS',
            'MINI_CAT_PRODUCT_STATUS',
            'EXTRA_CAT_PRODUCT_STATUS',
            'BRAND_STATUS',
            'CATEGORY_SMALL_SUMMERY',
            'NEWS_LETTER_STATUS',
        ));
    }



    public function colorIndex(){

        $get_PRIMARY_COLOR = Setting::where('name', 'PRIMARY_COLOR')->first();
        $PRIMARY_COLOR = (!$get_PRIMARY_COLOR) ? (object)['value' => '#108b3a'] : $get_PRIMARY_COLOR;

        $get_PRIMARY_BG_TEXT_COLOR = Setting::where('name', 'PRIMARY_BG_TEXT_COLOR')->first();
        $PRIMARY_BG_TEXT_COLOR = (!$get_PRIMARY_BG_TEXT_COLOR) ? (object)['value' => '#ffffff'] : $get_PRIMARY_BG_TEXT_COLOR;

        $get_SECONDARY_COLOR = Setting::where('name', 'SECONDARY_COLOR')->first();
        $SECONDARY_COLOR = (!$get_SECONDARY_COLOR) ? (object)['value' => '#000'] : $get_SECONDARY_COLOR;

        $get_OPTIONAL_COLOR = Setting::where('name', 'OPTIONAL_COLOR')->first();
        $OPTIONAL_COLOR = (!$get_OPTIONAL_COLOR) ? (object)['value' => '#00aa3a'] : $get_OPTIONAL_COLOR;

        $get_OPTIONAL_BG_TEXT_COLOR = Setting::where('name', 'OPTIONAL_BG_TEXT_COLOR')->first();
        $OPTIONAL_BG_TEXT_COLOR = (!$get_OPTIONAL_BG_TEXT_COLOR) ? (object)['value' => '#ffffff'] : $get_OPTIONAL_BG_TEXT_COLOR;
        
        $get_MAIN_MENU_BG = Setting::where('name', 'MAIN_MENU_BG')->first();
        $MAIN_MENU_BG = (!$get_MAIN_MENU_BG) ? (object)['value' => $PRIMARY_COLOR->value] : $get_MAIN_MENU_BG;
        
        $get_MAIN_MENU_ul_li_color = Setting::where('name', 'MAIN_MENU_ul_li_color')->first();
        $MAIN_MENU_ul_li_color = (!$get_MAIN_MENU_ul_li_color) ? (object)['value' => $PRIMARY_BG_TEXT_COLOR->value] : $get_MAIN_MENU_ul_li_color;
        


        return view('admin.e-commerce.setting.colorIndex', compact(
            'PRIMARY_COLOR', 
            'PRIMARY_BG_TEXT_COLOR',
            'SECONDARY_COLOR',
            'OPTIONAL_COLOR',
            'OPTIONAL_BG_TEXT_COLOR',
            'MAIN_MENU_BG',
            'MAIN_MENU_ul_li_color',
        ));

        // echo $PRIMARY_BG_TEXT_COLOR;
    }



    public function courierIndex(){

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

        return view('admin.e-commerce.setting.courierIndex', compact('header_code', 'fb_pixel'));
    }


    public function seoIndex(){

        return view('admin.e-commerce.setting.seoIndex');
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

    public function mailsmsapireglogIndex(){

        // Registration Verify with
        $get_regVerify = Setting::where('name', 'regVerify')->first();
        $regVerify = (!$get_regVerify) ? (object)['value' => 'email' ] : $get_regVerify;

        // Registration Verify with
        $get_recovrAC = Setting::where('name', 'recovrAC')->first();
        $recovrAC = (!$get_recovrAC) ? (object)['value' => 'emailsms' ] : $get_recovrAC;

        // Email Configuration
        $get_mail_config = Setting::where('name', 'mail_config')->first();
        $mail_config = (!$get_mail_config) ? (object)['value' => 0] : $get_mail_config;
        $get_MAIL_HOST = Setting::where('name', 'MAIL_HOST')->first();
        $MAIL_HOST = (!$get_MAIL_HOST) ? (object)['value' => 'mail.' . $_SERVER['SERVER_NAME']] : $get_MAIL_HOST;
        $get_MAIL_PORT = Setting::where('name', 'MAIL_PORT')->first();
        $MAIL_PORT = (!$get_MAIL_PORT) ? (object)['value' => '465'] : $get_MAIL_PORT;
        $get_MAIL_USERNAME = Setting::where('name', 'MAIL_USERNAME')->first();
        $MAIL_USERNAME = (!$get_MAIL_USERNAME) ? (object)['value' => 'no-reply@' . $_SERVER['SERVER_NAME']] : $get_MAIL_USERNAME;
        $get_MAIL_PASSWORD = Setting::where('name', 'MAIL_PASSWORD')->first();
        $MAIL_PASSWORD = (!$get_MAIL_PASSWORD) ? (object)['value' => '@Finva2024'] : $get_MAIL_PASSWORD;
        $get_MAIL_ENCRYPTION = Setting::where('name', 'MAIL_ENCRYPTION')->first();
        $MAIL_ENCRYPTION = (!$get_MAIL_ENCRYPTION) ? (object)['value' => 'tls'] : $get_MAIL_ENCRYPTION;
        $get_MAIL_FROM_ADDRESS = Setting::where('name', 'MAIL_FROM_ADDRESS')->first();
        $MAIL_FROM_ADDRESS = (!$get_MAIL_FROM_ADDRESS) ? (object)['value' => 'no-reply@' . $_SERVER['SERVER_NAME']] : $get_MAIL_FROM_ADDRESS;
        $get_MAIL_FROM_NAME = Setting::where('name', 'MAIL_FROM_NAME')->first();
        $MAIL_FROM_NAME = (!$get_MAIL_FROM_NAME) ? (object)['value' => env('APP_NAME') ] : $get_MAIL_FROM_NAME;

        // SMS Configuratoin
        $get_SMS_API_URL = Setting::where('name', 'SMS_API_URL')->first();
        $SMS_API_URL = (!$get_SMS_API_URL) ? (object)['value' => 'www.asifulmamun.info.bd' ] : $get_SMS_API_URL;
        $get_SMS_API_KEY = Setting::where('name', 'SMS_API_KEY')->first();
        $SMS_API_KEY = (!$get_SMS_API_KEY) ? (object)['value' => 'sms api key' ] : $get_SMS_API_KEY;
        $get_SMS_API_SENDER_ID = Setting::where('name', 'SMS_API_SENDER_ID')->first();
        $SMS_API_SENDER_ID = (!$get_SMS_API_SENDER_ID) ? (object)['value' => '8801721600688' ] : $get_SMS_API_SENDER_ID;


        return view('admin.e-commerce.setting.mailsmsapireglogIndex', compact(

            'regVerify',
            'recovrAC',
            
            'mail_config',
            'MAIL_HOST',
            'MAIL_PORT',
            'MAIL_USERNAME',
            'MAIL_PASSWORD',
            'MAIL_ENCRYPTION',
            'MAIL_FROM_ADDRESS',
            'MAIL_FROM_NAME',

            'SMS_API_URL',
            'SMS_API_KEY',
            'SMS_API_SENDER_ID',
        ));
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


        // Information
        Setting::updateOrCreate(['name' => 'bkash'], ['value' => $request->get('bkash')]);
        Setting::updateOrCreate(['name' => 'nagad'], ['value' => $request->get('nagad')]);
        Setting::updateOrCreate(['name' => 'rocket'], ['value' => $request->get('rocket')]);

        Setting::updateOrCreate(['name' => 'bank_name'], ['value' => $request->get('bank_name')]);
        Setting::updateOrCreate(['name' => 'bank_account'], ['value' => $request->get('bank_account')]);
        Setting::updateOrCreate(['name' => 'branch_name'], ['value' => $request->get('branch_name')]);
        Setting::updateOrCreate(['name' => 'holder_name'], ['value' => $request->get('holder_name')]);
        Setting::updateOrCreate(['name' => 'routing'], ['value' => $request->get('routing')]);

        // Shipping
        Setting::updateOrCreate(['name' => 'shipping_free_above'], ['value' => $request->get('shipping_free_above')]);
        Setting::updateOrCreate(['name' => 'shipping_range_inside'], ['value' => $request->get('shipping_range_inside')]);
        Setting::updateOrCreate(['name' => 'shipping_charge'], ['value' => $request->get('shipping_charge')]);
        Setting::updateOrCreate(['name' => 'shipping_charge_out_of_range'], ['value' => $request->get('shipping_charge_out_of_range')]);

        // Activatoin/Deactivation
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
