<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function index(Request $request)
    {
        file_put_contents(public_path('../log.txt'), print_r($request->toArray(), true));

    }
}
