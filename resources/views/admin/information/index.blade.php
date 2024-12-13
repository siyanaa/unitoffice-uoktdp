@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $page_title }}</h1>
                    <a href="{{ route('Admin.Informations.Create') }}"><button class="btn-primary btn-sm"><i class="fa fa-plus"></i>
                      Add New</button></a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="table-responsive">
              <table class="table table-bordered table-hover table-responsive">
                  <thead>
                      <tr>
                          <th>S.N.</th>
                          <th>Type</th>
                          <th>Title</th>
                          <th>Docs URI</th>
                          <th>Image</th>
                          <th>File</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($information as $info)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{ $info->id }}</td>
                        <td>{{ $info->contextType->title ?? 'Unknown' }}</td> <!-- Handle null case here -->
                        <td>{{ $info->title ?? '' }}</td>
                        <td width="200px">{{ $info->gdocs ?? '' }}</td>
                        <td><img src="{{ asset($info->image) }}" style="width: 100px; height:100px; object-fit:cover;" /></td>
                        <td><iframe src="{{ asset($info->file) }}" style="width: 100px; height:100px;"></iframe></td>
                        <td>
                            <div style="display: flex; flex-direction:row;">
                                <button type="button" class="btn-warning button-size" data-bs-toggle="modal" data-bs-target="#edit{{ $info->id }}">
                                    Update
                                </button>
                                <button type="button" class="btn-danger button-size" data-bs-toggle="modal" data-bs-target="#delete{{ $info->id }}">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                
                
                  </tbody>
              </table>
          </div>
        @foreach ($information as $info )

        <div class="modal fade" id="delete{{ $info->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                   <a href="{{ url('Admin/Informations/Destroy/' .$info->id) }}">
                    <button type="button" class="btn btn-danger">Yes
                    </button>
                  </a>
                </div>
              </div>
            </div>
          </div>


        @endforeach

        {{-- Update --}}
        @foreach ($information as $info )

        <div class="modal fade" id="edit{{ $info->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                   <a href="{{ url('Admin/Informations/Edit/' .$info->id) }}">
                    <button type="button" class="btn btn-danger">Yes
                    </button>
                  </a>
                </div>
              </div>
            </div>
          </div>


        @endforeach
    </table>

    {{-- <div class="d-flex justify-content-center">
      {!! $information->links() !!}
    </div> --}}



    @if (isset($links) && is_array($links))


    <div class="p-4">

      @foreach ($links as $link )

      <a href="{{ $link[1] }}">
        <button class="btn btn-primary">{{ $link[0] }}</button>
      </a>
      @endforeach
    </div>

    @endif


  </div>

    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
        })
      </script>
@endsection
