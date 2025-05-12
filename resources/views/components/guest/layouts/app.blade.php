@props(['categories'])
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Shager</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>

    <!-- Local CSS files -->
    <link rel="stylesheet" href="{{ asset('website/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('website/css/animate.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('website/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('website/css/fonts.css') }}"/>
    <link rel="stylesheet" href="{{ asset('website/css/owl.carousel.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('website/css/owl.theme.default.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('website/css/magnific-popup.css') }}"/>
    <link rel="stylesheet" href="{{ asset('website/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('website/css/responsive.css') }}"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('website/images/fav-icon.png') }}" type="image/png"/>
</head>

<body>
<div id="preloader">
    <div id="status">
        <img src="{{ asset('website/images/preloader.svg')}}" id="preloader_image" alt="loader">
    </div>
</div>
<!-- top to return -->
<a href=" javascript:;" id="return-to-top" class=""> <i class="fas fa-angle-double-up"></i></a>
<!-- header start -->
<div class="main-header-wrapper1 index2-header float_left">
    <div class="sb-main-header1">
        <div class="menu-items-wrapper menu-item-wrapper3 d-xl-block d-lg-block d-md-none d-sm-none d-none">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-lg-2 col-md-6">
                        <div class="index1-logo">
                            <a href="{{ route('guest.home.index') }}">
                                <img src="{{ asset('website/images/Logo.png') }}" alt="logo" width="100px">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-6 custom-header">
                        <nav class="navbar navbar-expand-lg">
                            <ul class="navbar-nav">
                                <!-- Home Section -->
                                <li class="nav-item menu-click5 ps-rel">
                                    <a class="nav-link" href="{{ route('guest.home.index') }}">
                                        Home
                                    </a>
                                </li>

                                <!-- Jobs Section -->
                                <li class="nav-item menu-click3 ps-rel">
                                    <a class="nav-link" href="javascript:;">
                                        Jobs
                                    </a>
                                    <ul class="dropdown-items menu-open3">
                                        <li><a href="{{ route('guest.jobs.index') }}">Job Details</a></li>
                                    </ul>
                                </li>

                                <!-- Category Section -->
                                <li class="nav-item menu-click2 ps-rel">
                                    <a class="nav-link" href="javascript:;">
                                        Category
                                    </a>
                                    <ul class="dropdown-items menu-open2">
                                        @if($categories->isNotEmpty())
                                            @foreach($categories as $category)
                                                <li>
                                                    <a href="{{ route('guest.categories.show', $category->id) }}">
                                                        {{ $category->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                            <li>
                                                <a href="{{ route('guest.categories.index') }}" > All Categories</a>
                                            </li>
                                        @else
                                            <li>No categories available</li>
                                        @endif
                                    </ul>
                                </li>

                                <!-- Contact Us -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('guest.contact') }}">Contact Us</a>
                                </li>

                                <!-- Auth Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                    </li>
                                @endguest

                                @auth
                                    <li class="nav-item">
                                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="nav-link btn btn-link" style="padding: 0; margin: 0;">Logout</button>
                                        </form>
                                    </li>
                                @endauth
                            </ul>

                        </nav>

                        <ul class="d-xl-flex d-lg-flex d-md-none d-sm-none d-none social-media-icons">
                            <li>
                                <div class="search_bar hidden-xs">
                                    <div class="lv_search_bar" id="search_button">
                                        <a href="javascript:;">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <g>
                                                        <path d="M225.474,0C101.151,0,0,101.151,0,225.474c0,124.33,101.151,225.474,225.474,225.474c124.33,0,225.474-101.144,225.474-225.474C450.948,101.151,349.804,0,225.474,0z M225.474,409.323c-101.373,0-183.848-82.475-183.848-183.848S124.101,41.626,225.474,41.626s183.848,82.475,183.848,183.848S326.847,409.323,225.474,409.323z"></path>
                                                    </g>
                                                    <g>
                                                        <path d="M505.902,476.472L386.574,357.144c-8.131-8.131-21.299-8.131-29.43,0c-8.131,8.124-8.131,21.306,0,29.43l119.328,119.328c4.065,4.065,9.387,6.098,14.715,6.098c5.321,0,10.649-2.033,14.715-6.098C514.033,497.778,514.033,484.596,505.902,476.472z"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                    <div id="search_open" class="lv_search_box" style="display: none;">
                                        <input type="text" placeholder="Search here">
                                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </li>
                            <li class="post-drop">
                                <a class="post-btn" href="javascript:;" aria-label="Post a Job">
                                    <span>Post Now &nbsp;</span>
                                </a>
                                <div class="post-page-wrapper">
                                    <a href="{{ route('guest.jobs.create') }}">Post a Job</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Responsive Menu Start -->
        <div class="mobile-menu-wrapper d-xl-none d-lg-none d-md-block d-sm-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-4">
                        <div class="mobile-logo">
                            <a href="{{ route('guest.home.index') }}">
                                <img src="{{ asset('website/images/index1-logo.png') }}" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-8">
                        <div class="d-flex justify-content-end">
                            <div class="social-media-icons">
                                <ul>
                                    <li class="login-btn">
                                        <a href="javascript:;">
                                            <i class="fa fa-user-o" aria-hidden="true"></i>
                                        </a>
                                        <div class="user-text">
                                            <a href="{{ route('login') }}">
                                                Login
                                            </a>
                                            <a href="{{ route('register') }}">
                                                Sign Up
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="search_bar hidden-xs">
                                            <div class="lv_search_bar" id="search_button1">
                                                <a href="javascript:;">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <g>
                                                                <path d="M225.474,0C101.151,0,0,101.151,0,225.474c0,124.33,101.151,225.474,225.474,225.474c124.33,0,225.474-101.144,225.474-225.474C450.948,101.151,349.804,0,225.474,0z M225.474,409.323c-101.373,0-183.848-82.475-183.848-183.848S124.101,41.626,225.474,41.626s183.848,82.475,183.848,183.848S326.847,409.323,225.474,409.323z"></path>
                                                            </g>
                                                            <g>
                                                                <path d="M505.902,476.472L386.574,357.144c-8.131-8.131-21.299-8.131-29.43,0c-8.131,8.124-8.131,21.306,0,29.43l119.328,119.328c4.065,4.065,9.387,6.098,14.715,6.098c5.321,0,10.649-2.033,14.715-6.098C514.033,497.778,514.033,484.596,505.902,476.472z"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                            <div id="search_open1" class="lv_search_box" style="display: none;">
                                                <input type="text" placeholder="Search here">
                                                <button><i class="fa fa-search" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex">
                                <div class="toggle-main-wrapper mt-2" id="sidebar-toggle">
                                    <span class="line"></span>
                                    <span class="line"></span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sidebar">
            <div class="sidebar_logo">
                <a href="{{ route('guest.home.index') }}">
                    <img src="{{ asset('website/images/index1-logo.png') }}" alt="logo">
                </a>
            </div>
            <div id="toggle_close">&times;</div>
            <div id='cssmenu'>
                <ul class="float_left">
                    <li class="has-sub">
                        <a href="{{ route('guest.home.index') }}">Home</a>
                    </li>
                    <li class="has-sub">
                        <a href="{{ route('guest.jobs.index') }}">Job</a>
                    </li>

                    <li class="has-sub">
                        <a href="javascript:;">Category</a>
                        <ul>
                            <li class="has-sub">
                                <a class="sub-icon">All Categories</a>
                                <ul class="m-sub-dropdown">
                                    <li><a href="{{ route('guest.categories.index') }}">All Categories</a></li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="sub-icon">Single Category</a>
                                <ul class="m-sub-dropdown">
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="{{ route('guest.categories.show', $category->id) }}">
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('guest.contact') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


{{$slot}}

<!-- footer section start -->
<div class="footer-main-wrapper index2-footer-wrapper ">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="sb-footer-section">
                    <div class="footer-logo">
                        <a href="{{ route('guest.home.index') }}">
                            <img src="{{ asset('website/images/index2/logo.png') }}" alt="">
                        </a>
                    </div>
                    <p>Various versions have evolved over the years, sometimes.</p>
                    <ul>
                        <li><a href="javascript:;">
                                125 / Tabula United States location sometimes.</a>
                        </li>
                        <li><a href="javascript:;">
                                tabula@example.com</a>
                        </li>
                        <li>
                            <h4>+1234567890</h4>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="links">
                    <h4>Service</h4>
                    <ul>
                        <li><a href="{{ route('guest.jobs.create') }}" {{-- Post a Job page --}}>
                                Post a Job</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="links">
                    <h4>Our Company</h4>
                    <ul>
                        <li><a href="javascript:;">About Us</a></li>
                        <li><a href="{{ route('guest.categories.index') }}">Category</a></li>
                        <li><a href="javascript:;">Careers</a></li>
                        <li><a href="{{ route('guest.terms') }}">Terms of Service</a></li>
                        <li><a href="{{ route('guest.privacy.policy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('guest.contact') }}">Contact & Support</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="links">
                    <h4>News Letter</h4>
                    <p>Wants to get latest updates! Sign up for free and get started with store.</p>
                    <div class="input-box ps-rel">
                        <input type="text" placeholder="Your mail Address">
                        <button>Subscribe</button>
                    </div>
                    <div class="app-btn">
                        <a href="javascript:;">
                            <img src="{{ asset('website/images/index2/app-btn.png') }}" alt="app">
                        </a>
                        <a href="javascript:;">
                            <img src="{{ asset('website/images/index2/app-btn1.png') }}" alt="app">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom-footer float_left">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <p>© Copyright 2020. All Rights Reserved by Webstrot</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <ul>
                        <li>
                            <a href="javascript:;">
                                       <span>
                                          <svg viewBox="0 0 25 48" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                               xmlns:xlink="http://www.w3.org/1999/xlink">
                                             <g id="Page-22" stroke="none">
                                                <g id="Social-Icons---Isolated3"
                                                   transform="translate(-176.000000, -55.000000)">
                                                   <path
                                                       d="M200.78439,55.3395122 L200.78439,62.9141463 L196.28878,62.9258537 C192.764878,62.9258537 192.085854,64.6 192.085854,67.0468293 L192.085854,72.4673171 L200.48,72.4673171 L199.39122,80.9434146 L192.085854,80.9434146 L192.085854,103 L183.329951,103 L183.329951,80.9434146 L176,80.9434146 L176,72.4673171 L183.329951,72.4673171 L183.329951,66.2156098 C183.329951,58.9570732 187.754146,55 194.24,55 C197.331902,55 200,55.2341463 200.78439,55.3395122 Z"
                                                       id="Facebook4"></path>
                                                </g>
                                             </g>
                                          </svg>
                                       </span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                       <span>
                                          <svg version="1.1" id="Capa_11" xmlns="http://www.w3.org/2000/svg"
                                               xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                               viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                               xml:space="preserve">
                                             <path d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016
                                                c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992
                                                c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056
                                                c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152
                                                c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792
                                                c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44
                                                C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568
                                                C480.224,136.96,497.728,118.496,512,97.248z"></path>
                                          </svg>
                                       </span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                       <span>
                                          <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="m75 512h362c41.355469 0 75-33.644531 75-75v-362c0-41.355469-33.644531-75-75-75h-362c-41.355469 0-75 33.644531-75 75v362c0 41.355469 33.644531 75 75 75zm-45-437c0-24.8125 20.1875-45 45-45h362c24.8125 0 45 20.1875 45 45v362c0 24.8125-20.1875 45-45 45h-362c-24.8125 0-45-20.1875-45-45zm0 0"></path>
                                             <path
                                                 d="m256 391c74.4375 0 135-60.5625 135-135s-60.5625-135-135-135-135 60.5625-135 135 60.5625 135 135 135zm0-240c57.898438 0 105 47.101562 105 105s-47.101562 105-105 105-105-47.101562-105-105 47.101562-105 105-105zm0 0"></path>
                                             <path
                                                 d="m406 151c24.8125 0 45-20.1875 45-45s-20.1875-45-45-45-45 20.1875-45 45 20.1875 45 45 45zm0-60c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0"></path>
                                          </svg>
                                       </span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                       <span>
                                          <svg version="1.1" id="Layer_22" xmlns="http://www.w3.org/2000/svg"
                                               xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                               viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                               xml:space="preserve">
                                             <g>
                                                <g>
                                                   <g>
                                                      <path class="st0" d="M288.7727,379.6177c-31.0821-2.4047-44.1417-17.8159-68.517-32.6133
                                                         c-10.8615,56.9841-23.678,112.0556-53.9793,149.6197c-8.8183,10.9314-26.6251,5.4308-27.3315-8.5965
                                                         c-4.577-90.7884,26.777-162.8616,42.1821-238.8844c-29.2561-49.2489,3.5182-148.377,65.2267-123.9501
                                                         c75.9469,30.0324-65.7538,183.1232,29.3731,202.244c99.312,19.9639,139.8549-172.3209,78.2635-234.8649
                                                         C265.005,2.2744,94.9703,90.5199,115.879,219.7852c3.9603,24.5667,24.5773,35.8323,21.9539,60.118
                                                         c-1.63,15.0815-17.1885,23.7737-30.9302,17.3495c-39.393-18.4189-51.6065-58.7523-49.7335-110.0808
                                                         c3.5243-98.0223,88.0768-166.6563,172.8845-176.1536C337.3106-0.987,437.9776,50.4022,451.8727,151.291
                                                         C467.5057,265.1574,403.4518,388.471,288.7727,379.6177L288.7727,379.6177z"></path>
                                                   </g>
                                                </g>
                                             </g>
                                          </svg>
                                       </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer section end -->
<!-- Side Panel -->
<script src="{{ asset('website/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{ asset('website/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('website/js/wow.js')}}"></script>
<script src="{{ asset('website/js/jquery.magnific-popup.js')}}"></script>
<script src="{{ asset('website/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('website/js/contact_form.js')}}"></script>
<script src="{{ asset('website/js/custom.js')}}"></script>

<!-- custom js -->
<!-- heart icon -->
<script>
    $('.heart a').click(function () {
        if ($(this).hasClass('current')) {
            $(this).removeClass('current');
        } else {
            $('.top_icon span.current').removeClass('current');
            $(this).addClass('current');
        }
    });
</script>

<script>
    $('#search_button').on("click", function (e) {
        $('#search_open').slideToggle();
        e.stopPropagation();
    });

    $(document).on("click", function (e) {
        if (!(e.target.closest('#search_open'))) {
            $("#search_open").slideUp();
        }
    });
</script>

<script>
    $('#search_button1').on("click", function (e) {
        $('#search_open1').slideToggle();
        e.stopPropagation();
    });

    $(document).on("click", function (e) {
        if (!(e.target.closest('#search_open1'))) {
            $("#search_open1").slideUp();
        }
    });
</script>

<!-- هنا نحط الـ stack -->
@stack('scripts')

</body>
</html>

