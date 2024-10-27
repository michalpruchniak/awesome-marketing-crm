<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Activities\Database\Seeders\ActivityTypeTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserTableSeeder::class,
            ActivityTypeTableSeeder::class,
        ]);
    }
}
