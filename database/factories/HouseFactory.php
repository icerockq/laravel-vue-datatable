<?php

namespace Database\Factories;

use App\Models\House;
use Illuminate\Database\Eloquent\Factories\Factory;

class HouseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = House::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'The ' . $this->faker->firstName,
            'price' => rand(20000, 70000),
            'bedrooms' => rand(3, 5),
            'bathrooms' => rand(2, 3),
            'storeys' => rand(1, 2),
            'garages' => rand(1, 2),
        ];
    }
}
