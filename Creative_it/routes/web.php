<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\Leed\LeedController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\backend\About\AboutController;
use App\Http\Controllers\backend\Banner\BannerController;
use App\Http\Controllers\backend\Contact\ContactController;
use App\Http\Controllers\backend\Courses\CoursesController;
use App\Http\Controllers\backend\Gallery\GalleryController;
use App\Http\Controllers\backend\Header\HeaderController;
use App\Http\Controllers\backend\Seminar\SeminarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'index'])->name('index');

//
Auth::routes(['verify'=> true]);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


//header
Route::put('/header/status/{id}' , [HeaderController::class,'status'])->name('header.status');
Route::resource('/header',HeaderController::class);


//Banner
Route::put('/banner/status/{id}', [BannerController::class, 'status'])->name('banner.status');
Route::get('/trash/banner', [BannerController::class , 'trash_banner'])->name('banner.trash');
Route::get('/trash/restore/banner/{id}' ,[BannerController::class , 'restore_banner'])->name('banner.restore');
Route::DELETE('/trash/permanent_delete/banner{id}',[BannerController::class , 'pre_delete_banner'])->name('banner.pre.delete');
Route::resource('/banner', BannerController::class);

// About
Route::PUT('/about/status/{id}', [AboutController::class ,'status'])->name('about.status');
Route::get('/trash/about',[AboutController::class , 'trash_about'])->name('about.trash');
Route::get('//trash/restore/about/{id}' , [AboutController::class , 'restore_about'])->name('about.restore');
Route::DELETE('/trash/permanent_delete/about/{id}' ,[AboutController::class , 'pre_delete_about'])->name('about.pre.delete');
Route::resource('/about' , AboutController::class);


//seminar
Route::get('/seminar/join', [SeminarController::class , 'join_seminar'])->name('seminar.join');
Route::get('/delete/seminar' , [SeminarController::class, 'delete_seminar'])->name('seminar.delete');
Route::get('/trash/seminar' , [SeminarController::class, 'trash_seminar'])->name('seminar.trash');
Route::get('/trash/restore/seminar/{id}' ,[SeminarController::class, 'restore_seminar'])->name('seminar.restore');
Route::DELETE('/trash/permanent_delete/seminar/{id}' ,[SeminarController::class , 'pre_delete_seminar'])->name('seminar.pre.delete');
Route::resource('/seminar', SeminarController::class);

//leed
// Route::get('/trash/leed' , [LeedController::class, 'trash_leed'])->name('leed.trash');
Route::get('/trash/restore/leed/{id}' ,[LeedController::class, 'restore_leed'])->name('leed.restore');
Route::DELETE('/trash/permanent_delete/leed/{id}' ,[LeedController::class , 'pre_delete_leed'])->name('leed.pre.delete');
Route::resource('/leeds', LeedController::class);


//Gallery
Route::PUT('/gallery/status/{id}', [GalleryController::class , 'status'])->name('gallery.status');
Route::get('/trash/gallery' ,[GalleryController::class ,'trash_gallery'])->name('gallery.trash');
Route::get('/trash/restore/gallery/{id}', [GalleryController::class , 'restore_gallery'])->name('gallery.restore');
Route::DELETE('/trash/permanent_delete/gallery/{id}' ,[GalleryController::class , 'pre_delete_gallery'])->name('gallery.pre.delete');
Route::resource('/gallery', GalleryController::class);


//Courses 
Route::PUT('/courses/status/{id}' , [CoursesController::class, 'status'])->name('courses.status');
Route::get('/courses-view/{id}', [CoursesController::class , 'courses_details'])->name('courses.details');
Route::resource('/courses', CoursesController::class);


//Contact
// Route::PUT('/contact/status/{id}', [ContactController::class, 'status'])->name('contact.status');
Route::resource('/contact', ContactController::class);
