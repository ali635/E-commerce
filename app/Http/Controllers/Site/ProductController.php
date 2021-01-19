<?php

namespace App\Http\Controllers\Site;

use App\Basket\Basket;
use App\Models\Attribute;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Product;


class ProductController extends Controller
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
        $data=[];
        $data['basket'] = $this->basket;
        $data['product'] = Product::where('slug',$slug) -> first();  //improve select only required fields
        if (!$data['product']){ ///  redirect to previous page with message
              }

        $product_id = $data['product']->id ;
        $product_categories_ids =  $data['product']->categories->pluck('id'); // [1,26,7] get all categories that product on it

       $data['product_attributes'] =  Attribute::whereHas('options' , function ($q) use($product_id){
            $q->whereHas('product',function ($qq) use($product_id){
                $qq->where('product_id',$product_id);
            });
        })->get();
        
         $data['related_products'] = Product::whereHas('categories',function ($cat) use($product_categories_ids){
           $cat-> whereIn('categories.id',$product_categories_ids);
       }) -> limit(20) -> latest() -> get();

        return view('front.products-details', $data);
    }
   

}