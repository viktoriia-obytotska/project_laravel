<?php


namespace App\Services;
use App\Category;
use App\Dish;
use App\Http\Requests\CategoryValidatorRequest;
use App\Http\Requests\RestaurantValidatorRequest;
use App\Restaurant;
use App\User;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

class CategoriesService
{

    public function save(CategoryValidatorRequest $request)
    {
        $category = $request->input('category');

        $categories = new Category();
        $categories->name = $category;

        $categories->save();

    }


}