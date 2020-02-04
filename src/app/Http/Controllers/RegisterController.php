<?php

namespace App\Http\Controllers;


use App\Http\Requests\RegisterUsersRequest;
use App\Http\Resources\User;
use App\Services\UserService;

class RegisterController extends Controller
{
    public function index(RegisterUsersRequest $request, UserService $service)
    {
        $user = $service->store($request);

        return new User($user);
    }
}
