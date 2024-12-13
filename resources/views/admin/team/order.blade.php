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


    @if (session('message'))
    <div class="alert alert-success">
        {!! session('message') !!}
    </div>
@endif
{{--
@if (session('error'))
    <div class="alert alert-danger">
        {!! session('error') !!}
    </div>
@endif --}}
    <form action="{{ route('Admin.Teams.Updateorder') }}" method="POST">
        @csrf

    <ul id="sortable">
        @foreach($teams as $team)



           <li data-id="{{ $team->id }}">
            <input name="teamOrders[]" type="hidden" value="{{ $team->id }}"> {{ $team->name }}=>{{ $team->position }}
        </li>
        @endforeach
    </ul>

    <div class="card-footer">
        <button type="submit" class="btn-primary">Submit</button>
    </div>
    </form>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sortablejs/Sortable.min.js"></script>
    <script>
        new Sortable(document.getElementById('sortable'), {
            onEnd: function (event) {
                var teamOrders = Array.from(event.item.parentElement.children).map(function (el, index) {
                    return { order: index, teamId: el.getAttribute('data-id') };
                });

                axios.post('/team/reorder', { teamOrders: teamOrders })
                    .then(function (response) {
                        // Success message or other handling
                    })
                    .catch(function (error) {
                        // Error handling
                    });
            }
            // ,
            // onUpdate: function (event) {
            //     var teamId = event.item.getAttribute('data-id');
            //     var teamName = event.item.textContent.trim();

            //     axios.post('/teams/updateOrder', { teamId: teamId, teamName: teamName })
            //         .then(function (response) {
            //         })
            //         .catch(function (error) {
            //         });
            // }
        });
    </script>




    </form>




@stop
