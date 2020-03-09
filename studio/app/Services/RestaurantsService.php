<?php


namespace App\Services;
use App\Category;
use App\Dish;
use App\Http\Requests\RestaurantValidatorRequest;
use App\Restaurant;
use App\User;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

class RestaurantsService
{

    public function save(RestaurantValidatorRequest $request)
    {
        $name = $request->input('name');
        $image = $request->file('image')->store('uploads', 'public');
        $category = $request->input('category');


        $restaurants = new Restaurant();
        $restaurants->name = $request->name;
        $restaurants->image = $image;

        $restaurants->save();

        $categories = new Category();
        $categories->name = $request->category;

        $categories->save();

    }

    public function update(Request $request, $id)
    {
        $name = $request->input('name_restaurant');
        $image = $request->file('image')->store('uploads', 'public');

        $restaurants = Restaurant::find($id);
        $restaurants->name = $request->name_restaurant;
        $restaurants->image = $image;

        $restaurants->save();

    }
}