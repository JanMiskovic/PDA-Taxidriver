<?php

namespace Database\Factories;

use App\Models\Taxi;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Taxi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $model = ucfirst($this->faker->words(2, true));
        $model .= " " . $this->faker->numberBetween(10, 999);

        return [
            'model' => $model,
            'color' => $this->faker->safeColorName,
            'kilometers' => $this->faker->numberBetween(1000, 200000),
            'reg_plate' => $this->faker->regexify('[A-Z0-9]{6}'),
        ];
    }
}
