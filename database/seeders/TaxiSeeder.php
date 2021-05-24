<?php

namespace Database\Seeders;

use App\Models\Taxi;
use Illuminate\Database\Seeder;

class TaxiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taxis = Taxi::factory()
            ->count(40)
            ->create();
    }
}
