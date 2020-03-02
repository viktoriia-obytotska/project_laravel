<?php

namespace App\Http\Controllers;

use App\Category;
use App\Restaurant;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($category)
    {
        $categories = Category::get();

        $restaurants = Category::with('restaurant')->where('name', '=', $category)->first();


        return view('restaurant category', compact('categories', 'restaurants'));
    }
}
