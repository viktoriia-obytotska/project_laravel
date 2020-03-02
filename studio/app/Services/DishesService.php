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

    public function update(Request $request, $id, $dishId)
    {
        $dish = $request->input('name_dish');
        $description = $request->input('description');
        $price = $request->input('price');
//        $picture = $request->file('picture')->store('uploads', 'public');

        $dishes = Dish::where('id', '=', $dishId)->first();

            $dishes->title = $request->name_dish;
            $dishes->description = $request->description;
            $dishes->price = $request->price;
//            $dishes->image = $picture;

            $dishes->save();


    }
}