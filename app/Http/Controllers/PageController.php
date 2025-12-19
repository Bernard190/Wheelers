<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    public function home()
    {
        $topCarsByCategory = Car::with(['images', 'category'])
            ->whereNotNull('category_id')
            ->latest()
            ->get()
            ->groupBy('category.name')
            ->map(fn ($cars) => $cars->first());

        $trendingNews = News::latest()
            ->take(3)
            ->get()
            ->map(function ($news) {
                $news->short_content = substr(strip_tags($news->content), 0, 100) . '...';
                return $news;
            });

        return view('home', compact('topCarsByCategory', 'trendingNews'));
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
        $query = News::query();
        if ($request->filled('q')) {
            $query->where('title', 'like', '%' . $request->q . '%')
                ->orWhere('content', 'like', '%' . $request->q . '%');
        }
        $news = $query->latest()->paginate(6);
        $trending = News::latest()->take(3)->get();
        $trendingIds = $trending->pluck('id')->toArray();
        $generalNews = News::whereNotIn('id', $trendingIds)
            ->latest()
            ->take(2)
            ->get();
        $recentTopics = News::latest()->take(4)->get();
        return view('news', compact(
            'news',
            'recentTopics',
            'trending',
            'generalNews'
        ));
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

        public function cars(Request $request)
        {
            $categories = Category::select('id', 'name')
                ->orderBy('name')
                ->get();
            $topCars = Car::with(['images', 'category'])
                ->latest()
                ->take(3)
                ->get();
            $query = Car::with(['images', 'category'])
                ->select('cars.*');
            if ($topCars->count()) {
                $query->whereNotIn('cars.id', $topCars->pluck('id'));
            }
            if ($request->filled('q')) {
                $query->where('cars.name', 'like', '%' . $request->q . '%');
            }
            if ($request->filled('category')) {
                $query->where('cars.category_id', $request->category);
            }
            $cars = $query->latest()->paginate(6);

            return view('cars', compact('cars', 'categories', 'topCars'));
        }

    public function carsID(Request $request)
    {
        App::setLocale('id');
        return $this->cars($request);
    }

    public function carsEn(Request $request)
    {
        App::setLocale('en');
        return $this->cars($request);
    }

    public function carDetail($id)
    {
        $car = Car::with('images')->findOrFail($id);
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

    public function newsDetail($id)
    {
        $news = News::findOrFail($id);
        return view('news_detail', compact('news'));
    }

    public function newsDetailID($id)
    {
        App::setLocale('id');
        return $this->newsDetail($id);
    }

    public function newsDetailEn($id)
    {
        App::setLocale('en');
        return $this->newsDetail($id);
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