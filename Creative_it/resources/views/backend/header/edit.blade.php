@extends('layouts.backendapp')

@section('title', 'Header')


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
            <h2 class="text-white" style="padding-left:25px;"><b> Edit Header Items</b></h2>
        </div>

        <div class="card-body shadow rounded" style="background: #5d37e5;">

            <form action="{{ route('header.update' , $old_header_data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <input type="text" name="notice" placeholder="Nontice" class="p-3 form-control"
                     value = "{{ $old_header_data->notice}}">
                   @error('notice')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="text-white" for="">Notice Title</label>
                    <textarea name="notice_title" id="summernote" class="p-3 form-control">
                    {{ $old_header_data->notice_title}}
                    </textarea>
                    @error('notice_title')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="file" name="logo" placeholder="Logo" class=" form-control">

                   <img class="shadow rounded"
                        src="{{ asset('/storage/image/logo/' . $old_header_data->logo) }}"
                        alt="" style="height: 60px; width:120px; margin-right:auto; margin:5px;">

                    @error('logo')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-sm text-white mx-auto " name="submit"
                    style="background:#21556A; padding: 10px 40px; border: 0; font-size: 18px; border-radius: 50px;margin-left: 75px;">Update
                    Header Items</button>

            </form>
        </div>
    </div>

@endsection




