@extends('admin.layouts.master')


@section('content')
 <!-- Content Wrapper. Contains page content -->






        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $page_title }}</h1>
           <a href="{{ url('admin') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</button></a>

           <a href="{{ url('Admin/Mvc/Create') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Add MVC</button></a>

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->

    <!-- /.content-header -->


    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<table class="table table-bordered table-hover">
    <thead>
        <tr>
           <th>S.N.</th>
            <th>Title</th>
            <th>Description</th>

            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mvcs as $mvc)
            <tr data-widget="expandable-table" aria-expanded="false">
                <td width="5%">{{ $loop->iteration }}</td>

                <td>{{ $mvc->title ?? '' }}</td>

                <td>{{ $mvc->description ?? '' }}</td>

                <td>


                        <div style="display: flex; flex-direction:row;">
                          <button type="button" class="btn-warning button-size" data-bs-toggle="modal" data-bs-target="#edit{{ $mvc->id }}">
                            Update
                          </button>


                      <button type="button" class="btn-danger button-size" data-bs-toggle="modal" data-bs-target="#delete{{ $mvc->id }}">
                        Delete
                      </button>
                    </div>

                </td>
            </tr>
        @endforeach
    </tbody>

    {{-- destroy --}}
    @foreach($mvcs as $mvc)

    <div class="modal fade" id="delete{{ $mvc->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
             <a href="{{ url('Admin/Mvc/Destroy/' .$mvc->id) }}">
              <button type="button" class="btn btn-danger">Yes
              </button>
            </a>
          </div>
        </div>
      </div>
    </div>

    @endforeach

    {{-- update --}}

    @foreach($mvcs as $mvc)

    <div class="modal fade" id="edit{{ $mvc->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
             <a href="{{ url('Admin/Mvc/Edit/' .$mvc->id) }}">
              <button type="button" class="btn btn-danger">Yes
              </button>
            </a>
          </div>
        </div>
      </div>
    </div>

    @endforeach
</table>




        <!-- Main row -->




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

    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
    })
    </script>




  @stop
