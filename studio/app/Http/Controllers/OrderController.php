<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{


    public function show()
    {
        $orders = Order::select('orders.*', 'addresses.address', 'clients.*')
            ->leftJoin('clients', 'orders.client_id', '=', 'clients.id')
            ->leftJoin('addresses', 'orders.address_id', '=', 'addresses.id')
            ->get();

        return view('orders', compact('orders'));
    }
}
