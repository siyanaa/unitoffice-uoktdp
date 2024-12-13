@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">{{ $page_title }}</h1>
            <a href="{{ url('admin') }}">
                <button class="btn btn-primary btn-sm">
                    <i class="fa fa-arrow-left"></i> Back
                </button>
            </a>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- Display Session Messages -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('successMessage'))
        <div class="alert alert-success">
            {{ session('successMessage') }}
        </div>
    @endif

    <!-- Video Creation Form -->
    <form id="quickForm" method="POST" action="{{ route('Admin.Videos.Store') }}">
        @csrf
        <div class="card-body">
            <!-- Video Description Field -->
            <div class="form-group">
                <label for="vid_desc">Video Description</label>
                <input 
                    type="text" 
                    name="vid_desc" 
                    id="vid_desc" 
                    class="form-control @error('vid_desc') is-invalid @enderror" 
                    placeholder="Description" 
                    value="{{ old('vid_desc') }}" 
                    required>
                @error('vid_desc')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <!-- Video URL Field -->
            <div class="form-group">
                <label for="vid_url">Video URL</label>
                <input 
                    type="text" 
                    name="vid_url" 
                    id="vid_url" 
                    class="form-control @error('vid_url') is-invalid @enderror" 
                    placeholder="YouTube or Vimeo URL" 
                    value="{{ old('vid_url') }}" 
                    required>
                
                @error('vid_url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create Video</button>
        </div>
    </form>
@stop
