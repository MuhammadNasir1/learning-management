<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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

        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'superAdmin',
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'Parent',
            'email' => 'parent@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'parent',
        ]);
        DB::table('users')->insert([
            'name' => 'Teacher',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'teacher',
        ]);
    }
}
