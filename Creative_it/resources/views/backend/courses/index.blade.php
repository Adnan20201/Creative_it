@extends('layouts.backendapp')

@section('title', 'ALL Courses')

@section('css')
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover,
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {

            border: 0;
            width: 100px;
            color: yellow !important;
            background: black !important;
        }

    </style>
@endsection

@section('content')

    <div class="card  mx-auto mt-2 shadow rounded">
        <div class="card-header" style="background: #265084">
            <h2 class="text-light">All Courses</h2>
        </div>
        <div class="card-body">
            <table class="table table-responsive table-success table-striped table-hover shadow rounded mt-5"
                id="data-table">
                <thead class="mt-5 mb-5">
                    <tr class="table-secondary">
                        <th>#</th>
                        <th>Courses_Image</th>
                        <th>Big_Courses_Image</th>
                        <th>Courses_title</th>
                        <th>Courses_Description</th>
                        <th>More_Courses_Title</th>
                        <th>Overview</th>
                        <th>Course_Module</th>
                        <th>Software_Taught</th>
                        <th>Duration</th>
                        <th>Prerequisites</th>
                        <th>Marketplace</th>
                        <th>Career_Opportunity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="w-100">

                    @forelse ($courses as $key => $courses)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>
                                <img src="{{ asset('/storage/image/courses/' . $courses->courses_image) }}" alt=""
                                    style="height: 60px; width:120px">
                            </td>
                            <td>
                                <img src="{{ asset('/storage/image/courses/' . $courses->big_courses_image) }}" alt=""
                                    style="height: 60px; width:120px">
                            </td>

                            <td class="" style="color:black; font-size:16px;">{{ $courses->courses_title }}
                            </td>

                            <td class="" style="color:black; font-size:16px;">
                                {{ Str::substr($courses->courses_description, 0, 50) . '....' }}
                            </td>
                            <td class="" style="color:black; font-size:16px;">
                                {{ Str::substr($courses->more_courses_title, 0, 50) . '....' }}
                            </td>
                            <td class="" style="color:black; font-size:16px;">
                                {{ Str::substr($courses->overview, 0, 60) . '....' }}
                            </td>
                            <td class="" style="color:black; font-size:16px;">
                                {{ Str::substr($courses->course_module, 0, 60) . '....' }}
                            </td>
                            <td class="" style="color:black; font-size:16px;">
                                {{ Str::substr($courses->software_taught, 0, 60) . '....' }}
                            </td>
                            <td class="" style="color:black; font-size:16px;">
                                {{ Str::substr($courses->duration, 0, 60) . '....' }}
                            </td>
                            <td class="" style="color:black; font-size:16px;">
                                {{ Str::substr($courses->prerequisites, 0, 60) . '....' }}
                            </td>
                            <td class="" style="color:black; font-size:16px;">
                                {{ Str::substr($courses->marketplace, 0, 60) . '....' }}
                            </td>
                            <td class="" style="color:black; font-size:16px;">
                                {{ Str::substr($courses->career_opportunity, 0, 60) . '....' }}
                            </td>


                            <td>
                                <span class="btn btn-sm {{ $courses->status == 1 ? 'bg-info' : 'bg-danger' }}">
                                    {{ $courses->status == 1 ? 'Active' : 'Decative' }}
                                </span>
                            </td>

                            <td class="d-flex m-2">
                                <a href="{{ route('courses.edit', $courses->id) }}"
                                    class="btn btn-sm btn-primary m-2">Edit</a>

                                <form action="{{ route('courses.status', $courses->id) }}" method="POST"
                                    class="m-2 mb-0">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-sm {{ $courses->status == 1 ? 'bg-danger' : 'bg-info' }}">
                                        {{ $courses->status == 1 ? 'Decative' : 'Active' }}
                                    </button>
                                </form>

                                <form action="{{ route('courses.destroy', $courses->id) }}" method="POST"
                                    class="m-2">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <h3 class="text-aligm-center ms-auto">No data available in table</h3>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('cos.js')

    <script>
        $(document).ready(function() {
            $('#data-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
@endsection
