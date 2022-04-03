@extends('layouts.frontendapp')

@section('content')
    <!--============== Banner Part Goes Here ================-->
    <section id="banner">
        <div class="slider-main">

            @foreach ($all_banner as $banner)
                <div class="slider-item">
                    <img src="{{ asset('/storage/image/banner/' . $banner->banner_image) }}"
                        alt="{{ $banner->banner_name }}" class="w-100">
                </div>
            @endforeach

        </div>
    </section>



    <!--============== About Part Goes Here ================-->


    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 order-lg-2">
                    <div class="about-text">
                        <h2>{{ $all_about->about_title }}</h2>
                        <p>{!! $all_about->about_description !!}</p>
                    </div>
                </div>
                <div class="col-lg-5 pl-lg-0 order-lg-1">
                    <div class="about-img">
                        <img src="{{ asset('/storage/image/about/' . $all_about->about_image) }}"
                            alt="{{ $all_about->about_name }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>







    <!--============== Seminar Part Goes Here ================-->
    <section id="seminar" class="mt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 px-0">
                    <div class="card border-0">
                        <div class="card-header text-center">
                            Upcoming Seminar Schedule
                        </div>
                        <div class="card-body text-center">
                            <div class="table-responsive seminar-table seminar-modal">
                                <table class="table table-striped mt-3 table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Topic</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($all_seminar as $seminar)
                                            <tr>
                                                <td>{{ $seminar->topic }}</td>
                                                <td>{{ $seminar->date }}</td>
                                                <td>{{ $seminar->time }}</td>
                                                <td>
                                                    <a href=" {{ route('seminar.join') }}" class="btn-sm">Join</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <h3 class="text-align-center ms-auto">No data available in table</h3>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--============== Courses Part Goes Here ================-->
    <section id="courses">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 px-sm-0">
                    <div class="courses-head">
                        <h2>Our Courses</h2>
                        <p>Explore the weapons of Latest Information Technology!</p>
                    </div>
                </div>
            </div>

            <div class="row">

                @foreach ($all_courses as $key => $courses)
                    <div class="col-lg-6 pl-md-0">
                        <div class="row course-item mx-md-0">
                            <div class="col-lg-7 col-md-9 col-sm-7 px-md-0">
                                <div class="gd-left">
                                    <h3>{{ $courses->courses_title }}</h3>
                                    <p>{{ $courses->courses_description }}</p>
                                </div>
                                <a href="{{ route('courses.details', $courses->id) }}">
                                    <div class="seat">
                                        <p>Read More </p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-5 col-md-3 col-sm-5 pr-0">
                                <div class="gd-right">
                                    <img src="{{ asset('/storage/image/courses/' . $courses->courses_image) }}"
                                        alt="{{ $courses->courses_title }}" class="img-fluid w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>


    <!--============== Gallery Part Goes Here ================-->
    <section id="gallery" class="py-lg-5">
        <div class="container px-sm-0">
            <div class="row">
                <div class="col-lg-12 pt-sm-3 pt-md-0">
                    <div class="courses-head">
                        <h2>Our Gallery</h2>
                        <p>Explore the weapons of Latest Information Technology!</p>
                    </div>
                </div>
            </div>
            <div class="row px-lg-0">
                @foreach ($all_gallery as $gallery)
                    <div class="col-lg-4 col-sm-6 col-md-4">
                        <div class="gal-img">
                            <a href="#" data-lightbox="roadtrip">
                                <img src="{{ asset('/storage/image/gallery/' . $gallery->gallery_image) }}"
                                    alt="{{ $gallery->gallery_name }}" class="img-fluid w-100">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!--============== Contact Form Part Goes Here ================-->
    <section id="form" class="p-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 px-md-0">
                    <div class="courses-head">
                        <h2>Contact Us</h2>
                        <p>Please fillup the form and submit your query.</p>
                    </div>
                </div>
            </div>

            <form action="{{ route('contact.store') }}" method="POST" id="contact_form">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 pl-lg-0">
                        <div class="form-group pt-lg-2">
                            <input type="text" name="name" class="form-control" placeholder="Enter Your Fullname">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group pt-lg-2">
                            <input type="text" name="email" class="form-control" placeholder="Enter Your Email Address">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 pl-lg-0">
                        <div class="form-group pt-lg-2">
                            <input type="text" name="phone" class="form-control" placeholder="Enter Your Mobile Number">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group pt-lg-2">
                            <input type="text" name="address" class="form-control" placeholder="Your Address">
                        </div>
                    </div>
                    <div class="col-lg-12 pl-lg-0">
                        <div class="form-group pt-lg-2">
                            <textarea class="form-control pb-5" name="message" placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group text-center pt-lg-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
