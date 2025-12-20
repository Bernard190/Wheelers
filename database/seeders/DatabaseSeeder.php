<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = ['Sport','Muscle','Offroad','Electric'];
        foreach ($categories as $name) {
            \App\Models\Category::firstOrCreate(['name' => $name]);
        }

        \App\Models\Car::factory()
            ->count(10)
            ->create();

        $this->call(\Database\Seeders\CarImageSeeder::class);

        \App\Models\News::factory()->count(10)->create();
    }
}
