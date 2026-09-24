<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
       

        // Super Admin (email-based)
        Admin::updateOrCreate(
            ['username' => 'doctor@gmail.com'],
            [
                'fname' => 'Ansiger',
                'lname' => 'Mbuya',
                'password' => Hash::make('password123'),
                'phone' => '0712345678',
                'dob' => '1990-01-15',
                'gender' => 'Female',
                'address' => '123 Admin Street, Dar es Salaam',
                'role' => 'doctor',
            ]
        );

        // Regular Admin
        Admin::updateOrCreate(
            ['username' => 'admin@gmail.com'],
            [
                'fname' => 'Daniel',
                'lname' => 'Mathias',
                'password' => Hash::make('password123'),
                'phone' => '0712345679',
                'dob' => '1992-05-20',
                'gender' => 'male',
                'address' => '456 Admin Avenue, Arusha',
                'role' => 'admin',
            ]
        );

        
    }
}