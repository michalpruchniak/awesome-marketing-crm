<?php

namespace Modules\Activities\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Activities\Models\ActivityType;

class ActivityTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ActivityType::create([
            'name' => 'Solve technical problem'
        ]);
    }
}
