<?php

namespace Database\Factories;

use App\Models\GenderDetector;
use Illuminate\Database\Eloquent\Factories\Factory;

class GenderDetectorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GenderDetector::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'gender'=> $this->faker->randomElement(['Hombre','Mujer'])
        ];
    }
}
