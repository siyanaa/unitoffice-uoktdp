@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $page_title }}</h1>
                    <a href="{{ route('Admin.Committeedetails.Index') }}"><button class="btn-primary btn-sm"><i class="fa fa-arrow-left"></i>
                            Back</button></a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

        <form id="quickForm" novalidate="novalidate" method="POST" action="{{ route('Admin.Committeedetails.Store') }}"
        enctype="multipart/form-data">
        @csrf



        <div class="card-body">
            <div class="form-group">
                <label for="district">District</label>
                <input style="width:auto;" type="text" name="district" class="form-control" id="title" value="{{ old('district') }}" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input style="width:auto;" type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="name">Address</label>
                <input style="width:auto;" type="text" name="address" class="form-control" id="address" value="{{ old('address') }}">
            </div>
            <div class="form-group">
                <label for="name">Phone</label>
                <input style="width:auto;" type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
            </div>


        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn-primary">Submit</button>
        </div>
    </form>









  @stop
