<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Floor;
use App\Models\Facility;
use App\Models\RoomType;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(),
            'desc' => $this->faker->unique()->paragraph(),
            'floor_id' => Floor::factory(),
            'roomtype_id' => RoomType::factory(),
        ];
    }
}
