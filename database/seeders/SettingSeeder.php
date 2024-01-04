<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::updateOrCreate(['name' => 'shipping_charge'], ['value' => '100']);
        Setting::updateOrCreate(['name' => 'shop_commission'], ['value' => '10']);
        Setting::updateOrCreate(['name' => 'shipping_charge_out_of_range'], ['value' => '10']);
        Setting::updateOrCreate(['name' => 'email'], ['value' => 'example@gmail.com']);
        Setting::updateOrCreate(['name' => 'bkash'], ['value' => '01452369125']);
        Setting::updateOrCreate(['name' => 'nagad'], ['value' => '01452369125']);
        Setting::updateOrCreate(['name' => 'rocket'], ['value' => '01452369125']);
        Setting::updateOrCreate(['name' => 'bank_name'], ['value' => 'Dutch Bangla Bank Ltd']);
        Setting::updateOrCreate(['name' => 'bank_account'], ['value' => '454311']);
        Setting::updateOrCreate(['name' => 'branch_name'], ['value' => 'Sylhet']);
        Setting::updateOrCreate(['name' => 'holder_name'], ['value' => 'HJ']);
        Setting::updateOrCreate(['name' => 'routing'], ['value' => 'Nothing']);
        Setting::updateOrCreate(['name' => 'copy_right_text'], ['value' => 'Copyright © 2014-2020 AdminLTE.io. All rights reserved.']);
        Setting::updateOrCreate(['name' => 'logo'], ['value' => 'default.png']);
        Setting::updateOrCreate(['name' => 'auth_logo'], ['value' => 'default.png']);
        Setting::updateOrCreate(['name' => 'favicon'], ['value' => 'default.png']);
        Setting::updateOrCreate(['name' => 'facebook'], ['value' => 'facebook']);
        Setting::updateOrCreate(['name' => 'whatsapp'], ['value' => 'whatsapp']);
        Setting::updateOrCreate(['name' => 'twitter'], ['value' => 'twitter']);
        Setting::updateOrCreate(['name' => 'skype'], ['value' => 'skype']);
        Setting::updateOrCreate(['footer_description' => 'favicon'], ['value' => 'Hello World']);
        Setting::updateOrCreate(['name' => 'fb_pixel'], ['value' => 'Hello World']);

        Setting::updateOrCreate(['name' => 'fci'], ['value' => 'demo']);
        Setting::updateOrCreate(['name' => 'fcs'], ['value' => 'demo']);
        Setting::updateOrCreate(['name' => 'gci'], ['value' => 'demo']);
        Setting::updateOrCreate(['name' => 'gcs'], ['value' => 'demo']);

    }
}
