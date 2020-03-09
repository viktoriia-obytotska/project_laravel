<?php


namespace App\Services;

use App\Category;
use App\Dish;
use App\Restaurant;
use App\User;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

class DishesService
{
    public function save(Request $request)
    {
        $dish = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $picture = $request->file('picture')->store('uploads', 'public');

        $dishes = new Dish();
        $dishes->title = $request->name;
        $dishes->description = $request->description;
        $dishes->price = $request->price;
        $dishes->image = $picture;
        $dishes->category_id= $categories->id;
        $dishes->restaurant_id =$restaurants->id;

        $dishes->save();
    }

    public function update(Request $request, $id, $dishId)
    {
        $name = $request->input('name_dish');
        $description = $request->input('description');
        $price = $request->input('price');


        $dish = Dish::where('id', '=', $dishId)->first();
        $picture = null;
        if ($request->file('picture')) {
            $picture = $request->file('picture')->store('uploads', 'public');
        }


        $dish->title = $name;
        $dish->description = $request->description;
        $dish->price = $request->price;
        if ($picture) {
            $dish->image = $picture;
        }

        $dish->save();


    }
}