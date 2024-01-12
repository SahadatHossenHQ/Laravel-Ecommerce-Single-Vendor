<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::updateOrCreate(['name' => 'Admin', 'slug' => 'admin']);
        User::updateOrCreate([
            'role_id' => $admin->id,
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '01749699156',
            'is_approved' => true,
            'joining_date' => date('Y-m-d'),
            'joining_month' => date('F'),
            'joining_year' => date('Y'),
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10)
        ]);
        
        $vendor = Role::updateOrCreate(['name' => 'Vendor', 'slug' => 'vendor']);
        User::updateOrCreate([
            'role_id' => $vendor->id,
            'name' => 'Vendor',
            'username' => 'vendor',
            'email' => 'vendor@gmail.com',
            'phone' => '01303851066',
            'is_approved' => true,
            'joining_date' => date('Y-m-d'),
            'joining_month' => date('F'),
            'joining_year' => date('Y'),
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10)
        ]);

        $customer = Role::updateOrCreate(['name' => 'Customer', 'slug' => 'customer']);
        User::updateOrCreate([
            'role_id' => $customer->id,
            'name' => 'Customer',
            'referer_id' => rand(pow(10, 5-1), pow(10, 5)-1),
            'username' => 'customer',
            'email' => 'customer@gmail.com',
            'phone' => '01303851066',
            'is_approved' => true,
            'joining_date' => date('Y-m-d'),
            'joining_month' => date('F'),
            'joining_year' => date('Y'),
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10)
        ]);
    }
}
