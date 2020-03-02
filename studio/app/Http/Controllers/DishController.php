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
    public function show($restaurant)
    {
        $categories = Category::get();
        $dishes = Restaurant::with('dish')->where('name', '=', $restaurant)->first();

//var_dump($dishes);die;
        return view('dishes', compact('dishes', 'categories'));
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

            return redirect()->route('show_dishes', $id);
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
