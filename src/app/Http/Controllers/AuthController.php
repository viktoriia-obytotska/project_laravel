<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetTokenRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getToken(GetTokenRequest $request, AuthService $service)
    {
        $token = $service->getToken($request);

        if (!$token){
            return response(['error' => 'Bad request'], 400);
        }

        return [
            'token'=> $token
        ];
    }
}
