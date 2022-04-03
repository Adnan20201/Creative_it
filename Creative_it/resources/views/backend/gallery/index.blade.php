@extends('layouts.backendapp')

@section('title', 'Gallery')


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
    <div class="card col-lg-9 mx-auto mt-2 shadow rounded">
        <div class="card-header" style="background: #265084">
            <h2 class="text-light">All Gallery</h2>
        </div>
        <div class="card-body " style="background: 49596d;">
            <table class="w-100 table table-responsive table-success table-striped table-hover shadow rounded mt-5"
                id="data-table">

                <thead class="mt-2 mb-5">
                    <tr class="table-secondary">
                        <th>#</th>
                        <th>Gallery Name</th>
                        <th>Gallery Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($galleries as $key => $gallery)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $gallery->gallery_name }}</td>
                            <td>
                                <img src="{{ asset('/storage/image/gallery/' . $gallery->gallery_image) }}"
                                    alt="{{ $gallery->gallery_name }}" style="height: 60px; width:120px">
                            </td>
                            <td class="">
                                <span class="btn btn-sm  {{ $gallery->status == 1 ? 'bg-info' : 'bg-danger' }}">
                                    {{ $gallery->status == 1 ? 'Active' : 'Deactive' }}
                                </span>
                            </td>
                            <td class="d-flex">
                                <a class="btn btn-sm btn-primary mx-2"
                                    href="{{ route('gallery.edit', $gallery->id) }}">Edit</a>

                                <form action="{{ route('gallery.status', $gallery->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-sm mx-2 {{ $gallery->status == 1 ? 'bg-danger' : 'bg-info' }}">
                                        {{ $gallery->status == 1 ? 'Deactive' : 'Active' }}
                                    </button>
                                </form>

                                <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST">
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
