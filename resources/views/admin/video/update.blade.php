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
                <li class="breadcrumb-item active">{{ $page_title }}</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <form id="quickForm" method="POST" action="{{ route('Admin.Videos.Update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $video->id }}">
        
        <div class="form-group">
            <label for="vid_desc">Video Description</label>
            <input type="text" 
                   name="vid_desc" 
                   class="form-control @error('vid_desc') is-invalid @enderror" 
                   placeholder="Video Description" 
                   value="{{ old('vid_desc', $video->vid_desc) }}" 
                   required>
            @error('vid_desc')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="vid_url">Video URL</label>
            <input type="text" 
                   name="vid_url" 
                   class="form-control @error('vid_url') is-invalid @enderror" 
                   placeholder="YouTube or Vimeo URL" 
                   value="{{ old('vid_url', $video->vid_url) }}" 
                   required>
            @error('vid_url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Video</button>
        </div>
    </form>
@stop
