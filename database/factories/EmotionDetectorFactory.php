<?php

namespace Database\Factories;

use App\Models\EmotionDetector;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmotionDetectorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmotionDetector::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'emotion'=> $this->faker->randomElement(['neutral', 'happiness', 'surprise', 'sadness', 'anger', 'disgust', 'fear'])
        ];
    }
}
