@extends('layouts.backendapp')

@section('title', 'ALL About')


@section('content')
    <div class="container">
        <div class="card col-lg-12  mt-2 shadow rounded">
            <div class="card-header m-0" style="background: #265084;">
                <h2 class="text-white">Trash About Items</h2>
            </div>
            <div class="card-body" style="background: 49596d;">
                <table class="table table-responsive table-success  table-hover shadow rounded mt-5"
                    id="data-table_one">
                    <thead class="mt-5 mb-5">
                        <tr class="table-secondary">
                            <th>#</th>
                            <th>About Image</th>
                            <th>About Name</th>
                            <th>About Title</th>
                            <th>About Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="w-100">
                        @forelse ($abouts as $key => $about)
                            <tr style="color:back">
                                <td style="font-size: 16px; color:black;">{{ ++$key }}</td>
                                <td>
                                    <img class="shadow rounded" src="{{ asset('/storage/image/about/' . $about->about_image) }}"
                                        alt="{{ $about->about_name }}" style="height: 60px; width:120px">
                                </td>
                                <td style="font-size: 16px; color:black;">{{ $about->about_name }}</td>
                                <td style="font-size: 16px; color:black;">{{ $about->about_title }}</td>
                                <td style="font-size: 16px; color:black;">{{ Str::substr($about->about_description, 0, 40) . '.......' }}</td>
                                <td>
                                    <span class="btn btn-sm m-0 {{ $about->status == 1 ? 'bg-info' : 'bg-danger' }}">
                                        {{ $about->status == 1 ? 'Active' : 'Deactive' }}
                                    </span>
                                </td>

                                <td class="d-flex ms-2">
                                    <a href="{{ route('about.restore', $about->id) }}"
                                        class="btn btn-sm btn-success m-1 ">Restore</a>

                                    {{-- <form action="{{ route('about.status', $about->id) }}" method="POST"
                                        class="m-2 mb-0">
                                        @csrf
                                        @method('PUT')
                                        <button
                                            class=" text-white btn btn-sm  {{ $about->status == 1 ? 'bg-danger' : 'bg-info' }}">
                                            {{ $about->status == 1 ? 'Deactive' : 'Active' }}
                                        </button>
                                    </form> --}}

                                    <form action="{{ route('about.pre.delete', $about->id) }}" method="POST"
                                        class="m-2 ms-4">
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
    </div>
@endsection


@section('cos.js')

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
