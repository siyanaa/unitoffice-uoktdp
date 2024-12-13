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

        <form id="quickForm" novalidate="novalidate" method="POST" action="{{ route('Admin.Youth.Update') }}"
        enctype="multipart/form-data">
        @csrf
        <input name="id" id="" value ="{{ $youth->id }}" hidden>
        <select name="type" id="type">
            <option value="youthstats" {{ $youth->type == 'youthstats' ? 'selected' : '' }}>Youth Statistics</option>
            <option value="youthactivity" {{ $youth->type == 'youthactivity' ? 'selected' : '' }}>Youth Activities</option>
        </select>


        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label><span style="color:red; font-size:large"> *</span>
                <input style="width:auto;" type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $youth->title }}">
            </div>



            <div class="form-group">


                    <label for="file">PDF</label><span style="color:red; font-size:large"> *</span>
                    <input type="file" name="file" class="form-control" id="pdf" placeholder="PDF" value="">

            </div>
            <iframe src="{{ asset('uploads/youth/' . $youth->file) }}" title="" style="max-width: 300px; max-height:300px;"></iframe>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn-primary">Submit</button>
        </div>
    </form>



    <script>
        const previewImage = e => {
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = () => {
                const preview = document.getElementById('preview');
                preview.src = reader.result;
            };
        };
    </script>






  @stop
