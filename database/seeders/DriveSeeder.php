<?php

namespace Database\Seeders;

use App\Models\Drive;
use App\Models\Shift;
use Illuminate\Database\Seeder;

class DriveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $drives = Drive::factory()
            ->has(Shift::factory())
            ->count(200)
            ->create();
    }
}
