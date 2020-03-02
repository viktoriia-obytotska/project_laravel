<?php


namespace App\Services;
use App\Category;
use App\Dish;
use App\Restaurant;
use App\User;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

class BotService
{
    public function getCategory()
    {
        $category = Category::get();
    }
}