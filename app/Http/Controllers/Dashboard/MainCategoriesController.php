<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Enumerations\CategoryType;
use App\Http\Requests\MainCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
class MainCategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::with('_parent')->orderBy('id','DESC') -> paginate(PAGINATION_COUNT);
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories  = Category::select('id','parent_id')->get();
        return view('dashboard.categories.create',compact('categories'));
    }
    public function store(MainCategoryRequest $request)
    {

        

            DB::beginTransaction();

            //validation

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            //if user choose main category then we must remove parent id from the request
            if ($request->type == CategoryType::mainCategory)
            {
                $request->request->add(['parent_id' => null]);
            }
            
            $fileName = "";
            if ($request->has('photo')) {

                $fileName = uploadImage('categories', $request->photo);
            }
            $category = Category::create($request->except('_token','photo'));

            //save translations
            $category->name = $request->name;
            $category ->photo = $fileName;
            
            $category->save();
            DB::commit();
            return redirect()->route('admin.maincategories')->with(['success' => __('admin/sidebar.add_dep')]);

        

    }


    public function edit($id)
    {

        //get specific categories and its translations
        $category = Category::orderBy('id', 'DESC')->find($id);

        if (!$category)
            return redirect()->route('admin.maincategories')->with(['error' => __('admin/sidebar.error_dep')]);

        return view('dashboard.categories.edit', compact('category'));

    }
    public function update($id, MainCategoryRequest $request)
    {
        try {
            //validation

            //update DB


            $category = Category::find($id);

            if (!$category)
                return redirect()->route('admin.maincategories')->with(['error' => __('admin/sidebar.error_dep')]);

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $category->update($request->all());

            //save translations
            $category->name = $request->name;
            $category->save();

            return redirect()->route('admin.maincategories')->with(['success' => __('admin/sidebar.update_dep')]);
        } catch (\Exception $ex) {

            return redirect()->route('admin.maincategories')->with(['error' => __('admin/sidebar.error')]);
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
