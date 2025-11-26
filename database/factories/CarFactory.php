<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        'category_id' => \App\Models\Category::inRandomOrder()->first()->id ?? 1,
        'name' => $this->faker->word() . ' Car',
        'description' => $this->faker->paragraph(),
        'speed' => $this->faker->numberBetween(100, 300),
        'durability' => $this->faker->numberBetween(1, 100),
        'boost' => $this->faker->numberBetween(1, 50),
        ];
    }
}
