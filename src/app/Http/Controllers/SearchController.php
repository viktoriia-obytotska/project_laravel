<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        return view('weather');
    }
    public function search(Request $request, WeatherService $service)
    {
        $city = $request->input('city');
        $weather= $service->getCityWeather('');
        return view('weather', [
            'city' => $city,
            'weather' => $weather
        ]);


    }

}
