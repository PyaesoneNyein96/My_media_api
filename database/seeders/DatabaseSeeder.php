<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        User::create([
            'name' => 'psn',
            'email' =>'psn@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password'=>Hash::make('admin123'),
            'address' => 'taungoo',
            'phone' => '123',
            'gender' => 'male',
            'bio' => 'developer'
        ]);

        User::factory(10)->create();
    }
}