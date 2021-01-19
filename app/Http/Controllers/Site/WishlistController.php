<?php

namespace App\Http\Controllers\Site;

use App\Basket\Basket;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $basket = $this->basket ;
        $products= auth()->user()
            ->wishlist()
            ->latest()
            ->paginate(20);
            return view('front.wishlists',compact('products','basket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if (! auth()->user()->wishlistHas(request('productId'))) {
            auth()->user()->wishlist()->attach(request('productId'));
            return response()->json(['status'=> true,'wished'=> true]);
        }
        return response()->json(['status'=> true,'wished'=> false]);
    }

    /**
     * Destroy resources by the given id.
     *
     * @param string $productId
     * @return void
     */
    public function destroy()
    {
        auth()->user()->wishlist()->detach(request('productId'));
    }
}
