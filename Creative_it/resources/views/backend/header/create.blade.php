@extends('layouts.backendapp')

@section('title', 'Header')


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
            <h2 class="text-white" style="padding-left:25px;"><b> All Header Items</b></h2>
        </div>

        <div class="card-body shadow rounded" style="background: #5d37e5;">

            <form action="{{ route('header.store') }}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="mb-3">
                    <input type='text' name="notice" placeholder="Nontice" class="p-3 form-control">
                    @error('notice')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>


                <div class="mb-3">
                    <label class="text-white" for="">Notice Title</label>
                      <textarea name="notice_title"  class="p-3 form-control summerNote"></textarea>
                    @error('notice_title')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="file" name="logo" placeholder="Logo" class=" form-control">
                    @error('logo')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-sm text-white mx-auto " name="submit"
                    style="background:#21556A; padding: 10px 40px; border: 0; font-size: 18px; border-radius: 50px;margin-left: 75px;">Add
                    Header Items</button>

            </form>
        </div>
    </div>

@endsection






