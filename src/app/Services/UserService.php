<?php


namespace App\Services;


use App\Http\Requests\RegisterUsersRequest;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function store(RegisterUsersRequest $request):User
    {
       $user = (new User([
            'login' =>$request->get('login'),
            'email' =>$request->get('email'),
            'password' =>Hash::make($request->get('password')),
        ]));
           $user->save();
           return $user;
    }
}
