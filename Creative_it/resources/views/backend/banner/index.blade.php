@extends('layouts.backendapp')

@section('title', 'ALL Banner')

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

    <div class="card col-lg-12 mx-auto mt-2 shadow rounded">
        <div class="card-header" style="background: #265084">
            <h2 class="text-light">All Banner</h2>
        </div>
        <div class="card-body" style="background: 49596d;">
            <table class="table table-responsive table-success table-striped table-hover shadow rounded mt-5"
                id="data-table">
                <thead class="mt-5 mb-5">
                    <tr class="table-secondary">
                        <th>#</th>
                        <th>Banner Name</th>
                        <th>Banner Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="w-100">
                    @forelse ($banners as $key => $banner)
                        <tr>
                            <td style="color: black;font-size:20px">{{ ++$key }}</td>
                            <td style="color: black;font-size:18px">{{ $banner->banner_name }}</td>
                            <td>
                                <img src="{{ asset('/storage/image/banner/' . $banner->banner_image) }}"
                                    alt="{{ $banner->banner_name }}" style="height: 60px; width:120px">
                            </td>

                            <td>
                                <span class="btn btn-sm {{ $banner->status == 1 ? 'bg-info' : 'bg-danger' }}">
                                    {{ $banner->status == 1 ? 'Active' : 'Deactive' }}
                                </span>
                            </td>

                            <td class="d-flex ms-2">
                                <a href="{{ route('banner.edit', $banner->id) }}"
                                    class="btn btn-sm btn-primary m-1 ">Edit</a>

                                <form action="{{ route('banner.status', $banner->id) }}" method="POST"
                                    class="m-2 mb-0">
                                    @csrf
                                    @method('put')
                                    <button
                                        class="text-white btn btn-sm {{ $banner->status == 1 ? 'bg-danger ' : 'bg-info' }}">
                                        {{ $banner->status == 1 ? 'Deactive' : 'Active' }}
                                    </button>
                                </form>

                                <form action="{{ route('banner.destroy', $banner->id) }}" method="POST"
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

@section('cos_js')

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
