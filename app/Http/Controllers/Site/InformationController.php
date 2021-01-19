<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;
use App\Basket\Basket;
class InformationController extends Controller
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
    public function show()
    {
        $basket = $this->basket ;
        $information = Information::where('id', '1')->first();
        return view('front.infor_about',compact('information','basket'));
    }
}
