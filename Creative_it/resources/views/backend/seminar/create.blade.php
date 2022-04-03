@extends('layouts.backendapp')

@section('title', 'Banner')

@section('content')

    @if (session()->has('success'))
        <div class="alert">
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto"><br>Successfully</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    <div class="card mx-auto col-lg-8 mt-4 px-0">

        <div class="card-header shadow rounded" style="background:#21556A;">
            <h2 class="text-white" style="padding-left:25px;"><b> All Seminar Items</b></h2>
        </div>

        <div class="card-body shadow rounded" style="background: #5d37e5;">

            <form action="{{ route('seminar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <input type="text" name="topic" placeholder="Topic" class="p-3 form-control">
                    @error('topic')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="date">
                        <h4 class="text-white">Seminar Date:</h4>
                    </label>
                    <input type="date" name="date" placeholder="" class="p-3 form-control">
                    @error('data')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="time">
                        <h4 class="text-white">Seminar Time:</h4>
                    </label>
                    <input type="time" name="time" placeholder="" class="p-3 form-control">
                    @error('time')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-sm text-white mx-auto " name="submit"
                    style="background:#21556A; padding: 10px 40px; border: 0; font-size: 18px; border-radius: 50px;margin-left: 75px;">Add
                    Seminar Items</button>

            </form>
        </div>
    </div>




@endsection
