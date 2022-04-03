<?php

namespace App\Http\Controllers\backend\Gallery;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Exists;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::orderBy('Created_at', 'DESC')->get();
        return view('backend.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.gallery.create');
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
            'gallery_name' => 'required|max:20',
            'gallery_image' => 'required|max:5000|mimes:jpg,png,svg,webp,jpeg'
        ]);


        // Images Processing

        $gallery_image =  $request->gallery_image;
        $extension = $gallery_image->getClientOriginalExtension();
        $new_image_name = 'gallery_' . time() . '.' . $extension;

        // Image path create
        $path_one = public_path('/storage/image/');
        $path_two = public_path('/storage/image/gallery');

        if (!file::exists($path_two)) {
            mkdir($path_two);
        }
        // Image Upload 
        $gallery_image->move($path_two, $new_image_name);

        // insert into database 

        $gallery = new Gallery();
        $gallery->gallery_name = $request->gallery_name;
        $gallery->gallery_image = $new_image_name;
        $gallery->save();
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
        $old_galleries_data = Gallery::find($id);
        return view('backend.gallery.edit', compact('old_galleries_data'));
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
            'gallery_name' => 'max:20',
            'gallery_image' => 'max:5000|mimes:jpg,png,svg,webp,jpeg'
        ]);


        if ($request->gallery_image) {
            // Images Processing

            $gallery_image =  $request->gallery_image;
            $extension = $gallery_image->getClientOriginalExtension();
            $new_image_name = 'gallery_' . time() . '.' . $extension;

            // Image path create
            $path_one = public_path('/storage/image/');
            $path_two = public_path('/storage/image/gallery');

            if (!file::exists($path_two)) {
                mkdir($path_two);
            }
            // Image Upload 
            $gallery_image->move($path_two, $new_image_name);

            // Unlink old Image     
            $old_gallery_data = Gallery::find($id);
            $old_gallery_path_one = public_path('/storage/image/');
            $old_gallery_path_two = public_path('/storage/image/gallery/' . $old_gallery_data->gallery_image);

            if (file::exists('$old_gallery_path_two')) {
                unlink('$old_gallery_path_two');
            }

            // insert into database
            $old_gallery_data = Gallery::find($id);
            $old_gallery_data->gallery_name = $request->gallery_name;
            $old_gallery_data->gallery_image = $new_image_name;
            $old_gallery_data->save();
            return redirect(route('gallery.index'))->with('success');
        } else {
            $old_gallery_data = Gallery::find($id);
            $old_gallery_data->gallery_name = $request->gallery_name;
            $old_gallery_data->save();
            return redirect(route('gallery.index'))->with('success');
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
        $gallery = Gallery::find($id);
        $gallery->delete();
        return back();
    }



    public function status($id)
    {
        $gallery_status = Gallery::find($id);

        if ($gallery_status->status == 1) {
            $gallery_status->status = 0;
        } else {
            $gallery_status->status = 1;
        }
        $gallery_status->save();
        return back();
    }


    //trash

    public function trash_gallery()
    {
        $galleries =  Gallery::onlyTrashed()->get();
        return view('backend.gallery.trash_gallery', compact('galleries'));
    }

    public function restore_gallery($id)
    {
        $galleries =  Gallery::onlyTrashed()->find($id);
        $galleries->restore();
        return back();
    }


    public function pre_delete_gallery($id)
    {
        $galleries =  Gallery::onlyTrashed()->find($id);
        $old_gallery_path_one = public_path('/storage/image/');
        $old_gallery_path_two = public_path('/storage/image/gallery/' . $galleries->gallery_image);

        if (file::exists('$old_gallery_path_two')) {
            unlink('$old_gallery_path_two');
        }
        $galleries->forceDelete();
        return back();
    }
}
