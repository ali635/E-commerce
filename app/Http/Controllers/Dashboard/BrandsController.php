<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Support\Str;
use DB;

class BrandsController extends Controller
{
    
    public function index()
    {
         $brands = Brand::orderBy('id','DESC') -> paginate(PAGINATION_COUNT);
         
        return view('dashboard.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('dashboard.brands.create');
    }


    public function store(BrandRequest $request)
    {
        DB::beginTransaction();

        //validation

        if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
        else
            $request->request->add(['is_active' => 1]);


        $fileName = "";
        if ($request->has('photo')) {

            $fileName = uploadImage('brands', $request->photo);
        }

        $brand = Brand::create($request->except('_token','photo'));

        //save translations
        $brand->name = $request->name;
        $brand ->photo = $fileName;
        
        $brand->save();
        DB::commit();
        return redirect()->route('admin.brands')->with(['success' => __('admin/sidebar.add_brand')]);



    }


    public function edit($id)
    {

        //get specific categories and its translations
        $brand = Brand::find($id);

        if (!$brand)
            return redirect()->route('admin.brands')->with(['error' => __('admin/sidebar.error_brand')]);

        return view('dashboard.brands.edit', compact('brand'));

    }


    public function update($id, BrandRequest $request)
    {
        try {
            $brand = Brand::find($id);

            if (!$brand)
                return redirect()->route('admin.brands')->with(['error' => __('admin/sidebar.error_brand')]);

            DB::beginTransaction();
            if ($request->has('photo')) {

               
                
                $fileName = uploadImage('brands', $request->photo);
                
                Brand::where('id', $id)
                    ->update([
                        'photo' => $fileName,
                    ]);
            }
            
            // if (request()->hasFile('photo')) {
            //     $photoLink= Str::after($brand->photo,'assets/');
            //     $photoLink=public_path('assets/'.$photoLink);
            //     unlink($photoLink);
            //     $brand->delete();
            // }

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $brand->update($request->except('_token', 'id', 'photo'));

            //save translations
            $brand->name = $request->name;
            $brand->save();

            DB::commit();
            return redirect()->route('admin.brands')->with(['success' => __('admin/sidebar.update_brands')]);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.brands')->with(['error' => __('admin/sidebar.error')]);
        }

    }


    public function destroy($id)
    {
        try {
            //get specific categories and its translations
            $brand = Brand::find($id);
            
            if (!$brand)
                return redirect()->route('admin.brands')->with(['error' => __('admin/sidebar.error_brand')]);

            if ($brand->photo != null)
            {
                $photoLink= Str::after($brand->photo,'assets/');
                $photoLink=public_path('assets/'.$photoLink);
                unlink($photoLink);
            } 
            $brand->delete();

            return redirect()->route('admin.brands')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.brands')->with(['error' => __('admin/sidebar.error')]);
        }
    }

}