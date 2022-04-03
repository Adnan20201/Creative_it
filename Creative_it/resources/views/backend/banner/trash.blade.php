@extends('layouts.backendapp')

@section('title', 'ALL Banner')


@section('content')

    <div class="card col-lg-12 mx-auto mt-2 shadow rounded">
        <div class="card-header" style="background: #265084">
            <h2 class="text-light">All Banner</h2>
        </div>
        <div class="card-body" style="background: 49596d;">
            <table class="table table-responsive table-success table-striped table-hover shadow rounded mt-5"
                id="data-table">
                <thead class="mt-5 ms-5">
                    <tr class="table-secondary">
                        <th>#</th>
                        <th>Banner Name</th>
                        <th>Banner Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($banners as $key => $banner)
                        <tr style="width: 100%">
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

                            <td class="d-flex ms-5">
                                <a href="{{ route('banner.restore', $banner->id) }}"
                                    class="btn btn-sm btn-success m-1 ">Restore</a>


                                <form action="{{ route('about.pre.delete', $banner->id) }}" method="POST"
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
