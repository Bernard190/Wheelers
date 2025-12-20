<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 * @extends Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $files = scandir(public_path('news-images'));

        $files = array_values(array_filter($files, function ($file) {
            return !in_array($file, ['.', '..']);
        }));

        return [
            'title'   => fake()->sentence(6),
            'content' => fake()->paragraphs(10, true),
            'image'   => '/news-images/' . $files[array_rand($files)],
        ];
    }
}
