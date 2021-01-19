<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorsController extends Controller
{
    public function index()
    {
        $vendors = Vendor::orderBy('id', 'DESC')->latest()->take(100)->get();
        return view('dashboard.vendors.index', compact('vendors'));
    }
}
