<?php
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Support\Facades\Session;

$appName = env('APP_NAME');
$sitesetting = SiteSetting::first();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('adminassets/assets/bootstrap/dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('adminassets/vendors/overlayscrollbars/OverlayScrollbars.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('adminassets/assets/css/theme-rtl.min.css') }}" id="style-rtl">
    <link rel="stylesheet" href="{{ asset('adminassets/assets/css/theme.min.css') }}" id="style-default">
    <link rel="stylesheet" href="{{ asset('adminassets/assets/css/user-rtl.min.css') }}" id="user-style-rtl">
    <link rel="stylesheet" href="{{ asset('adminassets/assets/css/user.min.css') }}" id="user-style-default">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminassets/assets/toastr/toastr.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('adminassets/assets/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('adminassets/assets/datatables.net/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('adminassets/assets/datatables.net/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('adminassets/assets/datatables.net/css/buttons.dataTables.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('adminassets/assets/select2/dist/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('adminassets/vendors/flatpickr/flatpickr.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('adminassets/css/custom.css') }}" />

    <style>
        .g-recaptcha {
            margin-bottom: 10px;
        }
    </style>

    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>

<body>
    <main class="main" id="top">
        <div class="container-fluid">
            <div class="row min-vh-100 flex-center g-0">
                <div class="col-lg-8 col-xxl-5 py-3 position-relative">
                    <img class="bg-auth-circle-shape" src="{{ asset('adminassets/assets/img/icons/spot-illustrations/bg-shape.png') }}" alt="" width="250">
                    <img class="bg-auth-circle-shape-2" src="{{ asset('adminassets/assets/img/icons/spot-illustrations/shape-1.png') }}" alt="" width="150">
                    <div class="card overflow-hidden z-index-1">
                        <div class="card-body p-0">
                            <div class="row g-0 h-100">
                                <div class="col-md-5 text-center bg-card-gradient">
                                    <div class="position-relative p-4 pt-md-5 pb-md-7 light">
                                        <div class="bg-holder bg-auth-card-shape" style="background-image:url({{ asset('adminassets/assets/img/icons/spot-illustrations/half-circle.png') }});"></div>
                                        <div class="z-index-1 position-relative">
                                            <a class="link-light mb-4 font-sans-serif fs-4 d-inline-block fw-bolder" href="#">{{ $appName }}</a>
                                            {{-- Example for showing site logo --}}
                                            {{-- <img height="200" width="200" src="{{ asset('uploads/sitesetting/' . $sitesetting->main_logo) }}"> --}}
                                            {{-- <p class="opacity-75 text-white">With the power of Falcon, you can now focus only on functionaries for your digital products, while leaving the UI design on us!</p> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 d-flex flex-center">
                                    <div class="p-4 p-md-5 flex-grow-1">
                                        <div class="row flex-between-center">
                                            <div class="col-auto">
                                                <h3>Account Login</h3>
                                            </div>
                                        </div>
                                        <form id="loginForm" method="post" action="{{ url('login') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label" for="card-email">Email address</label>
                                                <input class="form-control" id="card-email" type="email" name="email" value="{{ old('email') }}">
                                                {{-- Display error message if exists --}}
                                                @error('email')
                                                    <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <div class="d-flex justify-content-between">
                                                    <label class="form-label" for="card-password">Password</label>
                                                    {{-- Display error message if exists --}}
                                                    @error('password')
                                                        <span style="color: red;">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <input class="form-control" id="card-password" type="password" name="password">
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox" id="card-checkbox" checked="checked" name="remember">
                                                    <label class="form-check-label mb-0" for="card-checkbox">Remember me</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <!-- Google reCAPTCHA -->
                                                {{-- <div class="g-recaptcha" data-sitekey="6Lc8uPopAAAAAK6N6iMI4_2j_aC9akT-C8K9bhB2"></div> --}}
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Log in</button>
                                            </div>
                                        </form>
                                        {{-- Example for showing social login buttons --}}
                                        {{-- <div class="position-relative mt-4">
                                            <hr>
                                            <div class="divider-content-center">or log in with</div>
                                        </div>
                                        <div class="row g-2 mt-2">
                                            <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><i class="fab fa-google-plus-g me-2"></i> google</a></div>
                                            <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><i class="fab fa-facebook-square me-2"></i> facebook</a></div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Load Google reCAPTCHA script -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Form submission with reCAPTCHA validation -->
    <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            var response = grecaptcha.getResponse();
            if (response.length === 0) { // reCAPTCHA not verified
                event.preventDefault(); // Prevent form submission
                alert("Please complete the reCAPTCHA to proceed.");
            }
        });
    </script>

    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



           
                    <!-- ===============================================-->
                    <!--    End of Main Content-->
                    <!-- ===============================================-->



                    <!-- ===============================================-->
                    <!--    JavaScripts from dashboard-->
                    <!-- ===============================================-->

                    <script src="{{ asset('adminassets/assets/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
                    <script src="{{ asset('adminassets/assets/jquery-validation/dist/jquery.validate.min.js') }}" type="text/javascript">
                    </script>
                    <script src="{{ asset('adminassets/assets/toastr/toastr.min.js') }}" type="text/javascript"></script>
                    <script src="{{ asset('adminassets/assets/datatables.net/js/jquery.dataTables.min.js') }}" type="text/javascript">
                    </script>
                    <script src="{{ asset('adminassets/assets/datatables.net/js/dataTables.responsive.min.js') }}" type="text/javascript">
                    </script>
                    <script src="{{ asset('adminassets/assets/datatables.net/js/dataTables.buttons.min.js') }}" type="text/javascript">
                    </script>
                    <script src="{{ asset('adminassets/assets/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
                    <script src="{{ asset('adminassets/vendors/popper/popper.min.js') }}"></script>
                    <script src="{{ asset('adminassets/vendors/bootstrap/bootstrap.min.js') }}"></script>
                    <script src="{{ asset('adminassets/vendors/anchorjs/anchor.min.js') }}"></script>
                    <script src="{{ asset('adminassets/vendors/is/is.min.js') }}"></script>
                    <script src="{{ asset('adminassets/vendors/echarts/echarts.min.js') }}"></script>
                    <script src="{{ asset('adminassets/vendors/fontawesome/all.min.js') }}"></script>
                    <script src="{{ asset('adminassets/wwwroot/vendors/lodash/lodash.min.js') }}"></script>
                    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
                    <script src="{{ asset('adminassets/vendors/list.js/list.min.js') }}"></script>
                    <script src="{{ asset('adminassets/assets/js/theme.js') }}"></script>
                    <script src="{{ asset('adminassets/assets/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js') }}" type="text/javascript"></script>
                    <script src="{{ asset('adminassets/assets/select2/dist/js/select2.min.js') }}"></script>
                    <script src="{{ asset('adminassets/assets/jquery-mask/dist/jquery.mask.min.js') }}" type="text/javascript"></script>
                    <script src="{{ asset('adminassets/scripts/language.js') }}"></script>
                    <script src="{{ asset('adminassets/scripts/common.js') }}"></script>
                    <script src="{{ asset('adminassets/assets/js/flatpickr.js') }}"></script>

                    <script type="text/javascript">
                        InitializeUnicodeNepali();
                    </script>

                    <script>
                        $(function() {
                            var current = location.pathname;
                            $('.navbar .nav-item .nav-link ').each(function() {
                                var $this = $(this);
                                // if the current path is like this link, make it active
                                if ($this.attr('href').indexOf(current) !== -1) {
                                    $this.closest("nav-link.dropdown-indicator.collapsed").removeClass('collapsed');
                                    $this.closest(".nav.false.collapse").addClass('show');
                                    $this.addClass('active');
                                }
                            })
                        })
                    </script>
        </body>

        </html>
