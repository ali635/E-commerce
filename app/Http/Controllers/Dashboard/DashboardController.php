<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        
        $orders = Order::where('customer_id', Auth::user()->id)->orderBy('id', 'DESC')->latest()->take(10)->get();
        return view('dashboard.index',compact('orders'));
    }
    
}
