<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'name' => 'Min Thet Paing',
            'email' => 'minthetpaing376@gmail.com',
            'password' => Hash::make('painglay123'),
            'email_verified_at' => now(),
            'status' => 0,
        ]);
        Customer::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user1234'),
            'email_verified_at' => now(),
            'status' => 0,
        ]);
    }
}
