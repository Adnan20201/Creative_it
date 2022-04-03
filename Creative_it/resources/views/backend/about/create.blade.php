@extends('layouts.backendapp')

@section('title', 'About')



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

    <div class="card mx-auto col-lg-9 mt-4 px-0">

        <div class="card-header shadow rounded" style="background:#21556A;">
            <h2 class="text-white" style="padding-left:25px;"><b> All About Items</b></h2>
        </div>

        <div class="card-body shadow rounded" style="background: #5d37e5;">

            <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <input type="text" name="about_name" placeholder="About Name" class="p-3 form-control">
                    @error('about_name')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="text" name="about_title" placeholder="About title" class="p-3 form-control">
                    @error('about_title')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="text-white" for="">About Description</label>
                    <textarea name="about_description" class="p-3 form-control summerNote"></textarea>
                    @error('about_description')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="file" name="about_image" placeholder="Banner Image" class=" form-control">
                    @error('about_image')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-sm text-white mx-auto " name="submit"
                    style="background:#21556A; padding: 10px 40px; border: 0; font-size: 18px; border-radius: 50px;margin-left: 75px;">Add
                    About Items</button>

            </form>
        </div>
    </div>

@endsection


@section('cost_js')
    <script>
        $(document).ready(function() {
            $('.summerNote').summernote({
                placeholder: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, ',
                tabsize: 1,
                height: 20
            });
        });
    </script>

@endsection
