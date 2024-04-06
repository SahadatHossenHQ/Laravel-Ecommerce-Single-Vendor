<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // php artisan db:seed --class=VenderSeeder

        // Ensure 'vendor' role exists
        $vendorRole = Role::updateOrCreate(['slug' => 'vendor'], ['name' => 'Vendor']);

        // Determine the starting ID for vendor users
        $startingUserId = 2; // Assuming you want the first vendor user ID to start from 3

        // Loop through creating/updating vendor users
        for ($i = $startingUserId; $i <= 31; $i++) {
            User::updateOrCreate([
                // 'role_id' => $vendorRole->id,
                'role_id' => 2,
                'name' => 'Vendor_' . $i,
                'username' => 'vendor' . $i,
                'email' => 'vendor' . $i . '@example.com',
                'phone' => '0123456789', // Example phone number
                'is_approved' => true,
                'joining_date' => now(),
                'joining_month' => now()->format('F'),
                'joining_year' => now()->year,
                'email_verified_at' => now(),
            ], [
                'password' => Hash::make('password'), // Set default password
                'remember_token' => Str::random(10)
            ]);
        }
    }
}
