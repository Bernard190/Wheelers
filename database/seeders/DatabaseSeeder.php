<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::factory()->count(10)->create();

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
