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
            <h2 class="text-light">All Seminar</h2>
        </div>
        <div class="card-body" style="background: 49596d;">
            <nav>
                <div class="nav nav-tabs mt-4" id="nav-tab" role="tablist">

                    @foreach ($seminars as $key => $seminar)
                        <button class="nav-link {{ $key == 0 ? 'active' : '' }}" id="nav-home-tab" data-bs-toggle="tab"
                            data-bs-target="#seminar{{ ++$key }}" type="button" role="tab" aria-controls="nav-home"
                            aria-selected="true">
                            {{ $seminar->topic }}
                        </button>
                        {{-- <form action="{{ route('seminar.destroy', $seminar->id) }}" method="POST"
                        class=" {{ $key == 0 ? 'active' : '' }} m-2">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm mt-2 ">Delete</button>
                    </form> --}}
                    @endforeach



                </div>
            </nav>


            <div class="tab-content mt-4" id="nav-tabContent">

                @foreach ($seminars as $key => $seminar)
                    <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="seminar{{ $key }}"
                        role="tabpanel" aria-labelledby="nav-home-tab">


                        <table class="table table-responsive table-success table-striped table-hover shadow rounded mt-5"
                            id="data-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>number</th>
                                    <th>address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($seminar->leeds as $key => $leed)
                                    <tr>
                                        <td style="color: black;font-size:14px">{{ ++$key }}</td>
                                        <td style="color: black;font-size:14px">{{ $leed->name }}</td>
                                        <td style="color: black;font-size:14px">{{ $leed->email }}</td>
                                        <td style="color: black;font-size:14px">{{ $leed->number }}</td>
                                        <td style="color: black;font-size:14px">{{ Str::substr($leed->address, 0, 30) . '...' }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('leed.restore', $seminar->id) }}"
                                                class="btn btn-sm btn-success m-1 ">Restore</a>

                                            <form action="{{ route('leed.pre.delete', $leed->id) }}" method="POST"
                                                class="m-2">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach

            </div>

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
