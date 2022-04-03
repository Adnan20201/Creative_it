<?php

namespace App\Http\Controllers\backend\Header;

use App\Models\header;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Exists;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headers = header::orderBY('Created_at', 'DESC')->get();
        return view('backend.header.index', compact('headers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.header.create');
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
            'notice' => 'required|max:33',
            'notice_title' => 'required|max:600',
            'logo' => 'required|max:5000|mimes:jpg,png,svg,webp,jpeg',
        ]);

        // Images Processing

        $logo =  $request->logo;
        $extension = $logo->getClientOriginalExtension();
        $new_logo_name = 'logo_' . time() .  '.' . $extension;

        $logo_path_one = public_path('/storage/image/');
        $logo_path_two = public_path('/storage/image/logo');

        if (!file::exists('$logo_path_two')) {
            mkdir('$logo_path_two');
        }

        $logo->move($logo_path_two, $new_logo_name);

        // insert into database 

        $header = new header();
        $header->notice = $request->notice;
        $header->notice_title = $request->notice_title;
        $header->logo = $new_logo_name;
        $header->save();
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
        $old_header_data = header::find($id);
        return view('backend.header.edit', compact('old_header_data'));
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
            'notice' => 'required|max:33',
            'notice_title' => 'required|max:600',
            'logo' => 'required|max:5000|mimes:jpg,png,svg,webp,jpeg',
        ]);

        if ($request->logo) {

            // Images Processing
            $logo =  $request->logo;
            $extension = $logo->getClientOriginalExtension();
            $new_logo_name = 'logo_' . time() .  '.' . $extension;

            $logo_path_one = public_path('/storage/image/');
            $logo_path_two = public_path('/storage/image/logo');

            if (!file::exists('$logo_path_two')) {
                mkdir('$logo_path_two');
            }

            $logo->move($logo_path_two, $new_logo_name);


            //Unlink Old Image
            $old_header_data = header::find($id);
            $old_logo_path_one = public_path('/storage/image/');
            $old_logo_path_two = public_path('/storage/image/logo/' . $old_header_data->logo);

            if (file::exists($old_logo_path_two)) {
                unlink($old_logo_path_two);
            }

            // insert into database
            $old_header_data->notice = $request->notice;
            $old_header_data->notice_title = $request->notice_title;
            $old_header_data->logo = $new_logo_name;
            $old_header_data->save();
            return redirect(route('header.index'))->with('success');
        }else{
            $old_header_data = header::find($id);
            $old_header_data->notice = $request->notice;
            $old_header_data->notice_title = $request->notice_title;
            $old_header_data->save();
            return redirect(route('header.index'))->with('success');
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
        $header = header::find($id);
        $header->delete();
        return back()->with('success');
    }


    //Status

    public function status($id)
    {
        $header_status = header::find($id);
        if ($header_status->status == 1) {
            $header_status->status = 0;
        } else {
            $header_status->status = 1;
        }
        $header_status->save();
        return back()->with('success');
    }


    //trash 
    
}
