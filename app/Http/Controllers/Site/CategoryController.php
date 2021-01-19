<?php

namespace App\Http\Controllers\Site;

use App\Basket\Basket;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Product;

class CategoryController extends Controller
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
    public function productsBySlug($slug)
    {
        $data = [];
        $data['basket'] = $this->basket;
        $data['category'] = Category::where('slug', $slug)->first();

        if ($data['category'])
            $data['products'] = $data['category']->products;

        return view('front.products', $data);
    }

}
