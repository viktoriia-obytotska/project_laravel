<?php


namespace App\Services;

use App\Category;
use App\Dish;
use App\Http\Requests\DishValidatorRequest;
use App\Restaurant;
use App\User;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

class DishesService
{
    public function save(DishValidatorRequest $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $picture = $request->file('picture')->store('uploads', 'public');
        $category = $request->input('category');
        $restaurant =$request->input('restaurant');

        $dishes = new Dish();
        $dishes->title = $name;
        $dishes->description = $description;
        $dishes->price = $price;
        $dishes->image = $picture;
        $dishes->category_id= $category;
        $dishes->restaurant_id =$restaurant;

        $dishes->save();
    }

    public function update(DishValidatorRequest $request, $id, $dishId)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');


        $dish = Dish::where('id', '=', $dishId)->first();
        $picture = null;
        if ($request->file('picture')) {
            $picture = $request->file('picture')->store('uploads', 'public');
        }


        $dish->title = $name;
        $dish->description = $description;
        $dish->price = $price;
        if ($picture) {
            $dish->image = $picture;
        }

        $dish->save();


    }
}