<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sponsor_id' => 0,
            'placement_id' => 0,
            'direction' => 0,
            'name' => 'Admin',
            'referer_id' => 0,
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '01749699156',
            'is_admin' => true,
            'is_approved' => true,
            'joining_date' => date('Y-m-d'),
            'joining_month' => date('F'),
            'joining_year' => date('Y'),
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
