<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        'category_id' => Category::query()->inRandomOrder()->value('id'),
        'name' => $this->faker->word() . ' Car',
        'description' => $this->faker->paragraph(),
        'speed' => $this->faker->numberBetween(100, 300),
        'durability' => $this->faker->numberBetween(1, 100),
        'boost' => $this->faker->numberBetween(1, 50),
        ];
    }
}
