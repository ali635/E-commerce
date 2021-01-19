<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;
use DB;

class InformationController extends Controller
{
   

    public function edit()
    {
        //get specific categories and its translations
        $information = Information::where('id', '1')->first();

        if (!$information)
            return redirect()->route('admin.information.edit')->with(['error' => __('admin/sidebar.error_tag')]);

        return view('dashboard.information.edit',compact('information'));

    }
   
    public function update(Request  $request)
    {

        try {
            $information = information::where('id', '1')->first();

            if (!$information)
                return redirect()->route('admin.information.edit')->with(['error' => __('admin/sidebar.error_dep')]);
            
            DB::beginTransaction();
            if ($request->has('photo')) {
                $fileName = uploadImage('information', $request->photo);
                
                information::where('id', '1')
                    ->update([
                        'photo' => $fileName,
                ]);

            }
            $information->update($request -> except(['_token','id','photo']));

            //save translations
            $information->name = $request->name;
            $information->description = $request->description;
            $information->short_description = $request->short_description;
        
            $information->save();
            DB::commit();

            return redirect()->route('admin.information.edit')->with(['success' => __('admin/sidebar.update_dep')]);
        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.information.edit')->with(['error' => __('admin/sidebar.error')]);
        }  
    }

}
