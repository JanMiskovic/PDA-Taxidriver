<?php

namespace Database\Seeders;

use App\Models\Shift;
use App\Models\Driver;
use App\Models\Taxi;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shifts = Shift::factory()
            ->has(Driver::factory())
            ->has(Taxi::factory())
            ->count(40)
            ->create();
    }
}
