<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cars = Car::with(['category', 'images'])->get();

        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        
        return view('cars.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

        // upload images
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

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
        $car->load(['category', 'images']);

        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
        $categories = Category::all();

        return view('cars.edit', compact('car', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
        $car->delete();
        
        return redirect()->route('cars.index');
    }
}
