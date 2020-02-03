<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterUsersRequest;

class RegisterController extends Controller
{
    public function index(RegisterUsersRequest $request)
    {
        var_dump(123);die;
    }
}
