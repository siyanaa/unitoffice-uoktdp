@extends('portal.layouts.master')

@section('content')

<section class="single_page">
    <div class="container">
        <h3 class="cat_title">{{ __("Employee Details") }}</h3>
        <div class="row mt-3">
            @foreach ($teams as $team)
                <div class="col-md-3">
                    <div class="card team_card mt-2 mb-2">
                        <div class="image-wrapper">
                            @if ($team->image)
                                <img src="{{ asset('uploads/team/' . $team->image) }}" class="card-img-top image" alt="{{ $team->name }}">
                            @else
                                <img src="{{ asset('img/logo.png') }}" class="card-img-top image" alt="Default Image">
                            @endif
                        </div>
                        <div class="card-body">
                            @if(app()->getLocale() == 'ne')
                                <span class="team_name">{{ $team->name }}</span>
                            @else
                                <span class="team_name">{{ $team->name_en }}</span>
                            @endif
                            <br>
                            <span class="team_position">{{ __($team->position) }}</span><br>
                            <span class="team_email">{{ $team->email }}</span><br>
                            <span class="team_contact">{{ $team->contact_number }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
