<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Facility;
use App\Models\RoomType;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\roomtype>
 */
class RoomtypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' =>$this->faker->unique()->word(),
            'price'=>$this->faker->randomFloat(0, 100000, 1000000)
        ];
    }
}