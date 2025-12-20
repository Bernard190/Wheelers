<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarImage;

class CarImageSeeder extends Seeder
{
    public function run(): void
    {
        if (CarImage::count() > 0) return;

        $files = scandir(public_path('car-images'));
        $carIds = \App\Models\Car::pluck('id')->toArray();

        foreach ($files as $file) {
            if ($file === '.' || $file === '..') continue;

            CarImage::create([
                'car_id'     => $carIds[array_rand($carIds)],
                'image_path' => '/car-images/' . $file
            ]);
        }
    }
}
