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
           <!-- Display validation errors -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif




        <form id="quickForm" novalidate="novalidate" method="POST" action="{{ route('Admin.Informations.Store') }}"
        enctype="multipart/form-data">
        @csrf
        {{-- <select name="type" id="type">
            <option value="0" disabled selected>--Select Type --</option>
            <option value="notice">Notice</option>
            <option value="oppurtunity">Oppurtunity</option>
            <option value="pressrelease">Press Releases</option>
             <option value="news">News</option>
             <option value="tender">Tender</option>
            <option value="other">Others</option>
        </select> --}}

        <select name="type" id="">
            <option value="0" disabled selected>--Select Type --</option>
            @foreach ($context as $contexts )
                <option value="{{ $contexts->id }}">{{ $contexts->title }}</option>
            @endforeach
        </select>

        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label><span style="color:red; font-size:large"> *</span>
                <input style="width:auto;" type="text" name="title" class="form-control" id="title" placeholder="Title">
            </div>
            <div>
                <label for="description">Description</label><span style="color:red; font-size:large">
                    *</span>
                <textarea style="max-width: 30%;" type="text" class="form-control" name="description" id="description"
                    placeholder="Add Description"></textarea>
            </div>

            <div class="form-group">
                <label for="gdocs">Google Docs URL</label>
                <input style="width:auto;" type="text" name="gdocs" class="form-control" id="gdocs" placeholder="Google Docs apply form URL">
            </div>

            <div class="form-group">
              <label for="image">Image</label><span style="color:red; font-size:large"> *</span>
              <input type="file" name="image" class="form-control" id="image" onchange="previewImage(event)"
                  placeholder="image" required>
            </div>
            <img id="preview" style="max-width: 500px; max-height:500px" />

            <div class="form-group">


                    <label for="file">PDF</label><span style="color:red; font-size:large"> *</span>
                    <input type="file" name="file" class="form-control" id="pdf" onchange="previewImage(event)" placeholder="PDF" required>

            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn-primary">Submit</button>
        </div>
    </form>









  @stop










