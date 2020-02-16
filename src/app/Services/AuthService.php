<?php


namespace App\Services;


use App\Http\Requests\GetTokenRequest;
use App\User;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class AuthService
{
    public function getToken(GetTokenRequest $request)
    {
        $user = User::whereLogin($request->get('login'))->first();
        if (!$user){
            return null;
        }
        if (!Hash::check($request->password, $user->password)){
            return null;
        }
        $token = Uuid::uuid4()->toString();
        $user->token = $token;
        $user->save();

        return $token;
    }
}
