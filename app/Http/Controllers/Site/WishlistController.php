<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= auth()->user()
            ->wishlist()
            ->latest()
            ->paginate(20);
            return view('front.wishlists',compact('products'));
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
