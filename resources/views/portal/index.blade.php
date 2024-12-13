@extends('portal.layouts.master')

@section('content')
     {{-- <!-- Display Visitor Count -->
     <div class="visitor-count-fixed">
        <div class="visitor-count-box p-2 shadow rounded">
            <p class="visitor-count-number mb-0">{{ $visitorCount }}</p>
            <p class="visitor-count-title mb-0">Visitor Count</p>
        </div>
    </div>
            </div>
        </div> --}}
    </section>

    @include('portal.includes.coverimage')
    

    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                    <div class="inner-column">
                        <div class="sec-title">
                            <h2 class="cat_title">{{ __($about->title) }}</h2>
                        </div>
                        <div class="text">
                            {!! Str::substr($about->content, 0, 550) !!}...
                        </div>
                        <div class="btn-box">
                            <a href="{{ route('About') }}" class="theme-btn btn-style-one">{{ __('Read More') }}<i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInLeft">
                        <figure class="image-1">
                            <a href="#" class="lightbox-image" data-fancybox="images">
                                <img title="Narayan Kaji Shrestha" src="{{ asset('uploads/about/' . $about->image) }}" alt="">
                            </a>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="all_tabs">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="active-tabs">
                        {{-- Render tabs based on context --}}
                        @foreach ($context as $key => $value)
                            <input type="radio" name="active_tabs" id="btn-{{ $key + 1 }}" class="btn-{{ $key + 1 }}" {{ $loop->first ? 'checked' : '' }}>
                            <label for="btn-{{ $key + 1 }}" class="btn">
                                <i class="fa-solid fa-file-pdf"></i> {{ __($value->title) }}
                            </label>
                        @endforeach
    
                        <div class="tabs-container">
                            {{-- Render tab content based on context --}}
                            @foreach ($context as $key => $value)
                                <div class="tab-{{ $key + 1 }}">
                                    {{-- Use getInformationsByType() method to fetch data directly from the Information table --}}
                                    @php
                                        // Fetch the informations by calling get() on the relationship method
                                        $informations = $value->getInformationsByType()->latest()->get();
                                    @endphp
    
                                    @if ($informations->isNotEmpty())
                                        @foreach ($informations as $information)
                                            <div class="row mt-3 mb-3">
                                                <div class="col-md-3 col-3">
                                                    {{-- Check if the information has an image --}}
                                                    @if (isset($information->image))
                                                        <img class="square_image" src="{{ asset($information->image) }}" alt="Document Image">
                                                    @else
                                                        <img class="square_image" src="{{ url('img/logo.png') }}" alt="{{ $information->title }}">
                                                    @endif
                                                </div>
                                                <div class="col-md-6 col-8">
                                                    <p class="post_desc">{{ $information->title }}</p>
                                                </div>
                                                <div class="col-md-3 col-1">
                                                    <p class="font_icons">
                                                        {{-- Download Link --}}
                                                        <a class="nodecoration" target="_blank" href="{{ asset($information->file) }}" download>
                                                            <span class="font_down">
                                                                <i class="fas fa-download"></i>
                                                            </span>
                                                        </a>
                                                        <br><br>
                                                        {{-- View Link --}}
                                                        <a class="nodecoration" href="{{ asset($information->file) }}" target="_blank">
                                                            <span class="font_eye">
                                                                <i class="fas fa-eye"></i>
                                                            </span>
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="post_desc">No files to display</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4">
                    {{-- Embedded Facebook Page --}}
                    <iframe src="{{ $sitesetting->face_page }}" width="100%" height="600" style="border:none; margin-left:5px;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
            </div>
        </div>
    </section>
    
    

    <section class="photo-feature">
        <div class="container">
            <h1 class="cat_title">{{ __('Photo Gallery') }}</h1>
            <div class="row">
                @foreach ($images as $image)
                    <div class="col-md-6 mb-3">
                        <a href="">
                            <div class="accordion">
                                <ul>
                                    @foreach ($image->img as $imgUrl)
                                        <li tabindex="{{ $loop->iteration }}" style="background-image: url('{{ asset($imgUrl) }}');"></li>
                                    @endforeach
                                </ul>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="insta-embed">
        <div class="container">
            <div class="row">
                @foreach ($instas as $insta)
                    <div class="col-md-3">
                        <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="{{ $insta->url }}" data-instgrm-version="14"></blockquote>
                        <script async src="//www.instagram.com/embed.js"></script>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="videos_sec">
        <div class="container">
            <h1 class="cat_title">{{ __('Video Gallery') }}</h1>
            <div class="row">
                @foreach ($videos as $vid)
                    <div class="col-md-4">
                        <div class="card video_card mt-2 mb-2">
                            <!-- Update the src attribute to use $vid->vid_url instead of $videos->vid_url -->
                            <iframe src="{{ $vid->vid_url }}" title="{{ $vid->vid_desc }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="card-body text-center">
                                <span class="vid_desc">{{ $vid->vid_desc }}</span><br>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    

    @include('portal.includes.land_contact')
@endsection
