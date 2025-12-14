<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    public function home() 
    {
        $cars = Car::latest()->take(3)->get()->map(function ($car) {
        $car->short_description = substr($car->description, 0, 100) . '...';
        return $car;
    });

    return view('home', compact('cars'));
    }

    public function news(Request $request)
    {
        $query = Car::query();
        if ($request->filled('q')) {
            $query->where('name', 'like', '%' . $request->q . '%')
                ->orWhere('description', 'like', '%' . $request->q . '%');
        }
        $cars = $query->latest()->get();
        $recentTopics = Car::latest()->take(4)->get();

        return view('news', compact('cars', 'recentTopics'));
    }

    public function cars()
    {
        $cars = Car::all();

        return view('cars', compact('cars'));
    }

    public function carDetail($id)
    {
        $car = Car::findOrFail($id);

        return view('car_detail', compact('car'));
    }

    public function supportID()
    {
        App::setlocale('en');
        return view('support');
    }

    public function supportEn()
    {
        App::setlocale('id');
        return view('support');
    }

    public function login()
    {
        return view('login');
    }
}
