<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function news()
    {
        return view('news');
    }

    public function cars()
    {
        return view('cars');
    }

    public function carDetail($id)
    {
        return view('car_detail', compact('id'));
    }

    public function support()
    {
        return view('support');
    }

    public function login()
    {
        return view('login');
    }
}