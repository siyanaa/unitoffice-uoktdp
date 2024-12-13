@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $page_title }}</h1>
                    <a href="{{ url('admin') }}"><button class="btn-primary btn-sm"><i class="fa fa-arrow-left"></i>
                            Back</button></a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->


            @if(session('success'))
<div class="alert alert-success">
  {!! session('success') !!}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
  {!! session('error') !!}
</div>
@endif
            <div class="mt-4 mb-4">
                <h5> Format </h5>
                <span> Name, Image, Phone, Email, Position </span>
            </div>

    <form action="{{ route('Admin.Executivedetails.File-import-exe') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-4">
            <div class="custom-file text-left">
                <input type="file" name="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>

        <button class="btn-primary">Import data</button>
        {{-- <a class="btn-success" href="{{ route('file-export-exe') }}">Export data</a> --}}
    </form>



@endsection
