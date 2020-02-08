<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function mobileAgent()
    {
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $ios = strpos($agent, 'iPhone');
        $android = strpos($agent, 'Android');

        if($ios)
        {
            return redirect()->away('https://www.apple.com');
        }
        if($android)
        {
            return redirect()->away('https://www.google.com');
        }

        else{
            return 'Версия для ПК не поддерживается';
        }
    }
}
