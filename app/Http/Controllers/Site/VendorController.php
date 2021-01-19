<?php

namespace App\Http\Controllers\Site;

use App\Basket\Basket;
use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRequest;
use App\Models\Vendor;
use Illuminate\Http\Request;
use DB;

class VendorController extends Controller
{
     /**
     * Instance of Basket.
     *
     * @var Basket
     */
    protected $basket;
    protected $id;

    /**
     * Create a new CartController instance.
     *
     * @param Basket $basket
     * @param Product $product
     */
    public function __construct(Basket $basket)
    {
        $this->basket = $basket;

    }
    public function index()
    {
        $basket = $this->basket ;
        return view('front.vendor.register',compact('basket'));
    }
    public function store(VendorRequest $request)
    {
        
        $vendor = Vendor::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => $request->password,
            'iban' => $request->iban,
            'city' => $request->city,
            'address' => $request->address,
        ]);
        $vendor->save();
        


        DB::commit();
        return redirect()->route('vendor.index')->with(['register' => __('site/site.add_vendor')]);
    }
}
