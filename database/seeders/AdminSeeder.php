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
            ['username' => 'superadmin@gmail.com'],
            [
                'fname' => 'Super',
                'lname' => 'Admin',
                'password' => Hash::make('password123'),
                'phone' => '0712345678',
                'dob' => '1990-01-15',
                'gender' => 'male',
                'address' => '123 Admin Street, Dar es Salaam',
                'role' => 'super_admin',
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

        // Moderator
        Admin::updateOrCreate(
            ['username' => 'moderator@gmail.com'],
            [
                'fname' => 'Secilia',
                'lname' => 'Mathias',
                'password' => Hash::make('password123'),
                'phone' => '0712345680',
                'dob' => '1995-08-10',
                'gender' => 'female',
                'address' => '789 Moderator Road, Mwanza',
                'role' => 'moderator',
            ]
        );

        // $this->command->info('✅ Admins seeded successfully!');
        // $this->command->info('👤 superadmin / password123');
        // $this->command->info('👤 superadmin@gmail.com / password123');
        // $this->command->info('👤 admin@gmail.com / password123');
        // $this->command->info('👤 moderator@gmail.com / password123');
    }
}