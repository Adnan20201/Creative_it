@extends('layouts.frontendapp')

@section('content')
    <!--============== breadcumb Part Goes Here ================-->
    <section id="breadcumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcumb text-center">
                        <h2>Course Details</h2>
                        <h6><a href="https://creativeitinstitutectg.com">Home</a> <i class="fa fa-chevron-right"></i>
                            Professional Graphic Design</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============== Course Details Part Goes Here ================-->
    <section id="course-details" class="pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="head pb-lg-2">
                        <h2>Professional Graphic Design</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    {{-- <img src="{{ asset('/storage/image/courses/'. $courses->big_courses_image) }}" --}}
                        {{-- class="img-fluid w-100" alt="Professional Graphic Design"> --}}
                </div>
                <div class="col-lg-12 pt-lg-3">
                    <div class="content-desp">
                        <div class="head">
                            {{-- <h2>{{ $courses->overview }}</h2> --}}
                        </div>
                        <div class="overview-details">
                            <p>Graphic Design is always considered to be the brand identity of a business.
                                Wherever you look around yourself, you will be able to find the works of graphic
                                design everywhere. It’s all about putting your thought of creativity into a system.
                                Be it a business card, or be it a banner. All are the individual parts of graphic
                                design. Our Creative IT Institute gives you the best training in graphic design in
                                Chattogram.</p>
                            <p>If you are wondering about the difference between the training quality
                                of the capital city and that of Chattogram city, let us ensure that both modules of
                                both branches are the same. Through Creative E-School, our expert trainers take
                                classes all over Bangladesh. So no worry about the quality of our training.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="content-desp border-0">
                        <div class="head">
                            <h2>Course Module</h2>
                        </div>
                        <div class="overview-details">
                            <div class="apply-item">
                                <p>Social Media Banner Design</p>
                                <p>Raster to Vector</p>
                                <p>Business Card</p>
                                <p>Invoice Template Design</p>
                                <p>Letterhead Design</p>
                                <p>Envelope Design</p>
                                <p>ID Card Design</p>
                                <p>Flyer Design</p>
                                <p>Brochure Layout</p>
                                <p>Logo Design</p>
                                <p>Desk & Wall Calendar Design</p>
                                <p>Product Packaging</p>
                                <p>Product Label Design</p>
                                <p>T-Shirt Design</p>
                                <p>Mug Design</p>
                                <p>Pillow Cover Design</p>
                                <p>Facebook Cover Photo Resize</p>
                                <p>Landscape Design</p>
                                <p>Image Retouch</p>
                                <p>Image clipping</p>
                                <p>Web Banner Design</p>
                                <p>Web UI Design</p>
                            </div>
                        </div>
                    </div>
                    <div class="content-desp border-0">
                        <div class="head">
                            <h2>Marketplace</h2>
                        </div>
                        <div class="overview-details">
                            <div class="apply-item">
                                <p>Fiverr</p>
                                <p>Freelancer</p>

                                <p>Shutterstock</p>
                                <p>Adobe Stock</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="content-desp border-0">
                        <div class="head">
                            <h2>Software Taught</h2>
                        </div>
                        <div class="overview-details">
                            <div class="apply-item">
                                <p>Adobe Photoshop</p>
                                <p>Adobe Illustrator</p>
                            </div>
                        </div>
                    </div>
                    <div class="content-desp border-0">
                        <div class="head">
                            <h2>Duration</h2>
                        </div>
                        <div class="overview-details">
                            <div class="apply-item">
                                <p>Duration: 4 Months</p>
                                <p>Total Class - 32</p>
                                <p>(2 hours a Day, 2 Days in a Week)</p>
                            </div>
                        </div>
                    </div>
                    <div class="content-desp border-0">
                        <div class="head">
                            <h2>Prerequisites</h2>
                        </div>
                        <div class="overview-details">
                            <div class="apply-item">
                                <p>Basic Knowledge on Using Computer</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-12">
                    <div class="content-desp border-0">
                        <div class="head">
                            <h2>Career Opportunity</h2>
                        </div>
                        <div class="overview-details">
                            <div class="apply-item">
                                <span>There are several types of career opportunities of a graphic designer both in the
                                    local marketplace and international marketplace. On the one hand, a graphic
                                    designer can work in any company where design and visual is prioritized. For
                                    promoting &amp; exhibiting any business or product, graphic design is a must. On the
                                    other hand, there are an innumerable job opportunities in international
                                    marketplaces, where graphic designers can work independently. All they have to
                                    do is connect with the appropriate buyers or clients &amp; work accordingly. It’s such a
                                    convenient way to build anyone’s future. Graphic designers can reconnoiter their career
                                    in the different areas representing multiple titles like:</span>
                                <div class="pt-lg-2 pb-lg-3">
                                    <p>Graphics Designer</p>
                                    <p>Creative Director</p>
                                    <p>Creative Executive</p>
                                    <p>Brand Promoter</p>
                                    <p>Photoshop Artist</p>
                                    <p>Logo Designer</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </section>

   
@endsection
