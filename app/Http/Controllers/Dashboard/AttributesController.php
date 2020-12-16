<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use DB;

class AttributesController extends Controller
{
    
    public function index()
    {
         $attributes = Attribute::orderBy('id','DESC') -> paginate(PAGINATION_COUNT);
        return view('dashboard.attributes.index', compact('attributes'));
    }

    public function create()
    {
        return view('dashboard.attributes.create');
    }


    public function store(AttributeRequest $request)
    {


            DB::beginTransaction();

            //validation


            $attribute = Attribute::create([]);

            //save translations
            $attribute->name = $request->name;
            

            $attribute->save();
            DB::commit();
            return redirect()->route('admin.attributes')->with(['success' => __('admin/sidebar.add_product_att')]);



    }


    public function edit($id)
    {

        //get specific categories and its translations
        $attribute = Attribute::find($id);

        if (!$attribute)
            return redirect()->route('admin.attributes')->with(['error' => __('admin/sidebar.error')]);

        return view('dashboard.attributes.edit', compact('attribute'));

    }


    public function update($id, AttributeRequest $request)
    {
        try {
            //validation

            //update DB


            $attribute = Attribute::find($id);

            if (!$attribute)
                return redirect()->route('admin.attributes')->with(['error' => __('admin/sidebar.error')]);


            DB::beginTransaction();
           
            $attribute->update([]);

            //save translations
            $attribute->name = $request->name;
            $attribute->save();

            DB::commit();
            return redirect()->route('admin.attributes')->with(['success' => __('admin/sidebar.update_attributes')]);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.attributes')->with(['error' => __('admin/sidebar.error')]);
        }

    }


    public function destroy($id)
    {
        try {
            //get specific categories and its translations
            $attribute = Attribute::find($id);

            if (!$attribute)
                return redirect()->route('admin.attributes')->with(['error' => __('admin/sidebar.error')]);

            
            $attribute->delete();

            return redirect()->route('admin.attributes')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.attributes')->with(['error' => __('admin/sidebar.error')]);
        }
    }

}