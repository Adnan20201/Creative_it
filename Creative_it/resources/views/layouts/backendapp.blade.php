<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Creative Dashbroad</title>

    <link rel="icon" href="img/mini_logo.png" type="image/png">
    <!-- Bootstrap CSS -->
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- text editor css -->
    {{-- <link rel="stylesheet" href="{{ asset('backend/vendors/text_editor/summernote-bs4.css') }}" /> --}}

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <!-- themefy CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/themify-icons.css') }}" />
    <!-- select2 CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/nice-select.css') }}" />
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('backend/js/owl.carousel.min.js') }}" />
    <!-- gijgo css -->
    <link rel="stylesheet" href="{{ asset('backend/css/gijgo.min.css') }}" />
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('backend/vendors/tagsinput/tagsinput.css') }}" />

    <!-- date picker -->
    <link rel="stylesheet" href="{{ asset('backend/vendors/datepicker/date-picker.css') }}" />

    <link rel="stylesheet" href="{{ asset('backend/vendors/vectormap-home/vectormap-2.0.2.css') }}" />

    <!-- scrollabe  -->
    <link rel="stylesheet" href="{{ asset('backend/vendors/scroll/scrollable.css') }}" />
    <!-- datatable CSS -->
    <link rel="stylesheet" href="{{ asset('backend/vendors/datatable/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/vendors/datatable/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/vendors/datatable/css/buttons.dataTables.min.css') }}" />

    <!-- morris css -->
    <link rel="stylesheet" href="{{ asset('backend/vendors/morris/morris.css') }}">
    <!-- metarial icon css -->
    <link rel="stylesheet" href="{{ asset('backend/vendors/material_icon/material-icons.css') }}" />

    <!-- menu css  -->
    <link rel="stylesheet" href="{{ asset('backend/css/metisMenu.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/colors/default.css') }}" id="colorSkinCSS">

    @yield('css')

</head>

<body class="crm_body_bg">



    <!-- main content part here -->

    <!-- sidebar  -->
    <nav class="sidebar">
        <div class="logo d-flex justify-content-between">
            <a class="large_logo shadow rounded-3" href="#"><img src="{{ asset('backend/img/index.png') }}" alt=""
                    style="width:210px"></a>
            <a class="small_logo shadow rounded-3" href="#"><img src="{{ asset('backend/img/index.png') }}" alt=""
                    style="width: 120px"></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li class="">
                <a class="has-arrow boos" href="{{ route('dashboard') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="bi bi-archive-fill"></i>
                    </div>
                    <div class="nav_title">
                        <span>Creative Dashbroad</span>
                    </div>
                </a>
                <ul>
                    {{-- <li><a href="index_2.html">Default</a></li>
                    <li><a href="index_3.html">Dark Sidebar</a></li>
                    <li><a href="index.html">Light Sidebar</a></li> --}}
                </ul>
            </li>

                <!-- Header -->
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="bi bi-image-fill"></i>
                    </div>
                    <div class="nav_title">
                        <span>Header</span>
                    </div>
                </a>
                <ul>
                    <li><a href="{{ route('header.create') }}"></a> Add Header </li>
                    <li><a href="{{ route('header.index') }}"></a> All Header </li>
                </ul>
            </li>

            <!-- Banner -->
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="bi bi-image-fill"></i>
                    </div>
                    <div class="nav_title">
                        <span>Banner</span>
                    </div>
                </a>
                <ul>
                    <li><a href="{{ route('banner.create') }}"></a> Add Banner </li>
                    <li><a href="{{ route('banner.index') }}"></a> All Banner </li>
                    <li><a href="{{ route('banner.trash') }}"></a> Trash Banner </li>
                </ul>
            </li>

            <!-- Aboute -->
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="bi bi-file-person-fill"></i>
                    </div>
                    <div class="nav_title">
                        <span>About</span>
                    </div>
                </a>
                <ul>
                    <li><a href="{{ route('about.create') }}"></a> Add About </li>
                    <li><a href="{{ route('about.index') }}"></a> All About </li>
                    <li><a href="{{ route('about.trash') }}"></a> Trash About </li>
                </ul>
            </li>

            <!-- Seminar -->
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="bi bi-file-person-fill"></i>
                    </div>
                    <div class="nav_title">
                        <span>Seminar</span>
                    </div>
                </a>
                <ul>
                    <li><a href="{{ route('seminar.create') }}"></a> Add Seminar </li>
                    <li><a href="{{ route('seminar.index') }}"></a> All Seminar </li>
                    <li><a href="{{ route('seminar.delete') }}"></a> Delete Seminar </li>
                    <li><a href="{{ route('seminar.trash') }}"></a> Trash seminar </li>
                </ul>
            </li>

            <!-- Gallery -->

            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="bi bi-file-person-fill"></i>
                    </div>
                    <div class="nav_title">
                        <span>Gallery</span>
                    </div>
                </a>
                <ul>
                    <li><a href="{{ route('gallery.create') }}"></a> Add Gallery </li>
                    <li><a href="{{ route('gallery.index') }}"></a> All Gallery </li>
                    <li><a href="{{ route('gallery.trash') }}"></a> Trash Gallery </li>
                </ul>
            </li>


            <!-- Courses -->

            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="bi bi-file-person-fill"></i>
                    </div>
                    <div class="nav_title">
                        <span>Courses</span>
                    </div>
                </a>
                <ul>
                    <li><a href="{{ route('courses.create') }}"></a> Add Courses </li>
                    <li><a href="{{ route('courses.index') }}"></a> All Courses </li>
                </ul>
            </li>

            <!-- Contact -->

            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="bi bi-file-person-fill"></i>
                    </div>
                    <div class="nav_title">
                        <span>Contact</span>
                    </div>
                </a>
                <ul>
                    <li><a href="{{ route('contact.index') }}"></a> All Contact </li>
                </ul>
            </li>

        </ul>
    </nav>
    <!--/ sidebar  -->


    <section class="main_content dashboard_part large_header_bg ">
        <!-- menu  -->
        <div class="container-fluid no-gutters">
            <div class="row">
                <div class="col-lg-12 p-0 back_color">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        <div class="line_icon open_miniSide d-none d-lg-block">
                            <img src="{{ asset('backend/img/line_img.png') }}" alt="">
                        </div>
                        <div class="serach_field-area d-flex align-items-center">
                            <div class="search_inner">
                                <form action="empty_page.html#">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search">
                                    </div>
                                    <button type="submit"> <img src="{{ asset('backend/img/icon/icon_search.svg') }}"
                                            alt=""> </button>
                                </form>
                            </div>
                        </div>
                        <div class="header_right d-flex justify-content-between align-items-center ">
                            <div class="header_notification_warp d-flex align-items-center">
                                <li>
                                    <a class="bell_notification_clicker" href="empty_page.html#"> <img
                                            src="{{ asset('backend/img/icon/bell.svg') }}" alt="">
                                        <span>2</span>
                                    </a>
                                    <!-- Menu_NOtification_Wrap  -->
                                    <div class="Menu_NOtification_Wrap">
                                        <div class="notification_Header">
                                            <h4>Notifications</h4>
                                        </div>
                                        <div class="Notification_body">
                                            <!-- single_notify  -->
                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="empty_page.html#"><img
                                                            src="{{ asset('backend/img/staf/2.png') }}" alt=""></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="empty_page.html#">
                                                        <h5>Cool Marketing </h5>
                                                    </a>
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>
                                            <!-- single_notify  -->
                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="empty_page.html#"><img src="img/staf/4.png" alt=""></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="empty_page.html#">
                                                        <h5>Awesome packages</h5>
                                                    </a>
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>
                                            <!-- single_notify  -->
                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="empty_page.html#"><img src="img/staf/3.png" alt=""></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="empty_page.html#">
                                                        <h5>what a packages</h5>
                                                    </a>
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>
                                            <!-- single_notify  -->
                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="empty_page.html#"><img src="img/staf/2.png" alt=""></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="empty_page.html#">
                                                        <h5>Cool Marketing </h5>
                                                    </a>
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>
                                            <!-- single_notify  -->
                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="empty_page.html#"><img src="img/staf/4.png" alt=""></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="empty_page.html#">
                                                        <h5>Awesome packages</h5>
                                                    </a>
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>
                                            <!-- single_notify  -->
                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="empty_page.html#"><img src="img/staf/3.png" alt=""></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="empty_page.html#">
                                                        <h5>what a packages</h5>
                                                    </a>
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nofity_footer">
                                            <div class="submit_button text-center pt_20">
                                                <a href="empty_page.html#" class="btn_1">See More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Menu_NOtification_Wrap  -->
                                </li>
                                <li>
                                    <a class="CHATBOX_open" href="empty_page.html#"> <img
                                            src="{{ asset('backend/img/icon/msg.svg') }}" alt=""> <span>2</span> </a>
                                </li>
                            </div>
                            <div class="profile_info">
                                {{-- <img src="img/client_img.png" alt="#"> --}}
                                <img src="https://avatars.dicebear.com/api/avataaars/Afiful Hoque Adnan .svg"
                                    alt="#" style="height: 50px">
                                <div class="profile_info_iner">
                                    <div class="profile_author_name">
                                        <h5>
                                           
                                        </h5>
                                    </div>
                                    <div class="profile_info_details">

                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ menu  -->


        <!-- Missimg Pice -->

        @yield('content')




        <!-- footer part -->
        <div class="footer_part">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_iner text-center">
                            <p>2020 © Influence - Designed by <a href="empty_page.html#"> <i class="ti-heart"></i>
                                </a><a href="empty_page.html#"> DashboardPack</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- main content part end -->

    <div id="back-top" style="display: none;">
        <a title="Go to Top" href="empty_page.html#">
            <i class="ti-angle-up"></i>
        </a>
    </div>

    <!-- footer  -->

    <script src="{{ asset('backend/js/jquery-3.4.1.min.js') }}"></script>
   <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"> </script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- sidebar menu  -->
    <script src="{{ asset('backend/js/metisMenu.js') }}"></script>
    <!-- waypoints js -->
    <script src="{{ asset('backend/vendors/count_up/jquery.waypoints.min.js') }}"></script>
    <!-- waypoints js -->
    <script src="{{ asset('backend/vendors/chartlist/Chart.min.js') }}"></script>
    <!-- counterup js -->
    <script src="{{ asset('backend/vendors/count_up/jquery.counterup.min.js') }}"></script>

    <!-- nice select -->
    <script src="{{ asset('backend/vendors/niceselect/js/jquery.nice-select.min.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('backend/vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>

    <!-- responsive table -->
    <script src="{{ asset('backend/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatable/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatable/js/buttons.print.min.js') }}"></script>

    <!-- datepicker  -->
    <script src="{{ asset('backend/vendors/datepicker/datepicker.js') }}"></script>
    <script src="{{ asset('backend/vendors/datepicker/datepicker.en.js') }}"></script>
    <script src="{{ asset('backend/vendors/datepicker/datepicker.custom.js') }}"></script>

    <script src="{{ asset('backend/js/chart.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/chartjs/roundedBar.min.js') }}"></script>

    <!-- progressbar js -->
    <script src="{{ asset('backend/vendors/progressbar/jquery.barfiller.js') }}"></script>
    <!-- tag input -->
    <script src="{{ asset('backend/vendors/tagsinput/tagsinput.js') }}"></script>
    <!-- text editor js -->

    <script src="{{ asset('backend/js/custom.js') }}"></script>

    @yield('cos_js')

</body>

</html>
