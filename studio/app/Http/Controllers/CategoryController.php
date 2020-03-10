<?php

namespace App\Http\Controllers;

use App\Category;
use App\Dish;
use App\Http\Requests\CategoryValidatorRequest;
use App\Restaurant;
use App\Services\CategoriesService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('add category');
    }

    public function create(CategoryValidatorRequest $request, CategoriesService $service)
    {
        $service->save($request);

        return redirect()->route('main');
    }

    public function show($category)
    {
        $categories = Category::get();

        $restaurants = Category::with('restaurant')->where('name', '=', $category)->first();


        return view('restaurant category', compact('categories', 'restaurants'));
    }

    public function getDishCategory($category, $restaurant){
//        $categories = Category::get();

//        $dishes = Category::with('dish')->where('name', '=', $category)->first();


        $categories = Dish::select('dishes.*', 'restaurants.name as rest_name')
            ->leftJoin('restaurants', 'dishes.restaurant_id', '=', 'restaurants.id')
            ->leftJoin('categories', 'dishes.category_id', '=', 'categories.id')
            ->where('restaurants.name', '=', $restaurant)
            ->where('categories.name', '=', $category)
            ->get();

        return view('dish category', compact('categories', 'dishes', 'restaurant'));
    }
}
