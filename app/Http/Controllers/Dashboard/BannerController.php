<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Http\Requests\BannerImagesRequest;

use App\Models\Banner;
use Illuminate\Http\Request;
use DB;

class BannerController extends Controller
{


    public function addImages()
    {

         $images = Banner::get(['photo']);
        return view('dashboard.banners.images.create', compact('images'));
    }

    //to save images to folder only
    public function saveBannerImages(Request $request)
    {

        $file = $request->file('dzfile');
        $filename = uploadImage('banners', $file);

        return response()->json([
            'name' => $filename,
            'original_name' => $file->getClientOriginalName(),
        ]);

    }

    public function saveBannerImagesDB(BannerImagesRequest $request)
    {

        try {
            // save dropzone images
            if ($request->has('document') && count($request->document) > 0) {
                foreach ($request->document as $image) {
                    Banner::create([
                        'photo' => $image,
                    ]);
                }
            }

            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $ex) {

        }
    }

}
