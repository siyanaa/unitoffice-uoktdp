@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $page_title }}</h1>
                    <a href="{{ route('Admin.Posts.Create') }}"><button class="btn-primary btn-sm"><i class="fa fa-plus"></i>
                      Add New</button></a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->


    <table class="table table-bordered table-hover">
        <thead>
            <tr>
              <th>S.N.</th>
                <th>Title</th>
                <th>Category</th>
                <th>Image</th>
                <th>Slug</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr data-widget="expandable-table" aria-expanded="false">
                  <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title ?? '' }}</td>
                    @foreach ($post->get_categories as $category )
                    <td>{{  $category->title  }}</td>
                    @endforeach
                    <td><img id="preview1" src="{{ url('uploads/posts/' . $post->image) }}"
                      style="width: 100px; height:100px; object-fit:cover;" /></td>
                    <td>{{ $post->slug ?? '' }}</td>

                    <td>

                        {{-- <a href="edit/{{ $post->id }}"> --}}
                            <div style="display: flex; flex-direction:row;">
                                <button type="button" class="btn-warning button-size" data-bs-toggle="modal" data-bs-target="#edit{{ $post->id }}">
                                    Update
                                  </button>
                        {{-- </a> --}}

                        {{-- <a href="{{ url('admin/posts/destroy/'.$post->id) }}"> --}}
                            <button type="button" class="btn-danger button-size" data-bs-toggle="modal" data-bs-target="#delete{{ $post->id }}">
                                Delete
                              </button>
                        {{-- </a> --}}

                    </td>
                </tr>
            @endforeach
        </tbody>

{{-- update --}}
        @foreach($posts as $post)

        <div class="modal fade" id="edit{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                 <a href="{{ url('Admin/Posts/Edit/' .$post->id) }}">
                  <button type="button" class="btn btn-danger">Yes
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>

        @endforeach

{{-- destroy --}}
        @foreach($posts as $post)

        <div class="modal fade" id="delete{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                 <a href="{{ url('Admin/Posts/Destroy/' .$post->id) }}">
                  <button type="button" class="btn btn-danger">Yes
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>

        @endforeach
    </table>

    <script>

        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
        })
        </script>
@endsection
