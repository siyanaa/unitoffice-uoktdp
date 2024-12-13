@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $page_title }}</h1>
                    <a href="{{ route('Admin.Youth.Create') }}"><button class="btn-primary btn-sm"><i class="fa fa-plus"></i>
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
                <th>Type</th>
                <th>Title</th>
                <th>Slug</th>

                <th>File</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($youths as $other)
                <tr data-widget="expandable-table" aria-expanded="false">
                  <td>{{ $loop->iteration }}</td>
                    <td>{{ $other->type ?? '' }}</td>
                    <td>{{ $other->title ?? '' }}</td>
                    <td>{{ $other->slug ?? '' }}</td>


                      <td><iframe src="{{ asset('uploads/youth/' . $other->file) }}" title="" style="width: 100px; height:100px;"></iframe>
                        <td>

                        {{-- <a href="edit/{{ $other->id }}"> --}}
                            <div style="display: flex; flex-direction:row;">
                                {{-- <button type="button" class=" btn-block btn-warning btn-sm"><i class="fas fa-edit"></i>
                                    Edit </button> --}}
                                    <button type="button" class="btn-warning button-size" data-bs-toggle="modal" data-bs-target="#edit{{ $other->id }}">
                                        Update
                                      </button>
                        {{-- </a> --}}


                                <button type="button" class="btn-danger button-size" data-bs-toggle="modal" data-bs-target="#delete{{ $other->id }}">
                                    Delete
                                  </button>
                        {{-- </a> --}}

                    </td>
                </tr>
            @endforeach
        </tbody>
        @foreach($youths as $other)

        <div class="modal fade" id="delete{{ $other->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                 <a href="{{ url('Admin/Youth/Destroy/' .$other->id) }}">
                  <button type="button" class="btn btn-danger">Yes
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>

        @endforeach
        {{-- for edit --}}
        @foreach($youths as $other)

        <div class="modal fade" id="edit{{ $other->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                 <a href="{{ url('Admin/Youth/Edit/' .$other->id) }}">
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
        // for delete
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
        })

        // for edit
        // var myModal = document.getElementById('myModal')
        // var myInput = document.getElementById('myInput')

        // myModal.addEventListener('shown.bs.modal', function () {
        // myInput.focus()
        // })
      </script>
@endsection
