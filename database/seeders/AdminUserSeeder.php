<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'phone' => '123456789',
            'is_admin' => true,
            // Add other fields as needed (birthdate, about_me, avatar, etc.)
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
