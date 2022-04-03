<?php

namespace App\Http\Controllers\backend\Courses;

use App\Models\Courses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Exists;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::orderBy('Created_at', 'DESC')->get();
        return view('backend.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.courses.create');
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
            'courses_title' => 'required|max:40',
            'courses_description' => 'required|max:50000|min:3',
            'courses_image' => 'required|max:50000|mimes:jpg,png,svg,webp,jpeg',
            'big_courses_image' => 'required|max:50000|mimes:jpg,png,svg,webp,jpeg',
            'more_courses_title' => 'required|max:40',
            'overview' => 'required',
            'course_module' => 'required',
            'software_taught' => 'required',
            'duration' => 'required',
            'prerequisites' => 'required',
            'marketplace' => 'required',
            'career_opportunity' => 'required',

        ]);

        // Images Processing


        //courses_image
        $courses_image = $request->courses_image;
        $extension = $courses_image->getClientOriginalExtension();
        $new_courses_image = 'courses_' . time() .  '.' . $extension;
        $courses_path_one = public_path('/storage/image/');
        $courses_path_two = public_path('/storage/image/courses');

        if (!file::exists($courses_path_two)) {
            mkdir($courses_path_two);
        }
        $courses_image->move($courses_path_two, $new_courses_image);



        //BIG_courses_image
        $big_courses_image = $request->big_courses_image;
        $extension = $big_courses_image->getClientOriginalExtension();
        $new_big_courses_image = 'courses_big_' . time() .  '.' . $extension;
        $big_courses_path_one = public_path('/storage/image/');
        $big_courses_path_two = public_path('/storage/image/courses');

        if (!file::exists($big_courses_path_two)) {
            mkdir($big_courses_path_two);
        }
        $big_courses_image->move($big_courses_path_two, $new_big_courses_image);

        // insert into database 
        $courses = new Courses();
        $courses->courses_image = $new_courses_image;
        $courses->big_courses_image = $new_big_courses_image;
        $courses->courses_title = $request->courses_title;
        $courses->courses_description = $request->courses_description;
        $courses->more_courses_title = $request->more_courses_title;
        $courses->overview = $request->overview;
        $courses->course_module = $request->course_module;
        $courses->software_taught = $request->software_taught;
        $courses->duration = $request->duration;
        $courses->prerequisites = $request->prerequisites;
        $courses->marketplace = $request->marketplace;
        $courses->career_opportunity = $request->career_opportunity;
        $courses->save();
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
        $old_courses_data = Courses::find($id);
        return view('backend.courses.edit', compact('old_courses_data'));
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
            'courses_title' => 'required|max:40',
            'courses_description' => 'required|max:50000|min:3',
            'courses_image' => 'required|max:50000|mimes:jpg,png,svg,webp,jpeg',
            'big_courses_image' => 'required|max:50000|mimes:jpg,png,svg,webp,jpeg',
            'more_courses_title' => 'required|max:40',
            'overview' => 'required',
            'course_module' => 'required',
            'software_taught' => 'required',
            'duration' => 'required',
            'prerequisites' => 'required',
            'marketplace' => 'required',
            'career_opportunity' => 'required',

        ]);

        if ($request->courses_image || $request->big_courses_image) {

            // Images Processing
            $courses_image = $request->courses_image;
            $extension = $courses_image->getClientOriginalExtension();
            $new_courses_image = 'courses_' . time() .  '.' . $extension;
            $courses_path_one = public_path('/storage/image/');
            $courses_path_two = public_path('/storage/image/courses');

            if (!file::exists($courses_path_two)) {
                mkdir($courses_path_two);
            }
            $courses_image->move($courses_path_two, $new_courses_image);


            //BIG_courses_image
            $big_courses_image = $request->big_courses_image;
            $extension = $big_courses_image->getClientOriginalExtension();
            $new_big_courses_image = 'courses_big_' . time() .  '.' . $extension;
            $big_courses_path_one = public_path('/storage/image/');
            $big_courses_path_two = public_path('/storage/image/courses');

            if (!file::exists($big_courses_path_two)) {
                mkdir($big_courses_path_two);
            }
            $big_courses_image->move($big_courses_path_two, $new_big_courses_image);


            // Unlink old Image
            $old_courses_data = Courses::find($id);
            $courses_path_one = public_path('/storage/image/');
            $courses_path_two = public_path('/storage/image/courses/' . $old_courses_data->courses_image);

            if (file::exists($courses_path_two)) {
                unlink($courses_path_two);
            }



            //Unlink old Image
            $old_courses_data = Courses::find($id);
            $big_courses_path_one = public_path('/storage/image/');
            $big_courses_path_two = public_path('/storage/image/courses/' . $old_courses_data->big_courses_image);

            if (file::exists($big_courses_path_two)) {
                unlink($big_courses_path_two);
            }

            // insert into database 
            $old_courses_data->courses_image = $new_courses_image;
            $old_courses_data->big_courses_image = $new_big_courses_image;
            $old_courses_data->courses_title = $request->courses_title;
            $old_courses_data->courses_description = $request->courses_description;
            $old_courses_data->more_courses_title = $request->more_courses_title;
            $old_courses_data->overview = $request->overview;
            $old_courses_data->course_module = $request->course_module;
            $old_courses_data->software_taught = $request->software_taught;
            $old_courses_data->duration = $request->duration;
            $old_courses_data->prerequisites = $request->prerequisites;
            $old_courses_data->marketplace = $request->marketplace;
            $old_courses_data->career_opportunity = $request->career_opportunity;
            $old_courses_data->save();
            return redirect(route('courses.index'))->with('success');
        } else {
            // insert into database  

            $old_courses_data = Courses::find($id);
            $old_courses_data->courses_title = $request->courses_title;
            $old_courses_data->courses_description = $request->courses_description;
            $old_courses_data->more_courses_title = $request->more_courses_title;
            $old_courses_data->overview = $request->overview;
            $old_courses_data->course_module = $request->course_module;
            $old_courses_data->software_taught = $request->software_taught;
            $old_courses_data->duration = $request->duration;
            $old_courses_data->prerequisites = $request->prerequisites;
            $old_courses_data->marketplace = $request->marketplace;
            $old_courses_data->career_opportunity = $request->career_opportunity;
            $old_courses_data->save();
            return redirect(route('courses.index'))->with('success');
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
        $courses = Courses::find($id);
        $courses->delete();
        return back();
    }


    // status Method Start

    public function status($id)
    {

        $courses_status = Courses::find($id);
        if ($courses_status->status == 1) {
            $courses_status->status = 0;
        } else {
            $courses_status->status = 1;
        }
        $courses_status->save();
        return back()->with('success');
    }


    //courses details
    public function courses_details($id)
    {
        $courses = Courses::where('id', $id)->where('status', 0)->get();
        return view('frontend.course_details', compact('courses'));
    }
}
