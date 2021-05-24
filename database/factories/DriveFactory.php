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

        return [
            'id_shift' => Shift::factory(),
            'start' => $this->faker->dateTime(),
            'end' => $this->faker->dateTime(),
            'distance' => $distance,
            'fare' => $distance * 3,
        ];
    }
}
