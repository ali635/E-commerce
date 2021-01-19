<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Basket\Basket;
class SearchController extends Controller
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

    public function search(Request $request)
    {
        $basket = $this->basket ;
        //$product  = DB::table('products');

        //$products = Product::select('*')->where('slug' , $request->search)->get();

        $products = Product::select('*')->where('slug', 'LIKE', "%" . $request->search . "%")->get();
                     
        // $products = $product->where('slug', 'LIKE', "%" . $request->search . "%")->get();
                     

        return view('front.home',compact('products','basket'));

        

    }
    
   
}
