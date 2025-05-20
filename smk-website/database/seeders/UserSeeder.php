<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@smk.sch.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create content editor user
        User::create([
            'name' => 'Editor',
            'email' => 'editor@smk.sch.id',
            'password' => Hash::make('password'),
            'role' => 'editor',
        ]);

        // Create regular user
        User::create([
            'name' => 'User',
            'email' => 'user@smk.sch.id',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
