<footer class="footer-section">
    <div class="container">
        <div class="footer-cta pt-5">
            <div class="row">
                <div class="col-xl-4 col-md-4 mb-3">
                    <div class="single-cta">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="cta-text">
                            <h4>{{ __('Find us') }}</h4>
                            <span>{{ __($sitesetting->office_address) }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-3">
                    <div class="single-cta">
                        <i class="fas fa-phone"></i>
                        <div class="cta-text">
                            <h4>{{ __('Call us') }}</h4>
                            <span>{{ $sitesetting->office_contact }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-3">
                    <div class="single-cta">
                        <i class="far fa-envelope-open"></i>
                        <div class="cta-text">
                            <h4>{{ __('Mail us') }}</h4>
                            <span>{{ $sitesetting->office_mail }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-content pt-5 pb-5">
            <div class="row">
                <div class="col-xl-4 col-lg-4 mb-3">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('uploads/sitesetting/' . $sitesetting->main_logo) }}" class="side_logo" alt="logo">
                            </a>
                        </div>
                        <div class="footer-social-icon">
                            <span>{{ __('Follow us') }}</span>
                            <a href="{{ $sitesetting->face_link }}"><i class="fab fa-facebook-f facebook-bg"></i></a>
                            <a href="{{ $sitesetting->insta_link }}"><i class="fab fa-twitter twitter-bg"></i></a>
                            <a href="{{ $sitesetting->social_link }}"><i class="fab fa-google-plus-g google-bg"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>{{ __('Useful Links') }}</h3>
                        </div>
                        <ul>
                            <li><a href="{{ route('home') }}">{{ __('HOME') }}</a></li>
                            <li><a href="{{ route('About') }}">{{ __('ABOUT US') }}</a></li>
                            <li><a href="{{ route('Team') }}">{{ __('TEAM') }}</a></li>
                            @foreach ($contextnav as $context)
                                <li><a href="{{ route('information_page', $context->id) }}">{{ __($context->title) }}</a></li>
                            @endforeach
                            <li><a href="{{ route('Images') }}">{{ __('Photo Gallery') }}</a></li>
                            <li><a href="{{ route('Videos') }}">{{ __('Video Gallery') }}</a></li>
                            <li><a href="{{ route('Contact') }}">{{ __('CONTACT') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>{{ __('Important Links') }}</h3>
                        </div>
                        <ul class="quicknepal_link">
                            @foreach ($links as $link)
                                <li><a href="{{ $link->link_url }}" target="_blank">{{ __($link->link_title) }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 text-center text-lg-left">
                    <div class="footer-text white-color">
                        <!-- Display Visitor Count -->
                        <div class="visitor-count-box p-2 shadow rounded ml-3">
                            <i class="fas fa-users visitor-icon"></i> Visitor Count:
                            <span class="visitor-count-number ml-1">{{ $visitorCount }}</span>
                        </div>
                        <p>&copy; {{ $sitesetting->office_name }}, All Rights Reserved.</p>
                    </div>
                    <div class="footer-maintained-by d-flex justify-content-center align-items-center flex-wrap white-color">
                        <span class="mr-1">Maintained by:</span>
                        <a href="https://aashatech.com" target="_blank">
                            <img src="{{ asset('img/whitelogo.png') }}" alt="Aasha Tech Pvt. Ltd." style="height:40px; width:auto;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('js/nepali.js') }}" type="text/javascript"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
