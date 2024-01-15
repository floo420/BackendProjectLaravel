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
            'birthdate' => '1990-01-01', 
            'about_me' => 'I am the admin user.', 
            'avatar' => 'avatars/Jeff.jpg',            
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
