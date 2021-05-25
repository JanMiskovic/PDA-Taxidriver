<?php

namespace Database\Factories;

use App\Models\Shift;
use App\Models\Driver;
use App\Models\Taxi;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShiftFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shift::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = $this->faker->date();
        $time = $this->faker->time('H:i', 'now');

        return [
            'start' => $date . " " . $time,
            'end' => $date . " " . date('H:i', strtotime($time . "+" . rand(120,720) . " minute")),
            'id_driver' => Driver::factory(),
            'id_taxi' => Taxi::factory(),
        ];
    }
}
