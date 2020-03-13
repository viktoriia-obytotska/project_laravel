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
        $restaurants->name = $name;
        $restaurants->image = $image;

        $restaurants->save();

    }

    public function update(RestaurantValidatorRequest $request, $id)
    {
        $name = $request->input('name');
        $category = $request->input('category');

        $restaurants = Restaurant::find($id);
        $image = null;
        if($request->file('image')){
            $image = $request->file('image')->store('uploads', 'public');
        }
        $restaurants->name = $name;
        if($image){
            $restaurants->image = $image;
        }

        $restaurants->save();

    }
}