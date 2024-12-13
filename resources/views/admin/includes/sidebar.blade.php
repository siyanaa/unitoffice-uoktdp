
<?php
use App\Models\SiteSetting;
    $sitesetting = SiteSetting::first();
?>

<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">
            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
                data-bs-placement="left" aria-label="Toggle Navigation" data-bs-original-title="Toggle Navigation"><span
                    class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
        </div><a class="navbar-brand" href="{{ route('admin.index') }}">
            <div class="d-flex align-items-center py-3">
                {{-- <img class="me-2"
                    src="{{ asset('uploads/sitesetting/' . $sitesetting->side_logo) }}" alt="Admin Logo"
                    width="40"> --}}
                    <span class="font-sans-serif">Admin</span></div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                    <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard" role="button"
                        data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><svg
                                    class="svg-inline--fa fa-chart-pie fa-w-17" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="chart-pie" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 544 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M527.79 288H290.5l158.03 158.03c6.04 6.04 15.98 6.53 22.19.68 38.7-36.46 65.32-85.61 73.13-140.86 1.34-9.46-6.51-17.85-16.06-17.85zm-15.83-64.8C503.72 103.74 408.26 8.28 288.8.04 279.68-.59 272 7.1 272 16.24V240h223.77c9.14 0 16.82-7.68 16.19-16.8zM224 288V50.71c0-9.55-8.39-17.4-17.84-16.06C86.99 51.49-4.1 155.6.14 280.37 4.5 408.51 114.83 513.59 243.03 511.98c50.4-.63 96.97-16.87 135.26-44.03 7.9-5.6 8.42-17.23 1.57-24.08L224 288z">
                                    </path>
                                </svg>
                                <!-- <span class="fas fa-chart-pie"></span> Font Awesome fontawesome.com --></span><span
                                class="nav-link-text ps-1">Dashboard</span></div>
                    </a>
                    <ul class="nav collapse show" id="dashboard">
                        <li class="nav-item"><a class="nav-link" href="{{ route('Admin.Sitesettings.Index') }}">
                                <div class="d-flex align-items-center"><span
                                        class="nav-link-text ps-1">SiteSetting</span></div>
                            </a><!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('Admin.Coverimage.Index') }}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Cover
                                        Image</span></div>
                            </a><!-- more inner pages-->
                        </li>

                        <li class="nav-item"><a class="nav-link" href="{{ route('Admin.Abouts.Index') }}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">About Us</span>
                                </div>
                            </a><!-- more inner pages-->
                        </li>
                        {{-- <li class="nav-item"><a class="nav-link" href="{{ route('Admin.Mvc.Index') }}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Mission, Vision, Values</span>
                                </div>
                            </a><!-- more inner pages-->
                        </li> --}}
                        <li class="nav-item"><a class="nav-link" href="{{ route('Admin.Orgchart.Index') }}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Organizational Chart</span>
                                </div>
                            </a><!-- more inner pages-->
                        </li>

                        <li class="nav-item"><a class="nav-link" href="{{ route('Admin.Favicons.Index') }}">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                                    Favicon</span></div>
                        </a><!-- more inner pages-->
                    </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Site</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider">
                        </div>
                    </div><!-- parent pages-->


                    {{-- <a class="nav-link dropdown-indicator" href="#email" role="button" data-bs-toggle="collapse"
                      aria-expanded="false" aria-controls="email">
                      <div class="d-flex align-items-center"><span class="nav-link-icon"><svg
                                  class="svg-inline--fa fa-wrench fa-w-16" aria-hidden="true" focusable="false"
                                  data-prefix="fas" data-icon="wrench" role="img"
                                  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                  <path fill="currentColor"
                                      d="M507.73 109.1c-2.24-9.03-13.54-12.09-20.12-5.51l-74.36 74.36-67.88-11.31-11.31-67.88 74.36-74.36c6.62-6.62 3.43-17.9-5.66-20.16-47.38-11.74-99.55.91-136.58 37.93-39.64 39.64-50.55 97.1-34.05 147.2L18.74 402.76c-24.99 24.99-24.99 65.51 0 90.5 24.99 24.99 65.51 24.99 90.5 0l213.21-213.21c50.12 16.71 107.47 5.68 147.37-34.22 37.07-37.07 49.7-89.32 37.91-136.73zM64 472c-13.25 0-24-10.75-24-24 0-13.26 10.75-24 24-24s24 10.74 24 24c0 13.25-10.75 24-24 24z">
                                  </path>
                              </svg>

                          </span><span
                              class="nav-link-text ps-1">SiteSetting</span></div>
                  </a>
                  <ul class="nav collapse" id="email">
                      <li class="nav-item"><a class="nav-link" href="{{ route('admin.sitesetting.index') }}">
                              <div class="d-flex align-items-center"><span
                                      class="nav-link-text ps-1">SiteSetting</span></div>
                          </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('admin.coverimage.index') }}">
                              <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Cover
                                      Image</span></div>
                          </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="">
                              <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Background
                                      Image</span></div>
                          </a><!-- more inner pages-->
                      <li class="nav-item"><a class="nav-link" href="{{ route('admin.about.index') }}">
                              <div class="d-flex align-items-center"><span class="nav-link-text ps-1">About Us</span>
                              </div>
                          </a><!-- more inner pages-->
                      <li class="nav-item"><a class="nav-link" href="{{ route('admin.mvc.index') }}">
                              <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Mission Vision
                                      & Values</span></div>
                          </a><!-- more inner pages-->
                      </li>
                  </ul> --}}
                    <!-- parent pages-->

                    <!-- parent pages-->
                    {{--  <a class="nav-link" href="{{ route('admin.pricing.index') }}" role="button">
                      <div class="d-flex align-items-center"><span class="nav-link-icon"><svg
                                  class="svg-inline--fa fa-calendar-alt fa-w-14" aria-hidden="true"
                                  focusable="false" data-prefix="fas" data-icon="calendar-alt" role="img"
                                  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                  <path fill="currentColor"
                                      d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z">
                                  </path>
                              </svg>

                            </span><span
                              class="nav-link-text ps-1">Pricing</span></div>
                  </a>
                   --}}

                    <!-- parent pages-->


                    <a class="nav-link dropdown-indicator" href="#events" role="button" data-bs-toggle="collapse"
                        aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center"><span class="nav-link-icon">
                            <i class="fas fa-users"></i>
                            </span><span class="nav-link-text ps-1">Team</span></div>
                    </a>
                    <ul class="nav collapse" id="events">
                        <li class="nav-item"><a class="nav-link" href="{{ route('Admin.Teams.Index') }}">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Team</span>
                            </div>
                        </a>
                    </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('Admin.Executivedetails.Index') }}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Executive Members</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('Admin.Committeedetails.Index') }}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Committee Members</span>
                                </div>
                            </a>
                        </li>

                    </ul>

                    <!-- parent pages-->

                    <a class="nav-link dropdown-indicator" href="#eventsone" role="button" data-bs-toggle="collapse"
                        aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center"><span class="nav-link-icon">
                            <i class="fas fa-images"></i>
                            </span><span class="nav-link-text ps-1">Gallery</span></div>
                    </a>
                    <ul class="nav collapse" id="eventsone">
                        <li class="nav-item"><a class="nav-link" href="{{ route('Admin.Images.Index') }}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Image</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('Admin.Videos.Index') }}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Video</span>
                                </div>
                            </a>
                        </li>
                    </ul>







                    <a class="nav-link" href="{{ route('Admin.Message.Index') }}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon">
                            <i class="fas fa-comment-dots"></i>
                                <!-- <span class="fas fa-comments"></span> Font Awesome fontawesome.com --></span><span
                                class="nav-link-text ps-1">Message</span></div>
                    </a>

                    <a class="nav-link dropdown-indicator" href="#email" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="email">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><svg class="svg-inline--fa fa-envelope-open fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope-open" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 464c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V200.724a48 48 0 0 1 18.387-37.776c24.913-19.529 45.501-35.365 164.2-121.511C199.412 29.17 232.797-.347 256 .003c23.198-.354 56.596 29.172 73.413 41.433 118.687 86.137 139.303 101.995 164.2 121.512A48 48 0 0 1 512 200.724V464zm-65.666-196.605c-2.563-3.728-7.7-4.595-11.339-1.907-22.845 16.873-55.462 40.705-105.582 77.079-16.825 12.266-50.21 41.781-73.413 41.43-23.211.344-56.559-29.143-73.413-41.43-50.114-36.37-82.734-60.204-105.582-77.079-3.639-2.688-8.776-1.821-11.339 1.907l-9.072 13.196a7.998 7.998 0 0 0 1.839 10.967c22.887 16.899 55.454 40.69 105.303 76.868 20.274 14.781 56.524 47.813 92.264 47.573 35.724.242 71.961-32.771 92.263-47.573 49.85-36.179 82.418-59.97 105.303-76.868a7.998 7.998 0 0 0 1.839-10.967l-9.071-13.196z"></path></svg><!-- <span class="fas fa-envelope-open"></span> Font Awesome fontawesome.com --></span><span class="nav-link-text ps-1">Post</span></div>
                      </a>
                      <ul class="nav collapse" id="email">
                        <li class="nav-item"><a class="nav-link" href="{{ route('Admin.Categories.Index') }}">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Category</span></div>
                          </a><!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('Admin.Posts.Index') }}">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Post</span></div>
                          </a><!-- more inner pages-->
                        </li>

                      </ul><!-- parent pages-->





                    <a class="nav-link" href="{{ route('Admin.Insta.Index') }}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon">
                            <i class="fas fa-sort-alpha-up"></i>
                                <!-- <span class="fas fa-comments"></span> Font Awesome fontawesome.com --></span><span
                                class="nav-link-text ps-1">Instagram</span></div>
                    </a>


                    <a class="nav-link" href="{{ route('Admin.Links.Index') }}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon">
                            <i class="fas fa-link"></i>
                                <!-- <span class="fas fa-comments"></span> Font Awesome fontawesome.com --></span><span
                                class="nav-link-text ps-1">Link</span></div>
                    </a>

                    <a class="nav-link" href="{{ route('admin.faqs.index') }}">
                        <div class="d-flex align-items-center"><span class="nav-link-icon">
                            <i class="fas fa-question-circle"></i>
                            </span><span class="nav-link-text ps-1">FAQ</span></div>
                    </a>

                    {{-- <a class="nav-link" href="{{ route('Admin.Youth.Index') }}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon">
                            <i class="fas fa-sitemap"></i>

                                {{-- <!-- <span class="fas fa-comments"></span> Font Awesome fontawesome.com --></span><span
                                class="nav-link-text ps-1">Youth Activity/Stats</span></div> --}}
                    {{-- </a> --}} 

                    <a class="nav-link dropdown-indicator" href="#user" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="user">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><svg class="svg-inline--fa fa-user fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg><!-- <span class="fas fa-user"></span> Font Awesome fontawesome.com --></span><span class="nav-link-text ps-1">Documents</span></div>
                      </a>
                      <ul class="nav collapse" id="user">
                        <li class="nav-item"><a class="nav-link" href="{{ route('Admin.Informations.Index') }}">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Document Posts</span></div>
                          </a><!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('Admin.Context.Index') }}">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Document</span></div>
                          </a><!-- more inner pages-->
                        </li>
                      </ul>



                    {{-- <a class="nav-link" href="{{ route('admin.other.index') }}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon">
                            <i class="fas fa-paste"></i>
                                <!-- <span class="fas fa-comments"></span> Font Awesome fontawesome.com --></span><span
                                class="nav-link-text ps-1">News, Other</span></div>
                    </a> --}}

                    <a class="nav-link" href="{{ route('Admin.Contactus.Index') }}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon">
                            <i class="fas fa-address-card"></i>
                                <!-- <span class="fas fa-comments"></span> Font Awesome fontawesome.com --></span><span
                                class="nav-link-text ps-1">Contact Request</span></div>
                    </a>






                    {{-- <a class="nav-link dropdown-indicator" href="#events" role="button" data-bs-toggle="collapse"
                      aria-expanded="false" aria-controls="events">
                      <div class="d-flex align-items-center"><span class="nav-link-icon"><svg
                                  class="svg-inline--fa fa-palette fa-w-16" aria-hidden="true" focusable="false"
                                  data-prefix="fas" data-icon="palette" role="img"
                                  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                  <path fill="currentColor"
                                      d="M204.3 5C104.9 24.4 24.8 104.3 5.2 203.4c-37 187 131.7 326.4 258.8 306.7 41.2-6.4 61.4-54.6 42.5-91.7-23.1-45.4 9.9-98.4 60.9-98.4h79.7c35.8 0 64.8-29.6 64.9-65.3C511.5 97.1 368.1-26.9 204.3 5zM96 320c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm32-128c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128-64c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128 64c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z">
                                  </path>
                              </svg>
                              class="nav-link-text ps-1">Gallery</span></div>
                  </a>
                  <ul class="nav collapse" id="events">
                      <li class="nav-item"><a class="nav-link" href="{{ route('admin.gallery.index') }}">
                              <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Images</span>
                              </div>
                          </a>
                      </li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('admin.video.index') }}">
                              <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Videos</span>
                              </div>
                          </a>
                      </li>
                  </ul> --}}



                    {{-- <a class="nav-link" href="{{ route('admin.contact.index') }}" role="button">
                      <div class="d-flex align-items-center"><span class="nav-link-icon"><svg
                                  class="svg-inline--fa fa-shopping-cart fa-w-18" aria-hidden="true"
                                  focusable="false" data-prefix="fas" data-icon="shopping-cart" role="img"
                                  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                  <path fill="currentColor"
                                      d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z">
                                  </path>
                              </svg>
                              <!-- <span class="fab fa-trello"></span> Font Awesome fontawesome.com --></span><span
                              class="nav-link-text ps-1">Contact Request</span></div>
                  </a> --}}
                </li>

                {{-- <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Pages</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider">
                        </div>
                    </div><!-- parent pages--><a class="nav-link" href="pages/starter.html" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><svg
                                    class="svg-inline--fa fa-flag fa-w-16" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="flag" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M349.565 98.783C295.978 98.783 251.721 64 184.348 64c-24.955 0-47.309 4.384-68.045 12.013a55.947 55.947 0 0 0 3.586-23.562C118.117 24.015 94.806 1.206 66.338.048 34.345-1.254 8 24.296 8 56c0 19.026 9.497 35.825 24 45.945V488c0 13.255 10.745 24 24 24h16c13.255 0 24-10.745 24-24v-94.4c28.311-12.064 63.582-22.122 114.435-22.122 53.588 0 97.844 34.783 165.217 34.783 48.169 0 86.667-16.294 122.505-40.858C506.84 359.452 512 349.571 512 339.045v-243.1c0-23.393-24.269-38.87-45.485-29.016-34.338 15.948-76.454 31.854-116.95 31.854z">
                                    </path>
                                </svg>
                                <!-- <span class="fas fa-flag"></span> Font Awesome fontawesome.com --></span><span
                                class="nav-link-text ps-1">Starter</span></div>
                    </a>
                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#authentication" role="button"
                        data-bs-toggle="collapse" aria-expanded="false" aria-controls="authentication">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><svg
                                    class="svg-inline--fa fa-lock fa-w-14" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="lock" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z">
                                    </path>
                                </svg>
                                <!-- <span class="fas fa-lock"></span> Font Awesome fontawesome.com --></span><span
                                class="nav-link-text ps-1">Authentication</span></div>
                    </a>
                    <ul class="nav collapse" id="authentication">
                        <li class="nav-item"><a class="nav-link dropdown-indicator" href="#simple"
                                data-bs-toggle="collapse" aria-expanded="false" aria-controls="authentication">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Simple</span>
                                </div>
                            </a><!-- more inner pages-->
                            <ul class="nav collapse" id="simple">
                                <li class="nav-item"><a class="nav-link"
                                        href="pages/authentication/simple/login.html">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text ps-1">Login</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="pages/authentication/simple/logout.html">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text ps-1">Logout</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="pages/authentication/simple/reset-password.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Reset
                                                password</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="pages/authentication/simple/lock-screen.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Lock
                                                screen</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link dropdown-indicator" href="#card"
                                data-bs-toggle="collapse" aria-expanded="false" aria-controls="authentication">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Card</span>
                                </div>
                            </a><!-- more inner pages-->
                            <ul class="nav collapse" id="card">
                                <li class="nav-item"><a class="nav-link" href="pages/authentication/card/login.html">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text ps-1">Login</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="pages/authentication/card/logout.html">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text ps-1">Logout</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="pages/authentication/card/register.html">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text ps-1">Register</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="pages/authentication/card/forgot-password.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Forgot
                                                password</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="pages/authentication/card/confirm-mail.html">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text ps-1">Confirm mail</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="pages/authentication/card/reset-password.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Reset
                                                password</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="pages/authentication/card/lock-screen.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Lock
                                                screen</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link dropdown-indicator" href="#split"
                                data-bs-toggle="collapse" aria-expanded="false" aria-controls="authentication">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Split</span>
                                </div>
                            </a><!-- more inner pages-->
                            <ul class="nav collapse" id="split">
                                <li class="nav-item"><a class="nav-link"
                                        href="pages/authentication/split/login.html">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text ps-1">Login</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="pages/authentication/split/logout.html">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text ps-1">Logout</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="pages/authentication/split/register.html">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text ps-1">Register</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="pages/authentication/split/forgot-password.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Forgot
                                                password</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="pages/authentication/split/confirm-mail.html">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text ps-1">Confirm mail</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="pages/authentication/split/reset-password.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Reset
                                                password</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="pages/authentication/split/lock-screen.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Lock
                                                screen</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="pages/authentication/wizard.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Wizard</span>
                                </div>
                            </a><!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#authentication-modal"
                                data-bs-toggle="modal">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Modal</span>
                                </div>
                            </a><!-- more inner pages-->
                        </li>
                    </ul>
                    <!-- parent pages-->

                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Modules</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider">
                        </div>
                    </div>

                    <!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#tables" role="button" data-bs-toggle="collapse"
                        aria-expanded="false" aria-controls="tables">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><svg
                                    class="svg-inline--fa fa-table fa-w-16" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="table" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M464 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zM224 416H64v-96h160v96zm0-160H64v-96h160v96zm224 160H288v-96h160v96zm0-160H288v-96h160v96z">
                                    </path>
                                </svg>
                                <!-- <span class="fas fa-table"></span> Font Awesome fontawesome.com --></span><span
                                class="nav-link-text ps-1">Tables</span></div>
                    </a>
                    <ul class="nav collapse" id="tables">
                        <li class="nav-item"><a class="nav-link" href="modules/tables/basic-tables.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Basic
                                        tables</span></div>
                            </a><!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="modules/tables/advance-tables.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Advance
                                        tables</span></div>
                            </a><!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="modules/tables/bulk-select.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Bulk
                                        select</span></div>
                            </a><!-- more inner pages-->
                        </li>
                    </ul>
                </li> --}}

        </div>
    </div>
</nav>
