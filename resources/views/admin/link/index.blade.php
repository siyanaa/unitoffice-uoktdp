@extends('admin.layouts.master')


@section('content')
<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->

<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">{{ $page_title }}</h1>
        <a href="{{ route('Admin.Links.Create') }}"><button class="btn-primary btn-sm"><i class="fa fa-plus"></i>
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
            <th>Link Title</th>
            <th>Link URL</th>

            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($links as $link)
        <tr data-widget="expandable-table" aria-expanded="false">
            <td>{{ $link->link_title ?? '' }}</td>
            <td>{{ $link->link_url ?? '' }}</td>

            <td>
                {{-- <a href="/admin/link/edit/{{ $link->id }}"> --}}
                    <div style="display: flex; flex-direction:row;">
                        <button type="button" class="btn-warning button-size" data-bs-toggle="modal" data-bs-target="#edit{{ $link->id }}">
                            Update
                          </button>
                {{-- </a> --}}
                {{-- <a href="{{ url('admin/link/delete/'.$link->id) }}"> --}}
                    <button type="button" class="btn-block btn-danger button-size" data-bs-toggle="modal"
                        data-bs-target="#delete{{ $link->id }}">
                            Delete
                          </button>
                        {{-- </a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>

        @foreach($links as $link)
        <div class=" modal fade" id="delete{{ $link->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-footer">
                                    <a href=""><button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">No</button></a>
                                    <a href="{{ url('Admin/Links/Destroy/'.$link->id) }}">
                                        <button type="button" class="btn btn-danger">Yes
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>

                        @endforeach

                        {{-- for update --}}
                        @foreach($links as $link)
                        <div class="modal fade" id="edit{{ $link->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                   <a href="{{ url('Admin/Links/Edit/' .$link->id) }}">
                                    <button type="button" class="btn btn-danger">Yes
                                    </button>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach

</table>





<!-- /.row -->
<!-- Main row -->

<!-- /.row (main row) -->


<script>

    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
    })








@stop
