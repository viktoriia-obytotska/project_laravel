<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function category()
    {
        $categories = Item::select('items.*')->where('parent_id', '=', 0)->get();

        $this->rec($categories);
        return view('app', compact('categories'));
    }

    public function rec($categories)
    {
        echo '<ul>';
        foreach ($categories as $category) {
            echo '<li>'.($category->category). '</li><br>';
            if(($category->items->count())){
                $this->rec($category->items);
            }
        }
        echo '</ul>';
    }

}


