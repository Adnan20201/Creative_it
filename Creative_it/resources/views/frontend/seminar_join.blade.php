@extends('layouts.frontendapp')

@section('content')
    <!--============== Course Details Part Goes Here ================-->

    <section class="py-5">
        <div class="container">
            <div class="row">

                <div class="card">
                    <div class="card-header">
                        <h5 class="modal-title">Join Our Free Seminars</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('leeds.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <input type="text" name="name" value="" class="form-control"
                                        placeholder="Enter Your Name*">

                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="text" name="email" value="" class="form-control"
                                        placeholder="Enter Your Email*">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="number" name="number" value="" class="form-control"
                                        placeholder="Enter Your Number*">
                                </div>
                                <div class="form-group col-sm-6">
                                    <select class="form-control" name="seminar_id" id="seminar_cat">
                                        <option selected disabled>Select Topic</option>

                                        @foreach ($seminars as $seminar)
                                            <option value="{{ $seminar->id }}">{{ $seminar->topic }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group col-sm-12">
                                    <textarea name="address" class="form-control" placeholder="Enter your address"></textarea>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-danger btn_submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
