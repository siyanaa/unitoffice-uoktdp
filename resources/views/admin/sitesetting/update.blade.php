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


    <form id="quickForm" method="POST" action="{{ route('Admin.Sitesettings.Update') }}" enctype="multipart/form-data">
        @csrf
        {{-- <input type="hidden" name="id" value="{{ $sitesetting->id }}"> --}}

        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Government Name</label>
                <input type="text" name="govn_name" class="form-control" value="{{ $sitesetting->govn_name ?? '' }}"
                    placeholder="Government Name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ministry Name</label>
                <input type="text" name="ministry_name" class="form-control"
                    value="{{ $sitesetting->ministry_name ?? '' }}" placeholder="Ministry Name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Department Name</label>
                <input type="text" name="department_name" class="form-control"
                    value="{{ $sitesetting->department_name ?? '' }}" placeholder="Department Name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Office Name</label>
                <input type="text" name="office_name" class="form-control" value="{{ $sitesetting->office_name ?? '' }}"
                    placeholder="Office Name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Office Address</label>
                <input type="text" name="office_address" class="form-control"
                    value="{{ $sitesetting->office_address ?? '' }}" placeholder="Address">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Office Contact</label>
                <input type="text" name="office_contact" class="form-control"
                    value="{{ $sitesetting->office_contact ?? '' }}" placeholder="Office Contact">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Office Email</label>
                <input type="email" name="office_mail" class="form-control" value="{{ $sitesetting->office_mail ?? '' }}"
                    placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Main Logo</label>
                <input type="file" name="main_logo" class="form-control" value="{{ $sitesetting->main_logo ?? '' }}"
                    placeholder="Main Logo">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Side Logo</label>
                <input type="file" name="side_logo" class="form-control" value="{{ $sitesetting->side_logo ?? '' }}"
                    placeholder="Side Logo">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Flag Logo</label>
                <input type="file" name="flag_logo" class="form-control" value="{{ $sitesetting->flag_logo ?? '' }}"
                    placeholder="Flag Logo">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Facebook URL</label>
                <input type="url" name="face_link" class="form-control" value="{{ $sitesetting->face_link ?? '' }}"
                    placeholder="Facebook URL (https://)">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Insta URL</label>
                <input type="url" name="insta_link" class="form-control" value="{{ $sitesetting->insta_link ?? '' }}"
                    placeholder="Insta URL (https://)">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Social URL</label>
                <input type="url" name="social_link" class="form-control" value="{{ $sitesetting->social_link ?? '' }}"
                    placeholder="LinkedIN URL (https://)">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Facebook Page</label>
                <input type="url" name="face_page" class="form-control" value="{{ $sitesetting->face_page ?? '' }}"
                    placeholder="Facebook Page Embed (https://)">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Google Map</label>
                <input type="url" name="google_map" class="form-control" value="{{ $sitesetting->google_map ?? '' }}"
                    placeholder="Google Map Embed (https://)">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn-primary">Update</button>
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
