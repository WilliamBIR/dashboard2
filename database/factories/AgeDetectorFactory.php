<?php

namespace Database\Factories;

use App\Models\AgeDetector;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgeDetectorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AgeDetector::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'age'=> $this->faker->randomElement(['(0-4)', '(4-6)', '(6-15)', '(15-25)', '(25-35)', '(35-45)', '(45-55)'])
        ];
    }
}
