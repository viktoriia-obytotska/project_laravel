<?php

namespace App\Http\Controllers;

use App\Category;
use App\Dish;
use App\Restaurant;
use App\Services\DishesService;
use App\Services\RestaurantsService;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::get();
        $restaurants = Restaurant::get();

        return view('add dish', compact('categories', 'restaurants'));
    }

    public function create(Request $request, DishesService $service)
    {
        $service->save($request);

        $categories = Category::get();
        $restaurants = Restaurant::get();
        return redirect()->route('show_dishes');
    }

    public function show($name)
    {
        $categories = Category::get();
        $restaurant = Restaurant::with('dish')->where('name', '=', $name)->first();
//var_dump($dishes);die;
        return view('dishes', compact('restaurant', 'categories'));
    }

    public function edit($id, $dishId)
    {
        $dishes = Dish::where('id', $dishId)->first();
        if(isset($dishes)){
            return view('dish edit', compact('dishes'));
        }


    }

    public function update(Request $request, DishesService $service, $id, $dishId)
    {
        $service->update($request, $id, $dishId);
        $restaurant = Restaurant::select('name')->where('id', '=', $id)->first();
        return redirect()->route('show_dishes', ['restaurant'=> $restaurant->name]);
    }


    public function destroy($id, $dishId)
    {
        $dishes = Dish::where('id', $dishId)->first();
        if (isset($dishes)) {
            $dishes->delete();
        }

        return redirect()->route('show_dishes', $id);
    }
}
