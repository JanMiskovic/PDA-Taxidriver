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
        return [
            'start' => $this->faker->dateTime(),
            'end' => $this->faker->dateTime(),
            'id_driver' => Driver::factory(),
            'id_taxi' => Taxi::factory(),
        ];
    }
}
