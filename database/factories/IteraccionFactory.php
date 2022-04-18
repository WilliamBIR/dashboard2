<?php

namespace Database\Factories;

use App\Models\Iteraccion;
use Illuminate\Database\Eloquent\Factories\Factory;

class IteraccionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Iteraccion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id'=> $this->faker->randomElement([1,2,3,4])
            
        ];
    }
}
