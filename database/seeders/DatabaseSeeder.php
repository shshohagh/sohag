<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Worked
        $this->call([
                PermissionsDemoSeeder::class,
                //UserSeeder::class,
                PostSeeder::class,
                //BookSeeder::class,
                //ReviewSeeder::class,
            ]);

        // Not Worked
        // \App\Models\User::factory()->count(50)->hasBooks(1)->create();

    }
}
