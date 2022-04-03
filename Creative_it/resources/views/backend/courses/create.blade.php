@extends('layouts.backendapp')

@section('title', 'Courses')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">   
@endsection

@section('content')

    @if (session()->has('success'))
        <div class="alert">
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto"><br>Successfully</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>

        </div>
    @endif


    <div class="card col-9 m-auto mt-5">
        <div class="card-header shadow rounded" style="background: #265084;">
            <div class="card-header  d-flex justify-content-between">
                <h2 class="text-white" style="padding-left:25px;"><b> All Courses Items</b></h2>
            </div>
        </div>

        <div class="card-body shadow rounded " style="background: #004450;">

            <form action="{{ route('courses.store') }}" method="POST" class="form"
                enctype="multipart/form-data">
                @csrf

                <div class="mb-3 ">
                    <input type="text" class="form-control" placeholder="Courses Name" class="input"
                        name="courses_title">
                    @error('courses_title')
                        <samp class="text-danger"> {{ $message }}</samp>
                    @enderror
                </div>

                <div class="mb-3">
                    <textarea id="summernote" class="form-control summerNote" placeholder="Courses_description"
                        name="courses_description"></textarea>

                    @error('courses_description')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="file" class="form-control " placeholder="Courses_image" name="courses_image">
                    @error('courses_image')
                        <samp class="text-danger">{{ $message }} </samp>
                    @enderror
                </div>




                <div class="card-header  d-flex justify-content-center">
                    <h2 class="text-white" style="padding-left:25px;"><b> More Courses Items</b></h2>
                </div>



                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="more_courses_title" class="input"
                        name="more_courses_title">
                    @error('more_courses_title')
                        <samp class="text-danger"> {{ $message }}</samp>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="">
                        <h3 class="text-white">Overview</h3>
                    </label>
                    <textarea id="summernote_one" class="form-control summerNote" name="overview"></textarea>
                    @error('overview')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">
                        <h3 class="text-white ">Course Module</h3>
                    </label>
                    <textarea id="summernote_three" class="form-control summerNote"
                        name="course_module"></textarea>
                    @error('course_module')
                        <samp class="text-danger">{{ $message }} </samp>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">
                        <h3 class="text-white ">Software Taught</h3>
                    </label>
                    <textarea id="summernote_four" class="form-control summerNote" 
                        name="software_taught"></textarea>
                    @error('software_taught')
                        <samp class="text-danger">{{ $message }} </samp>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="">
                        <h3 class="text-white ">Duration</h3>
                    </label>
                    <textarea id="summernote_five" class="form-control summerNote"  name="duration"></textarea>
                    @error('duration')
                        <samp class="text-danger">{{ $message }} </samp>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">
                        <h3 class="text-white">Prerequisites</h3>
                    </label>
                    <textarea id="summernote_six" class="form-control summerNote"
                        name="prerequisites"></textarea>
                    @error('prerequisites')
                        <samp class="text-danger">{{ $message }} </samp>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">
                        <h3 class="text-white">Marketplace</h3>
                    </label>
                    <textarea id="summernote_saven" class="form-control summerNote" 
                        name="marketplace"></textarea>
                    @error('marketplace')
                        <samp class="text-danger">{{ $message }} </samp>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">
                        <h3 class="text-white">Career Opportunity</h3>
                    </label>
                    <textarea id="summernote_eight" class="form-control summerNote" 
                        name="career_opportunity"></textarea>
                    @error('career_opportunity')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>




                <div class="mb-3">
                    <input type="file" class="form-control" placeholder="Courses_image" name="big_courses_image">
                    @error('big_courses_image')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>




                <button type="submit" class="btn btn-sm text-white mx-auto" name="submit"
                    style="background:#21556A; padding: 10px 40px; border: 0; font-size: 18px; border-radius: 50px;margin-left: 75px;">
                    Add Courses Items
                </button>


            </form>
        </div>
    </div>





@endsection


