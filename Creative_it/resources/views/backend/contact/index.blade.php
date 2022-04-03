@extends('layouts.backendapp')

@section('title', 'ALL contact')


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

        <div class="card col-10 mx-auto mt-5 px-0 shadow rounded">

            <div class="card-header " style="background: #265084;">
                <h2 class="text-white">All contact</h2>
            </div>
            <div class="card-body" style="background: 49596d;">
                <table class="table table-responsive table table-success table-striped table-hover shadow rounded"
                 id="data-table">
                    <tr class="table-secondary">
                        <th>#</th>
                        <th>name</th>
                        <th>email</th>
                        <th>number</th>
                        <th>address</th>
                        <th>massage</th>
                        <th>Action</th>
                    </tr>

                    @forelse ($contact as $key => $contact)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->number }}</td>
                            <td>{{ Str::substr($contact->address, 0, 50) . '....'    }}</td>
                            <td>{{ Str::substr($contact->massage , 0, 50). '....' }}</td>

                        </tr>
                    @empty
                    @endforelse
                </table>
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