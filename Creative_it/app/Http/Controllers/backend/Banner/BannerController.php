<?php

namespace App\Http\Controllers\backend\Banner;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Exists;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('Created_at', 'DESC')->get();
        return view('backend.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'banner_name' => 'required|max:30',
            'banner_image' => 'required|max:5000|mimes:jpg,png,svg,webp,jpeg'
        ]);

        // Images Processing
        $extension = $request->banner_image->getClientOriginalExtension();
        $new_banner_name = 'banner_' . time() . '.' . $extension;

        // Image path create 

        $path_one = public_path('/storage/image/');
        $path_two = public_path('/storage/image/banner');

        if (!File::exists($path_two)) {
            mkdir($path_two);
        }

        // Image Upload
        $request->banner_image->move($path_two, $new_banner_name);

        // insert into database 

        $banner = new Banner();
        $banner->banner_name = $request->banner_name;
        $banner->banner_image = $new_banner_name;
        $banner->save();
        return back()->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $old_banner_data = Banner::find($id);
        return view('backend.banner.edit', compact('old_banner_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'banner_name' => 'max:30',
            'banner_image' => 'max:5000|mimes:jpg,png,svg,webp,jpeg'
        ]);

        if ($request->banner_image) {

            // Images Processing
            $extension = $request->banner_image->getClientOriginalExtension();
            $new_banner_name = 'banner_' . time() . '.' . $extension;

            // Image path create
            $path_one = public_path('/storage/image/');
            $path_two = public_path('/storage/image/banner');

            if (!File::exists($path_two)) {
                mkdir($path_two);
            }

            // Image Upload 
            $request->banner_image->move($path_two, $new_banner_name);

            // Unlink old Image     
            $old_banner_data = Banner::find($id);
            $old_banner_path_one = public_path('/storage/image/');
            $old_banner_path_two = public_path('/storage/image/banner/' . $old_banner_data->banner_image);

            if (file::exists($old_banner_path_two)) {
                unlink($old_banner_path_two);
            }

            // insert into database
            $old_banner_data->banner_name = $request->banner_name;
            $old_banner_data->banner_image = $new_banner_name;
            $old_banner_data->save();
            return redirect(route('banner.index'))->with('success');
        } else {
            $old_banner_data = Banner::find($id);
            $old_banner_data->banner_name = $request->banner_name;
            $old_banner_data->save();
            return redirect(route('banner.index'))->with('success');
        }
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::Find($id);
        $banner->delete();
        return back()->with('success');
    }


    // status Method Start

    public function status($id)
    {
        $banner_status = Banner::Find($id);
        if ($banner_status->status == 1) {
            $banner_status->status = 0;
        } else {
            $banner_status->status = 1;
        }
        $banner_status->save();
        return back()->with('success');
    }


    //trash 
    public function trash_banner()
    {
        $banners = Banner::onlyTrashed()->get();
        return view('backend.banner.trash', compact('banners'));
    }

    public function restore_banner($id)
    {
        $banner = Banner::onlyTrashed()->find($id);
        $banner->restore();
        return back();
    }

    public function pre_delete_banner($id)
    {
        $banner = Banner::onlyTrashed()->find($id);
        $old_banner_data_one = public_path('/storage/image/');
        $old_banner_data_two = public_path('/storage/image/banner/' . $banner->banner_image);

        if (file::exists($old_banner_data_two)) {
            unlink($old_banner_data_two);
        }
        $banner->forceDelete();
        return back()->with('success');
    }
}
