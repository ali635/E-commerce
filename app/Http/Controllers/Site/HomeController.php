<?php

namespace App\Http\Controllers\Site;


use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Basket\Basket;

class HomeController extends Controller
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

    public function home()
    {
        $data = [];
        $data['basket'] = $this->basket;
         $data['sliders'] = Slider::get(['photo']);
         $data['banners'] = Banner::get(['photo'])->random(3);
         $data['products'] = Product::where('is_active','1')->take(30)->get();
         $data['categories'] = Category::parent()->select('id', 'slug')->with(['childrens' => function ($q) {
            $q->select('id', 'parent_id', 'slug');
            $q->with(['childrens' => function ($qq) {
                $qq->select('id', 'parent_id', 'slug');
            }]);
        }])->get();
        
        return view('front.home', $data);
    }
}
