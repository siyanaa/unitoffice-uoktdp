@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $page_title }}</h1>
                    <a href="{{ route('Admin.Message.Create') }}"><button class="btn-primary btn-sm"><i class="fa fa-plus"></i>
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
                <th>Position</th>
                <th>Name</th>
                {{-- <th>Description</th> --}}
                <th>Image</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $msg)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $msg->type ?? '' }}</td>
                    <td>{{ $msg->name ?? '' }}</td>
                    {{-- <td>{!! Str::substr($msg->description, 0, 200) !!}</td> --}}
                    <td><img id="preview" src="{{ url('uploads/message/' . $msg->image ?? '') }}"
                      style="width: 100px; height:100px; object-fit:cover;" /></td>
                    <td>
                        <div style="display: flex; flex-direction:row;">
                            {{-- <a href="edit/{{ $msg->id }}"> --}}

                                     <button type="button" class="btn-block btn-warning button-size" data-bs-toggle="modal" data-bs-target="#edit{{ $msg->id }}">
                                Update
                              </button>

                            {{-- </a> --}}

                        {{-- <a href="{{ url('admin/message/destroy/'.$msg->id) }}"> --}}
                            <button type="button" class="btn-block btn-danger button-size" data-bs-toggle="modal" data-bs-target="#delete{{ $msg->id }}">
                                Delete
                              </button>
                        {{-- </a> --}}

                        <a href="{{ url('Admin/Message/Show/' .$msg->id) }}">
                            <button type="button" class="btn-block btn-success btn-sm button-size" data-toggle="modal"
                            data-target="#modal-default" style="width:auto;" onclick="replaceLinkFunction">
                                Show
                            </button>
                        </a>
                    </div>
                    </td>
                </tr>
            @endforeach
        </tbody>

        @foreach($messages as $msg)
        <div class="modal fade" id="delete{{ $msg->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-footer">
                  <a href=""><button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button></a>
                  <a href="{{ url('Admin/Message/Destroy/'.$msg->id) }}">
                    <button type="button" class="btn btn-danger">Yes
                    </button>
                  </a>
                </div>
              </div>
            </div>
          </div>

        @endforeach

        {{-- for edit --}}
        @foreach($messages as $msg)
        <div class="modal fade" id="edit{{ $msg->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-footer">
                  <a href=""><button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button></a>
                  <a href="{{ url('Admin/Message/Edit/'.$msg->id) }}">
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
