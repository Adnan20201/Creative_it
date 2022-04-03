<?php

namespace App\Http\Controllers\backend\Seminar;


use Carbon\Carbon;

use App\Models\Seminar;
use App\Models\leed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seminars = Seminar::with('leeds')->select('id','topic')->get();
        return view('backend.seminar.index',compact('seminars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $seminars = Seminar::all();,compact('seminars')
        return view('backend.seminar.create');
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
            'topic' => 'required|unique:seminars,topic',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required'
        
        ]);

          $date = Carbon::parse($request->date)->format('d M Y , l');
          $time = Carbon::parse($request->time)->format('h:i, A');
        // insert into database 

        $seminar = new Seminar();
        $seminar->topic = $request->topic;
        $seminar->date = $date;
        $seminar->time = $time;
        $seminar->save();
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
        $old_seminar_data = Seminar::find($id)->first();
        return view('backend.seminar.edit', compact('old_seminar_data'));
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
            'topic' => 'required|unique:seminars,topic',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|time'
        
        ]);

          $date = Carbon::parse($request->date)->format('d M Y , l');
          $time = Carbon::parse($request->time)->format('h:i, A');
        echo $request->date;
          // insert into database 

        $old_seminar_data = Seminar::find($id);
        $old_seminar_data->topic = $request->topic;
        $old_seminar_data->date = $date;
        $old_seminar_data->time = $time;
        $old_seminar_data->save();
        return redirect(route('seminar.index'))->with('success');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Seminar::find($id);
        $destroy->delete();
        return back();
    }

    public function join_seminar(){
        $seminars = Seminar::select('id','topic')->where('status', 1)->get();
        // dd($seminars);
        return view('frontend.seminar_join', compact('seminars'));
    }
    
    


    public function delete_seminar(){
        $seminars = Seminar::all();
        return view('backend.seminar.delete',compact('seminars'));
    }


    
    //trash seminar
    
    public function trash_seminar(){
        $seminars = Seminar::onlyTrashed()->get();
        return view('backend.seminar.trash_seminar',compact('seminars'));
    } 

    public function restore_seminar($id)
    {
        $seminars = Seminar::onlyTrashed()->find($id);
        $seminars->restore();
        return back();
    }

    public function pre_delete_seminar(){
        $seminars = Seminar::onlyTrashed()->find($id);
        $seminars->forceDelete();
        return back()->with('success');
    }
    
//trash leed

    // $leeds = Leed::onlyTrashed()->get();
    
//    public function trash_leed(){
//     return view('');
//   }



    
}
