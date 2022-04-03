<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\Banner;
use App\Models\Courses;
use App\Models\Gallery;
use App\Models\Seminar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(){
      //Banner
      $all_banner = Banner::where('status', 1)->orderBy('created_at', 'DESC')->get();
      
      //About
      $all_about = About::where('status', 1)->orderBy('created_at', 'DESC')->first();
        // dd($all_about);
        
      //Seminar
      $all_seminar = Seminar::where('status' , 1)->get();
      // dd($all_seminar);

      //gallery 

      $all_gallery = Gallery::where('status' , 1)->latest()->get();
      // dd($all_gallery);


      $all_courses = Courses::where('status' , 1)->latest()->get(); 
      
        return view('frontend.landing', Compact('all_banner','all_about','all_seminar','all_gallery','all_courses'));
    }
}
