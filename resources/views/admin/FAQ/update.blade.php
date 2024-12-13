@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $page_title }}</h1>
                        <a href="{{ url('admin') }}">
                            <button class="btn-primary btn-sm">
                                <i class="fa fa-arrow-left"></i> Back
                            </button>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.faqs.index') }}">FAQs</a></li>
                            <li class="breadcrumb-item active">Edit FAQ</li>
                        </ol>
                    </div>
                </div>

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

                <form id="quickForm" method="POST" action="{{ route('admin.faqs.update', $faq->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" name="question" class="form-control" placeholder="Question" value="{{ $faq->question }}" required>
                        </div>

                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <textarea name="answer" class="form-control" rows="5" placeholder="Answer" required>{{ $faq->answer }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update FAQ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection