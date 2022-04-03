@extends('layouts.backendapp')


@section('content')
    <div class="card col-lg-8 mx-auto mt-2 shadow rounded">
        <div class="card-header" style="background: #265084">
            <h2 class="text-light">All Seminar</h2>
        </div>

        <div class="card-body">
            <table class="table table-responsive table-success table-striped table-hover shadow rounded">
                <thead class="mt-5 ms-5">
                    <tr class="table-secondary">
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($seminars as $key => $seminar)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $seminar->topic }}</td>
                            <td class="d-flex">
                                <a href="{{ route('seminar.restore', $seminar->id) }}"
                                    class="btn btn-sm btn-success m-1 ">Restore</a>

                                <form action="{{ route('seminar.pre.delete', $seminar->id) }}" method="POST"
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


{{-- @section('content')
<table class="table">
    <tr>
        <td>#</td>
        <td>Name</td>
        <td>Actions</td>
    </tr>
    @foreach ($seminars as $key => $seminar)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $seminar->topic }}</td>
            <td>
                <a href="#" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    @endforeach
</table>
@endsection --}}
