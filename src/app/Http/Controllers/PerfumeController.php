<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerfumeValidatorRequest;
use App\Perfumes;
use Illuminate\Http\Request;

class PerfumeController extends Controller
{
    public function index()
    {
        return view('add perfume');

    }

    /**
     * @param PerfumeValidatorRequest $request
     */
    public function show(PerfumeValidatorRequest $request)
    {
        $name = $request->input('name');
        $slug = $request->input('slug');
        $description = $request->input('description');
        $big_icon = $request->file('big_icon')->store('uploads', 'public');
        $small_icon = $request->file('small_icon')->store('uploads', 'public');
        $category = $request->input('category');

        $perfumes = new Perfumes();
        $perfumes->name = $request->name;
        $perfumes->slug= $request->slug;
        $perfumes->description=$request->description;
        $perfumes->big_icon=$big_icon;
        $perfumes->small_icon=$small_icon;
        $perfumes->category_id=$request->category;
        $perfumes->save();

        return redirect()->route('perfume/category');


    }
}
