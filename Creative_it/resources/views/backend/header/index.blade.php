@extends('layouts.backendapp')

@section('title', 'ALL Header')

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
    <div class="container">
        <div class="card col-lg-12  mt-2 shadow rounded">
            <div class="card-header m-0" style="background: #265084;">
                <h2 class="text-white">All About Items</h2>
            </div>
            <div class="card-body" style="background: 49596d;">
                <table class="" id="data-table_one">
                    <thead class="mt-5 mb-5">
                        <tr class="table-secondary">
                            <th>#</th>
                            <th>Notice</th>
                            <th>Notice Title</th>
                            <th>Logo</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($headers as $key => $header)
                            <tr style="color:back">
                                <td style="font-size: 16px; color:black;">{{ ++$key }}</td>
                                <td style="font-size: 16px; color:black;">{{ $header->notice }}</td>
                                <td style="font-size: 16px; color:black;">{{ Str::substr($header->notice_title, 1 , 40 ) . '.....' }}</td>

                                <td>
                                    <img class="shadow rounded"
                                        src="{{ asset('/storage/image/logo/' . $header->logo) }}"
                                        alt="" style="height: 60px; width:120px">
                                </td>

                                 <td>
                                    <span class="btn btn-sm m-0 {{ $header->status == 1 ? 'bg-info' : 'bg-danger' }}">
                                        {{ $header->status == 1 ? 'Active' : 'Deactive' }}
                                    </span>
                                </td>

                                <td class="d-flex ms-2">
                                    <a href="{{ route('header.edit', $header->id) }}"
                                        class="btn btn-sm btn-primary m-1 ">Edit</a>

                                    <form action="{{ route('header.status', $header->id) }}" method="POST"
                                        class="m-2 mb-0">
                                        @csrf
                                        @method('PUT')
                                        <button
                                            class=" text-white btn btn-sm  {{ $header->status == 1 ? 'bg-danger' : 'bg-info' }}">
                                            {{ $header->status == 1 ? 'Deactive' : 'Active' }}
                                        </button>
                                    </form>

                                    <form action="{{ route('header.destroy', $header->id) }}" method="POST"
                                        class="m-2 ms-4">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>

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
@endsection


@section('cos_js')

    <script>
        $(document).ready(function() {
            $('#data-table_one').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>

@endsection
