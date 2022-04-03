<?php

namespace App\Http\Controllers\backend\About;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Exists;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::orderBY('Created_at', 'DESC')->get();
        return view("backend.about.index", compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.about.create');
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
            'about_name' => 'required|max:20',
            'about_title' => 'required|max:100',
            'about_description' => 'required|max:50000|min:50',
            'about_image' => 'image|mimes:jpg,png,svg,webp,jpeg|max:5000'
        ]);

        // Images Processing
        $about_image = $request->about_image;
        $extension = $about_image->getClientOriginalExtension();
        $new_about_image = 'About_' . time() . '.' . $extension;
        
        // Image Path Create
        
        $path_one = public_path('/storage/image/');
        $path_two = public_path('/storage/image/about/');
        // echo($path_one);
        // exit();
        
        if(!file::exists($path_two)){
            mkdir($path_two);
        }

        $about_image->move($path_two , $new_about_image);

        // insert into database 
        $about = new About();
        $about->about_name = $request->about_name;
        $about->about_title = $request->about_title;
        $about->about_description = $request->about_description;
        $about->about_image = $new_about_image;
        $about->save();
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
        $old_about_data = About::find($id);
        return view('backend.about.edit',compact('old_about_data'));
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
            'about_name' => 'max:20',
            'about_title' => 'max:100',
            'about_description' => 'max:50000|min:50',
            'about_image' => 'image|mimes:jpg,png,svg,webp,jpeg|max:5000'
        ]);

        if($request->about_image){
            
        // Images Processing
        $about_image = $request->about_image;
        $extension = $about_image->getClientOriginalExtension();
        $new_about_image = 'About_' . time() . '.' . $extension;
        
        // Image Path Create
        
        $path_one = public_path('/storage/image/');
        $path_two = public_path('/storage/image/about/');
        // echo($path_one);
        // exit();
        
        if(!file::exists($path_two)){
            mkdir($path_two);
        }
        // Image Upload  
        $about_image->move($path_two , $new_about_image);
        
        //Unlink Old Image
        
        $old_about_data = About::find($id);
        $old_about_path_one = public_path('/storage/image/');
        $old_about_path_two = public_path('/storage/image/about/' . $old_about_data->about_image);
        if(file::exists($old_about_path_two)){
            unlink($old_about_path_two);
        }
        // insert into database
        $old_about_data->about_name = $request->about_name;
        $old_about_data->about_title = $request->about_title;
        $old_about_data->about_description = $request->about_description;
        $old_about_data->about_image = $new_about_image;
        $old_about_data->save();
        return back()->with('success');

        }else{
            $old_about_data = About::find($id,['about_name' ,'about_title','about_description' ]);
            $old_about_data->about_name = $request->about_name;
            $old_about_data->about_title = $request->about_title;
            $old_about_data->about_description = $request->about_description;
            $old_about_data->save();
            return back()->with('success');
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
        $old_about_data = About::find($id);
        $old_about_data->delete();
        return back()->with('success');
    }


  // status Method Start 
   public function status($id){
       $about_status = About::find($id);
       if($about_status->status == 1){
           $about_status->status = 0;
       }else{
           $about_status->status = 1;
       }
       $about_status->save();
       return back()->with('success');
   }


   //trash
   public function trash_about(){
       
    $abouts = About::onlyTrashed()->get();
    return view('backend.about.trash', compact('abouts'));
   }

   public function restore_about($id){
    $about = About::onlyTrashed()->find($id);
    $about->restore();
    return back();
   }

   public function pre_delete_about($id){
    $old_about_data = About::onlyTrashed()->find($id);
    $old_about_path_one = public_path('/storage/image/');
    $old_about_path_two = public_path('/storage/image/about/' . $old_about_data->about_image);
      if(file::exists($old_about_path_two)){
        unlink($old_about_path_two);
     }
     
     $old_about_data->forceDelete();
     return back()->with('success');
   }


    
}
