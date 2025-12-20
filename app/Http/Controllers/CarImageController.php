<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarImageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'image'  => 'required|image|max:4096',
        ]);

        $file = $request->file('image');

        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('car-images'), $filename);

        CarImage::create([
            'car_id'     => $validated['car_id'],
            'image_path' => 'car-images/' . $filename,
        ]);

        return back()->with('success', 'Image uploaded successfully.');
    }

    public function update(Request $request, CarImage $carImage)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'image'  => 'required|image|max:4096',
        ]);

        $oldPath = public_path($carImage->image_path);
        if (file_exists($oldPath)) {
            unlink($oldPath);
        }

        $file = $request->file('image');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('car-images'), $filename);

        $carImage->update([
            'car_id'     => $validated['car_id'],
            'image_path' => 'car-images/' . $filename,
        ]);

        return back()->with('success', 'Image updated successfully.');
    }

    public function destroy(CarImage $carImage)
    {
        $fullPath = public_path($carImage->image_path);

        if (file_exists($fullPath)) {
            unlink($fullPath);
        }

        $carImage->delete();

        return back()->with('success', 'Image deleted successfully.');
    }
}
