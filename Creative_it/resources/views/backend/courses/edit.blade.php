@extends('layouts.backendapp')

@section('title', 'Courses Edit')

<!-- Style Start -->

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
                <h2 class="text-white" style="padding-left:25px;"><b> Edit Courses Items</b></h2>
            </div>
        </div>

        <div class="card-body shadow rounded " style="background: #004450;">

            <form action="{{ route('courses.update', $old_courses_data->id) }}" method="POST" class="form"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 ">
                    <input type="text" class="p-3 form-control" placeholder="Courses Name" class="input"
                        name="courses_title" value="{{ $old_courses_data->courses_title }}">
                    @error('courses_title')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <textarea id="summernote" class="p-3 form-control" placeholder="Courses_description" name="courses_description">{{ $old_courses_data->courses_description }}
                      </textarea>
                    @error('courses_description')
                        <p class="text-danger">{{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="file" class="form-control p-2" placeholder="Courses_image" name="courses_image">
                    <img src="{{ asset('/storage/image/courses/' . $old_courses_data->courses_image) }}" alt=""
                        style="height: 60px; width:120px; margin-right:auto; margin:5px;">

                    @error('courses_image')
                        <p class="text-danger">{{ $message }} </p>
                    @enderror
                </div>




                <div class="card-header  d-flex justify-content-center">
                    <h2 class="text-white" style="padding-left:25px;"><b> More Courses Items</b></h2>
                </div>



                <div class="mb-3">
                    <input type="text" class="p-3 form-control" placeholder="more_courses_title" class="input"
                        name="more_courses_title" value="{{ $old_courses_data->more_courses_title }}">
                    @error('more_courses_title')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="">
                        <h3 class="text-white">Overview</h3>
                    </label>
                    <textarea id="summernote_one" class="p-3 form-control" placeholder="Overview" name="overview">
                      {{ $old_courses_data->overview }}
                    </textarea>
                    @error('overview')
                        <p class="text-danger">{{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">
                        <h3 class="text-white ">Course Module</h3>
                    </label>
                    <textarea id="summernote_two" class="p-3 form-control" placeholder=" Course Module" name="course_module">
                      {{ $old_courses_data->course_module }}
                    </textarea>
                    @error('course_module')
                        <p class="text-danger">{{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">
                        <h3 class="text-white ">Software Taught</h3>
                    </label>
                    <textarea id="summernote_three" class="p-3 form-control" placeholder="Software Taught" name="software_taught">
                      {{ $old_courses_data->software_taught }}
                    </textarea>
                    @error('software_taught')
                        <p class="text-danger">{{ $message }} </p>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="">
                        <h3 class="text-white ">Duration</h3>
                    </label>
                    <textarea id="summernote_five" class="p-3 form-control" placeholder="Software Taught" name="duration">
                      {{ $old_courses_data->duration }}
                    </textarea>
                    @error('duration')
                        <p class="text-danger">{{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">
                        <h3 class="text-white">Prerequisites</h3>
                    </label>
                    <textarea id="summernote_six" class="p-3 form-control" placeholder="Software Taught" name="prerequisites">
                      {{ $old_courses_data->prerequisites }}
                    </textarea>
                    @error('prerequisites')
                        <p class="text-danger">{{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">
                        <h3 class="text-white">Marketplace</h3>
                    </label>
                    <textarea id="summernote_saven" class="p-3 form-control" placeholder="Software Taught" name="marketplace">
                      {{ $old_courses_data->marketplace }}
                    </textarea>
                    @error('marketplace')
                        <p class="text-danger">{{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">
                        <h3 class="text-white">Career Opportunity</h3>
                    </label>
                    <textarea id="summernote_eight" class="p-3 form-control" placeholder="Software Taught" name="career_opportunity">
                      {{ $old_courses_data->career_opportunity }}
                    </textarea>
                    @error('career_opportunity')
                        <p class="text-danger">{{ $message }} </p>
                    @enderror
                </div>


                <div class="mb-3">
                    <input type="file" class="form-control p-2" placeholder="Courses_image" name="big_courses_image">
                    <img src="{{ asset('/storage/image/courses/' . $old_courses_data->big_courses_image) }}" alt=""
                        style="height: 60px; width:120px; margin-right:auto; margin:5px;">

                    @error('big_courses_image')
                        <p class="text-danger">{{ $message }} </p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-sm text-white mx-auto" name="submit"
                    style="background:#21556A; padding: 10px 40px; border: 0; font-size: 18px; border-radius: 50px;margin-left: 75px;">Add
                    Courses Items</button>
            </form>
        </div>
    </div>





@endsection

@section('cost.js')

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, ',
                tabsize: 1,
                height: 50
            });
        });
    </script>
@endsection
