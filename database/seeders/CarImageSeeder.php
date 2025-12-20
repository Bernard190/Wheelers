<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarImage;
use App\Models\Car;

class CarImageSeeder extends Seeder
{
    public function run(): void
    {
        if (CarImage::count() > 0) return;

        $files = array_values(array_filter(
            scandir(public_path('car-images')),
            fn ($f) => !in_array($f, ['.', '..'])
        ));

        $cars = Car::all();
        $fileIndex = 0;

        foreach ($cars as $car) {
            if (!isset($files[$fileIndex])) break;

            CarImage::create([
                'car_id'     => $car->id,
                'image_path' => 'car-images/' . $files[$fileIndex],
            ]);

            $fileIndex++;
        }
    }
}