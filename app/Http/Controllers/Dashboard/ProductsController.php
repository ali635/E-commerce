<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralProductRequest;
use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductImagesRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Str;
use App\Models\Tag;

use DB;

use Illuminate\Http\Request;


class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::select('id','slug','price', 'created_at')->paginate(PAGINATION_COUNT);
        return view('dashboard.products.general.index', compact('products'));
    }

    public function create()
    {
        $data =[];
        $data['brands']       = Brand::active()->select('id')->get();
        $data['tags']         = Tag::select('id')->get();
        $data['categories']   = Category::active()->parent()->select('id')->get();

        return view('dashboard.products.general.create',$data);
    }

    /*----------------------------*/
    
    public function store(GeneralProductRequest $request)
    {
        
        DB::beginTransaction();
        //validation
        if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
        else
            $request->request->add(['is_active' => 1]);

        
        
        $product = Product::create([
            'slug' => $request->slug,
            'brand_id' => $request->brand_id,
            'is_active' => $request->is_active,
            'price' => $request->price,
            
            'special_price' => $request->special_price,
            'special_price_type' => $request->special_price_type,
            'special_price_start' => $request->special_price_start,
            'special_price_end' => $request->special_price_end,
            'sku' => $request->sku,
            'qty' => $request->qty,
        ]);
        
        //save translations
        $product->name = $request->name;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        
        $product->save();

        //save product categories

        $product->categories()->attach($request->categories);
        $product->tags()->attach($request->tags);
        //save product tags

        DB::commit();
        return redirect()->route('admin.products')->with(['success' => __('admin/sidebar.add_pro_img')]);

    }
    /*--------------------*/
    public function addImages($product_id)
    {
        
        return view('dashboard.products.images.create')->withId($product_id);
    }

    //to save images to folder only
    public function saveProductImages(Request $request )
    {

        $file = $request->file('dzfile');
        $filename = uploadImage('products', $file);

        return response()->json([
            'name' => $filename,
            'original_name' => $file->getClientOriginalName(),
        ]);

    }
    /*--------------------*/
    public function saveProductImagesDB(ProductImagesRequest $request){

        try {
            // save dropzone images
            if ($request->has('document') && count($request->document) > 0) {
                foreach ($request->document as $image) {
                    Image::create([
                        'product_id' => $request->product_id,
                        'photo' => $image,
                    ]);
                }
            }

            return redirect()->route('admin.products')->with(['success' => __('admin/sidebar.add_pro_img')]);

        }catch(\Exception $ex){
            return redirect()->route('admin.products')->with(['error' => __('admin/sidebar.error')]);
        }
    }

    public function edit($id)
    {

        //get specific categories and its translations
        $product      = Product::orderBy('id', 'DESC')->find($id);
        $categories   = Category::orderBy('id', 'DESC')->get();
        $brands       = Brand::orderBy('id', 'DESC')->get();
        $tags         = Tag::orderBy('id', 'DESC')->get();

        if (!$product)
            return redirect()->route('admin.products')->with(['error' => __('admin/sidebar.error_dep')]);

        return view('dashboard.products.general.edit', compact('product','categories','brands','tags'));

    }
    public function update($id,Request  $request)
    {   
         
        $product = Product::find($id);

        if (!$product)
            return redirect()->route('admin.products')->with(['error' => __('admin/sidebar.error_dep')]);

        if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
        else
            $request->request->add(['is_active' => 1]);


        
        $product->update($request -> except(['_token','product_id']));

        //save translations
        $product->name = $request->name;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
       
        $product->save();
        $product->categories()->attach($request->categories);
        $product->tags()->attach($request->tags);

        return redirect()->route('admin.products')->with(['success' => __('admin/sidebar.update_dep')]);
        

    }


    public function destroy($id)
    {

        try{
            //get specific categories and its translations
            $product = Product::orderBy('id', 'DESC')->find($id);
            
            $images = Image::where('product_id',$id)->first();
            

            if (!$product)
                return redirect()->route('admin.products')->with(['error' => __('admin/sidebar.error_dep')]);

           
            if ($images->photo != null){
                $photoLink= Str::after($images->photo,'assets/');
                $photoLink=public_path('assets/'.$photoLink);
                unlink($photoLink);
            }
            
            $images= Image::where('product_id',$id)->delete();

            $product->delete();
            
        
            return redirect()->route('admin.products')->with(['success' => 'تم  الحذف بنجاح']);
        } catch(\Exception $ex){
            return redirect()->route('admin.products')->with(['error' => __('admin/sidebar.error')]);
        }
    }
    public function show($id){
        $images = Image::where('product_id',$id)->orderBy('id','asc') -> paginate(PAGINATION_COUNT);
        return view('dashboard.products.images.show',compact('images'));
    }

    public function deleteimage($id){
        $images=Image::find($id);
        
        if ($images->photo != null)
        {
            $photoLink= Str::after($images->photo,'assets/');
            $photoLink=public_path('assets/'.$photoLink);
            unlink($photoLink);
        } 
        $images= Image::where('id',$id)->delete();
        return redirect()->route('admin.products')->with('success','Image deleted');

    }
}
