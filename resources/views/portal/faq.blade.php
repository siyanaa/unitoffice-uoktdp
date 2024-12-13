
@extends('portal.layouts.master')

@section('content')
    <section class="faq-section">
        <div class="container">
            <h1 class="cat_title">
                {{ __('FAQ') }}
            </h1>
            <div class="accordion" id="faqAccordion">
                @foreach ($faqs as $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeading{{ $faq->id }}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faqCollapse{{ $faq->id }}" aria-expanded="true"
                                    aria-controls="faqCollapse{{ $faq->id }}">
                                {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="faqCollapse{{ $faq->id }}" class="accordion-collapse collapse"
                             aria-labelledby="faqHeading{{ $faq->id }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
@endsection 
