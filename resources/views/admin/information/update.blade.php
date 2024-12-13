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

        <form id="quickForm" novalidate="novalidate" method="POST" action="{{ route('Admin.Informations.Update') }}"
        enctype="multipart/form-data">
        @csrf
        <input name="id" id="" value = "{{ $information->id }}" hidden>
        {{-- <select name="type" id="type">
            <option value="0" disabled selected>--Select Type --</option>
            <option value="notice" {{ $information->type == 'notice' ? 'selected' : '' }}>Notice</option>
            <option value="notice" {{ $information->type == 'oppurtunity' ? 'selected' : '' }}>Oppurtunity</option>
            <option value="pressrelease" {{ $information->type == 'pressrelease' ? 'selected' : '' }}>Press Releases</option>
             <option value="news" {{ $information->type == 'news' ? 'selected' : '' }}>News</option>
             <option value="tender" {{ $information->type == 'tender' ? 'selected' : '' }}>Tender</option>
            <option value="other" {{ $information->type == 'other' ? 'selected' : '' }}>Others</option>
        </select> --}}
        <div class="form-group">
            <label for="context">Context</label>
            <select name ="type">
              {{-- <option value="0" disabled selected> --select type-- </option> --}}
              {{-- @if ($post->getCategories->contains($category->id)) --}}
                @foreach ($context as $contexts )
                <option value ="{{ $contexts->id }}" {{ $contexts->id == $information->get_contexts->pluck('id')->first() ? 'selected' : '' }}>{{ $contexts->title }}</option>
                {{-- @if ($post->getCategories->contains($category->id))selected @endif --}}

                @endforeach

            </select>

        </div>


        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label><span style="color:red; font-size:large"> *</span>
                <input style="width:auto;" type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $information->title }}">
            </div>
            <div>
                <label for="description">Description</label><span style="color:red; font-size:large">
                    *</span>
                <textarea style="max-width: 30%;" type="text" class="form-control" name="description" id="description"
                    placeholder="Add Description">{{ $information->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="gdocs">Google Docs URL</label>
                <input style="width:auto;" type="text" name="gdocs" class="form-control" id="gdocs" placeholder="Google Docs apply form URL" value="{{ $information->gdocs }}">
            </div>

            <div class="form-group">
              <label for="image">Image</label><span style="color:red; font-size:large"> *</span>
              <input type="file" name="image" class="form-control" id="image" onchange="previewImage(event)"
                  placeholder="image" value="">
            </div>
            <img id="preview" style="max-width: 500px; max-height:500px" src="{{ asset('uploads/information/image/' . $information->image) }}"/>

            <div class="form-group">


                    <label for="file">PDF</label><span style="color:red; font-size:large"> *</span>
                    <input type="file" name="file" class="form-control" id="pdf" onchange="previewImage(event)" placeholder="PDF" value="">

            </div>
            <iframe style="max-width:300px; max-height: 300px;" src="{{ asset('uploads/information/file/' . $information->file) }}"></iframe>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn-primary">Submit</button>
        </div>
    </form>








  @stop
