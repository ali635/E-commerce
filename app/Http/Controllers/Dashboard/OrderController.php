<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show()
    {
        $orders = Order::where('id', '1')->first();
        
        return view('dashboard.index',compact('orders'));
    }
}
