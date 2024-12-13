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

        <form id="quickForm" novalidate="novalidate" method="POST" action="{{ route('Admin.Posts.Store') }}"
        enctype="multipart/form-data">
        @csrf
        <select name="category" id="category">
            <option value="0" disabled selected>--Select Type--</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>

        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label><span style="color:red; font-size:large"> *</span>
                <input style="width:auto;" type="text" name="title" class="form-control" id="title" placeholder="Title">
            </div>
            <div>

                {{-- <textarea id="myTextarea" name="content">

                </textarea> --}}

            <label for="content">Description</label><span style="color:red; font-size:large">
                *</span>
            <textarea style="max-width: 100%;min-height: 250px;" type="text" class="form-control" id="myTextarea" name="content"
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

<script>
    tinymce.init({
        selector:"#myTextarea",
        height: 400,
        plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',

        menubar:'file edit view insert format tools table help',
        toollbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen preview save print | insertfile image media template link anchor codesample | ltr rtl',

        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval:'30s',
        autosave_prefix:'{path}{query}-{id}-',
        autosave_restore_when_empty: false,
        autosave_retention: '2m',
        image_advtab: true,

        importcss_append: true,
    //     file_picker_callback: function(callback, value, meta) {
    //     if (meta.filetype === 'image') {
    //         // Open a file upload dialog
    //         var input = document.createElement('input');
    //         input.setAttribute('type', 'file');
    //         input.setAttribute('accept', 'image/*');
    //         input.onchange = function() {
    //             var file = this.files[0];

    //             // Read the uploaded file
    //             var reader = new FileReader();
    //             reader.onload = function() {
    //                 var imageUrl = reader.result;

    //                 // Pass the image URL to the callback function
    //                 callback(imageUrl, { alt: file.name });
    //             };
    //             reader.readAsDataURL(file);
    //         };
    //         input.click();
    //     }
    // }
    image_title: true,
                automatic_uploads: true,
                images_upload_url: '/storage/uploads/tiny/',
                file_picker_types: 'image',
    file_picker_callback: function(callback, value, meta) {
        if (meta.filetype === 'image') {
            // Open a file upload dialog
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function() {
                var file = this.files[0];

                // Upload the image file to the server
                var formData = new FormData();
                formData.append('image', file);

                // Make an AJAX request to upload the image
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/uploadImage', true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var imageUrl = xhr.responseText;

                        // Pass the image URL to the callback function
                        callback(imageUrl, { alt: file.name });
                    } else {
                        console.error('Image upload failed.');
                    }
                };
                xhr.send(formData);
            };
            input.click();
        }
    }



        });


        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'

    </script>





  @stop
