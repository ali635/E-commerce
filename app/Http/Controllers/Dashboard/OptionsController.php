<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\OptionsRequest;
use App\Models\Attribute;
use App\Models\Option;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    public function index()
    {
        $options = Option::with(['product' => function ($prod) {
            $prod->select('id');
        }, 'attribute' => function ($attr) {
            $attr->select('id');
        }])->select('id', 'product_id', 'attribute_id', 'price')->paginate(PAGINATION_COUNT);
        return view('dashboard.options.index', compact('options'));
    }

    public function create()
    {
        $data =[];
        $data['products']     = Product::active()->select('id')->get();
        $data['attributes']   = Attribute::select('id')->get();

        return view('dashboard.options.create',$data);
    }

    /*----------------------------*/
    
    public function store(OptionsRequest $request)
    {
        
        DB::beginTransaction();

        //validation
        $option = Option::create([
            'attribute_id' => $request->attribute_id,
            'product_id' => $request->product_id,
            'price' => $request->price,
        ]);
        //save translations
        $option->name = $request->name;
        $option->save();
        DB::commit();

        return redirect()->route('admin.options')->with(['success' => __('admin/sidebar.add_opt')]);

    }  

    public function edit($optionId)
    {

        $data=[];

        $data['option'] = Option::find($optionId);
        

        if (!$data['option'])
            return redirect()->route('admin.options')->with(['error' => __('admin/sidebar.error_dep')]);

        $data['products']     = Product::active()->select('id')->get();
        $data['attributes']   = Attribute::select('id')->get();
        return view('dashboard.options.edit', $data);

    }

    public function update($id,OptionsRequest  $request)
    {      
        try {
        $option = Option::find($id);

        if (!$option)
            return redirect()->route('admin.options')->with(['error' => __('admin/sidebar.error_dep')]);

        $option->update($request -> only(['price','product_id','attribute_id']));

        //save translations
        $option->name = $request->name;
        $option->save();

        return redirect()->route('admin.options')->with(['success' => __('admin/sidebar.update_dep')]);
    } catch (\Exception $ex) {
        return redirect()->route('admin.options')->with(['error' => __('admin/sidebar.error')]);
    }

    }


    public function destroy($id)
    {

        try {
            //get specific categories and its translations
            $category = Category::orderBy('id', 'DESC')->find($id);

            if (!$category)
                return redirect()->route('admin.maincategories')->with(['error' => __('admin/sidebar.error_dep')]);

            $category->delete();

            return redirect()->route('admin.maincategories')->with(['success' =>  __('admin/sidebar.add_dep')]);

        } catch (\Exception $ex) {
            return redirect()->route('admin.maincategories')->with(['error' => __('admin/sidebar.error')]);
        }
    }
}
