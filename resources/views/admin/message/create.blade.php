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

        <form id="quickForm" novalidate="novalidate" method="POST" action="{{ route('Admin.Message.Store') }}"
        enctype="multipart/form-data">

        @csrf
        <select name="type" id="type">
            <option value="0" disabled selected>--Select Position--</option>
            <option value="Administrativehead">Administrative Head</option>
            <option value="Vicechairperson">Vice Chairperson</option>
        </select>


        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label><span style="color:red; font-size:large"> *</span>
                <input style="width:auto;" type="text" name="name" class="form-control" id="name" placeholder="Name..">
            </div>
            <div>
                <label for="description">Description</label><span style="color:red; font-size:large">
                    *</span>
                <textarea style="max-width: 30%;" type="text" class="form-control" name="description" id="summernote"
                    placeholder="Add Description"></textarea>
            </div>

            <div class="form-group">
              <label for="image">Image</label><span style="color:red; font-size:large"> *</span>
              <input type="file" name="image" class="form-control" id="image" onchange="previewImage(event)"
                  placeholder="image" required>
            </div>
            <img id="preview" style="max-width: 500px; max-height:500px" />


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
