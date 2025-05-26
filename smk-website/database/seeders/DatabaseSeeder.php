<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            StaffSeeder::class,
            MajorSeeder::class,
            ProgramSeeder::class,
            ProjectSeeder::class,
            ActivitySeeder::class,
            TagSeeder::class,
            PageSeeder::class,
        ]);
    }
}
