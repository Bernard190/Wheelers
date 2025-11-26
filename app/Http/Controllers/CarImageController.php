<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Http\Request;

class CarImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'image' => 'required|image|max:4096'
        ]);

        $path = $request->image->store('cars', 'public');

        $car->images()->create([
            'image_path' => $path
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CarImage $carImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarImage $carImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarImage $carImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarImage $carImage)
    {
        //
        $carImage->delete();
        return back();
    }
}
