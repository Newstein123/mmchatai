<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory(100)->create();

        Customer::create([
            'name' => 'newstein',
            'email' => 'minthetpaing@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'login_type' => 'manual',
        ]);
    }
}
