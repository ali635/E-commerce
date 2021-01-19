<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use DB;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = City::orderBy('id', 'DESC')->get();
        return view('dashboard.cities.index', compact('cities'));
    }

    public function create()
    {
        return view('dashboard.cities.create');
    }

    /*----------------------------*/
    
    public function store(Request $request)
    {
        
        DB::beginTransaction();

        //validation
        $city = City::create(['price' => $request->price]);
        //save translations
        $city->name = $request->name;
        $city->save();
        DB::commit();

        return redirect()->route('admin.cities')->with(['success' => __('admin/sidebar.add_cities')]);

    }  

    public function edit($id)
    {

        //get specific categories and its translations
        $city = City::find($id);

        if (!$city)
            return redirect()->route('admin.cities')->with(['error' => __('admin/sidebar.error_city')]);

        return view('dashboard.cities.edit', compact('city'));
    }

    public function update($id,Request  $request)
    {      
        try {
        $city = City::find($id);

        if (!$city)
            return redirect()->route('admin.cities')->with(['error' => __('admin/sidebar.error_city')]);

        $city->update($request -> only(['price']));

        //save translations
        $city->name = $request->name;
        $city->save();

        return redirect()->route('admin.cities')->with(['success' => __('admin/sidebar.update_city')]);
    } catch (\Exception $ex) {
        return redirect()->route('admin.cities')->with(['error' => __('admin/sidebar.error')]);
    }

    }


    public function destroy($id)
    {

        try {
           //get specific categories and its translations
           $cities = City::find($id);

           if (!$cities)
               return redirect()->route('admin.cities')->with(['error' => __('admin/sidebar.error_tag')]);
               
           $cities->translations()->delete();
           $cities->delete();

           return redirect()->route('admin.cities')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.cities')->with(['error' => __('admin/sidebar.error')]);
        }
    }
}
