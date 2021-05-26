<?php

namespace Database\Factories;

use App\Models\Drive;
use App\Models\Shift;
use Illuminate\Database\Eloquent\Factories\Factory;

class DriveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Drive::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $distance = $this->faker->randomFloat(3, 0, 50);
        $date = $this->faker->date();
        $time = $this->faker->time('H:i', 'now');

        return [
            'id_shift' => $this->faker->numberBetween(1,600),
            'start' => $date . " " . $time,
            'end' => $date . " " . date('H:i', strtotime($time . "+" . rand(2, 60) . " minute")),
            'distance' => $distance,
            'fare' => $distance * 3,
        ];
    }
}
