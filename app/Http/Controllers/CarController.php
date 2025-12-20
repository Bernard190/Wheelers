<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function index()
    {
        $cars = Car::with(['category', 'images'])->get();

        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        $categories = Category::all();
        
        return view('cars.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'speed' => 'required|numeric',
            'durability' => 'required|numeric',
            'boost' => 'required|numeric',
            'category_id' => 'required',
            'images.*' => 'image|max=4096'
        ]);

        $car = Car::create($validated);
        if ($request->hasFile('images')) {
            foreach ($request->images as $img) {
                $path = $img->store('cars', 'public');

                $car->images()->create([
                    'image_path' => $path
                ]);
            }
        }

        return redirect()->route('cars.index');
    }

    public function show(Car $car)
    {
        return redirect()->route('car.detail.' . app()->getLocale(), $car->id);
    }

    public function edit(Car $car)
    {
        $categories = Category::all();

        return view('cars.edit', compact('car', 'categories'));
    }

    public function update(Request $request, Car $car)
    {
         $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'speed' => 'required|numeric',
            'durability' => 'required|numeric',
            'boost' => 'required|numeric',
            'category_id' => 'required'
        ]);

        $car->update($validated);

        return redirect()->route('cars.show', $car);
    }

    public function destroy(Car $car)
    {
        $car->delete();
        
        return redirect()->route('cars.index');
    }
}
