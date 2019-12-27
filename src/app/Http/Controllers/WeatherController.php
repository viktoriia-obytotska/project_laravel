<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index(WeatherService $service)
    {
        $city = config('config.weather.default_city');
        $weather= $service->getCityWeather($city);
        return view('city_weather', [
            'city' => $city,
            'weather' => $weather
        ]);

    }

    public function action(Request $request, WeatherService $service)
    {
        $city = $request->input('city');
        $weather= $service->getCityWeather($city);
        return view('city_weather', [
            'city' => $city,
            'weather' => $weather
        ]);
    }


}
