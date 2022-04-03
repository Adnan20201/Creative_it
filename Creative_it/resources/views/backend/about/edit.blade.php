@extends('layouts.backendapp')

@section('title', 'About')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

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
            <h2 class="text-white" style="padding-left:25px;"><b> Edit About Items</b></h2>
        </div>

        <div class="card-body shadow rounded" style="background: #5d37e5;">

            <form action="{{ route('about.update', $old_about_data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <input type="text" name="about_name" placeholder="About Name" class="p-3 form-control"
                        value="{{ $old_about_data->about_name }}">

                    @error('about_name')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="text" name="about_title" placeholder="About title" class="p-3 form-control"
                        value="{{ $old_about_data->about_title }}">
                    @error('about_title')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="text-white" for="">About Description</label>
                    <textarea name="about_description" id="summernote" class="p-3 form-control">
                      {{ $old_about_data->about_description }}"
                    </textarea>
                    @error('about_description')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="file" name="about_image" placeholder="Banner Image" class=" form-control">

                    <img src="{{ asset('/storage/image/about/' . $old_about_data->about_image) }}"
                        alt="{{ $old_about_data->about_name }}"
                        style="height: 60px; width:120px; margin-right:auto; margin:5px;">
                        
                    @error('about_image')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-sm text-white mx-auto " name="submit"
                    style="background:#21556A; padding: 10px 40px; border: 0; font-size: 18px; border-radius: 50px;margin-left: 75px;">Update
                    About Items</button>

            </form>
        </div>
    </div>

@endsection

@section('cos.js')

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, ',
                tabsize: 2,
                height: 100
            });
        });
    </script>

@endsection
