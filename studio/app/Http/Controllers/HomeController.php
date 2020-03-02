<?php

namespace App\Http\Controllers;

use App\Category;
use App\Dish;
use App\Http\Requests\RestaurantValidatorRequest;
use App\Restaurant;
use App\Services\RestaurantsService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function create(RestaurantValidatorRequest $request, RestaurantsService $service)
    {
        $service->save($request);

        return redirect()->route('show_restaurants');
    }

    public function show()
    {

        $categories = Category::get();
        $restaurants = Restaurant::get();

        return view('restaurants', compact('restaurants', 'categories'));
    }


    public function edit($id)
    {
        $restaurants = Restaurant::where('id', $id)->first();

        return view('restaurant edit', compact('restaurants'));
    }

    public function update(Request $request, RestaurantsService $service, $id)
    {
        $service->update($request, $id);

        return redirect()->route('show_restaurants')->with('status', 'Ваш запис було оновлено!');;
    }


    public function destroy($id)
    {
        $restaurants = Restaurant::where('id', $id)->first();

        if (isset($restaurants)) {
            $restaurants->dish()->delete();
            $restaurants->delete();
        }

        return redirect()->route('show_restaurants')->with('status', 'Ваш запис було видалено!');
    }
}
