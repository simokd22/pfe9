<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        if (User::count() == 0) {
           
            User::create([
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       =>  Hash::make('admin1234'),
                'remember_token' => Str::random(60),
                'role_id'=>1,
            ]);
            User::create([
                'name'           => 'User',
                'email'          => 'user@user.com',
                'password'       =>  Hash::make('user1234'),
                'remember_token' => Str::random(60),
            ]);
        }
    }
}
