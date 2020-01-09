<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerfumeCategoryController extends Controller
{
    public function index()
    {
        $perfumes = DB::table('perfumes')->get();
        return view('main', compact('perfumes'));
    }
}
