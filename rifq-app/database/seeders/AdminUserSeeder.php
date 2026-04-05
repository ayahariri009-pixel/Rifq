<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('role_name', 'Admin')->first();

        if (!$adminRole) {
            $this->command->error('Admin role not found! Please run RoleSeeder first.');
            return;
        }

        User::create([
            'role_id' => $adminRole->id,
            'organization_id' => null,
            'first_name' => 'System',
            'last_name' => 'Admin',
            'gender' => 'Male',
            'national_id' => '1234567890',
            'birth_date' => '1990-01-01',
            'email' => 'admin@rifq.com',
            'password' => Hash::make('admin123'),
            'phone_number' => '+966500000000',
            'email_verified_at' => now(),
        ]);

        $this->command->info('Admin user created successfully!');
        $this->command->info('Email: admin@rifq.com');
        $this->command->info('Password: admin123');
    }
}
