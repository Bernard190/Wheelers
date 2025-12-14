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

    public function homeID()
    {
        App::setLocale('id');
        return $this->home();
    }

    public function homeEn()
    {
        App::setLocale('en');
        return $this->home();
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

    public function newsID(Request $request)
    {
        App::setLocale('id');
        return $this->news($request);
    }

    public function newsEn(Request $request)
    {
        App::setLocale('en');
        return $this->news($request);
    }

    public function cars()
    {
        $cars = Car::all();

        return view('cars', compact('cars'));
    }

    public function carsID()
    {
        App::setLocale('id');
        return $this->cars();
    }

    public function carsEn()
    {
        App::setLocale('en');
        return $this->cars();
    }

    public function carDetail($id)
    {
        $car = Car::findOrFail($id);

        return view('car_detail', compact('car'));
    }

    public function carDetailID($id)
    {
        App::setLocale('id');
        return $this->carDetail($id);
    }

    public function carDetailEn($id)
    {
        App::setLocale('en');
        return $this->carDetail($id);
    }

    public function supportID()
    {
        App::setLocale('id');
        return view('support');
    }

    public function supportEn()
    {
        App::setLocale('en');
        return view('support');
    }

    public function loginID()
    {
        App::setLocale('id');
        return view('login');
    }

    public function loginEn()
    {
        App::setLocale('en');
        return view('login');
    }
}