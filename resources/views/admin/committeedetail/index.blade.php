@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $page_title }}</h1>
                    <a href="{{ route('Admin.Committeedetails.Committee.file') }}"><button class="btn-primary btn-sm"><i class="fa fa-plus"></i>
                            Import</button></a>
                    <a href="{{ route('Admin.Committeedetails.Create') }}"><button class="btn-primary btn-sm"><i class="fa fa-plus"></i>
                            Add New</button></a>
                    <a href="{{ route('Admin.Committeedetails.File-export') }}"><button class="btn-primary btn-sm"><i class="fa fa-plus"></i>
                            Export</button></a>
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
      <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Sn</th>
                <th>State</th>
                <th>District</th>
                <th>Name</th>

                <th>Phone</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($committeedetails as $cd)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $cd->address }}</td>
                    <td>{{ $cd->district ?? '' }}</td>
                    <td>{{ $cd->name ?? '' }}</td>

                    <td>{{ $cd->phone ?? '' }}</td>
                    <td>

                        <button type="button" class="btn-warning button-size" data-bs-toggle="modal" data-bs-target="#edit{{ $cd->id }}">
                            Update
                          </button>

                          <button type="button" class="btn-danger button-size" data-bs-toggle="modal" data-bs-target="#delete{{ $cd->id }}">
                            Delete
                          </button>

                    </td>
                </tr>
            @endforeach
        </tbody>
        @foreach ($committeedetails as $cd )
        <div class="modal fade" id="delete{{ $cd->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                 <a href="{{ url('Admin/Committeedetails/Destroy/'. $cd->id) }}">
                  <button type="button" class="btn btn-danger">Yes
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>

        @endforeach

        @foreach ($committeedetails as $cd )
        <div class="modal fade" id="edit{{ $cd->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                 <a href="{{ url('Admin/Committeedetails/Edit/'. $cd->id) }}">
                  <button type="button" class="btn btn-danger">Yes
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>

        @endforeach


    </table>
    <div class="d-flex justify-content-center">
        {!! $committeedetails->links() !!}
    </div>


    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
        })
    </script>
@endsection
