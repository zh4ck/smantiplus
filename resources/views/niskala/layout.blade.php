<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="{{ asset('assets/niskalaAssets/images/logo-niskala.png') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />

    <title>@yield('title') | OSIS SMANTI</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/sanskaraAssets/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/niskalaAssets/css/osissmanti-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/niskalaAssets/css/owl.css') }}" />
</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/" class="logo">
                            <h5 class="font-weight-bold">OSISMPKSMANTIBOO</h5>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            @if (request()->route()->uri == '/')
                                <li><a href="/" class="">Home</a></li>
                                <li><a href="#info">Informasi</a></li>
                                <li><a href="#osis">OSIS</a></li>
                                <li><a href="#adhyana">MPK</a></li>
                                <li><a href="/smantiPlus">SMANTI+</a></li>
                                <li><a href="/periode2022-2023">OSIS 2022-2023</a></li>
                            @else
                                <li><a href="/">Home</a></li>
                                <li><a href="/#info">Informasi</a></li>
                                <li><a href="/#osis">OSIS</a></li>
                                <li><a href="/#adhyana">MPK</a></li>
                                <li><a href="/smantiPlus">SMANTI+</a></li>
                                <li><a href="/periode2022-2023">OSIS 2022-2023</a></li>
                            @endif

                            @if (Auth::guard('student')->user())
                                <li>
                                    <a href="/profile"
                                        class="btn btn-navbar d-flex align-items-center justify-content-center">
                                        Profile
                                        @if (Auth::guard('student')->user()->profile != '')
                                            <img src="{{ asset('storage/profile/' . Auth::guard('student')->user()->profile) }}"
                                                alt class="profile-circle" />
                                        @else
                                            <img src="{{ asset('assets/assets/img/profile-default.png') }}" alt
                                                class="profile-circle" />
                                        @endif
                                    </a>
                                </li>
                            @else
                                @if (!Auth::guard('administrator')->user())
                                    <li>
                                        <a href="/login"
                                            class="btn btn-navbar d-flex align-items-center justify-content-center px-3">Login</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="/dashboard"
                                            class="btn btn-navbar d-flex align-items-center justify-content-center px-3">Dashboard</a>
                                    </li>
                                @endif
                            @endif
                        </ul>
                        <a class="menu-trigger">
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    @yield('content')

    <!-- ***** footer start ***** -->
    <footer>
        <div class="container container-fluid text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Kontak</h5>
                        <p><i class="fa fa-phone-alt me-1"></i>+012 345 67890</p>
                        <p class="email">
                            <i class="fa fa-envelope me-1"></i>osismpk@smantiboo.sch.id
                        </p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" target="_blank"
                                href="https://www.instagram.com/osismpksmantiboo/?igshid=Yzg5MTU1MDY%3D"><i
                                    class="fa-brands fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" target="_blank"
                                href="https://www.tiktok.com/@osissmantiboo?is_from_webapp=1&sender_device=pc"><i
                                    class="fa-brands fa-tiktok"></i></a>
                            <a class="btn btn-outline-light btn-social" target="_blank"
                                href="https://www.youtube.com/@osissmantiboo6609"><i
                                    class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Halaman</h5>
                        <a class="btn btn-link" href="/">Home</a>
                        @if (request()->route()->uri == '/')
                            <a class="btn btn-link" href="#info">Informasi</a>
                            <a class="btn btn-link" href="#OSIS">OSIS</a>
                            <a class="btn btn-link" href="#niskala">Niskala Ashcharya</a>
                            <a class="btn btn-link" href="#adhyana">Adhyana Sahakara</a>
                            <a class="btn btn-link" href="/smantiPlus">SMANTI+</a>
                            <a class="btn btn-link" href="/periode2022-2023">OSIS 2022-2023</a>
                        @else
                            <a class="btn btn-link" href="/#info">Informasi</a>
                            <a class="btn btn-link" href="/#OSIS">OSIS</a>
                            <a class="btn btn-link" href="/#niskala">Niskala Ashcharya</a>
                            <a class="btn btn-link" href="/#adhyana">Adhyana Sahakara</a>
                            <a class="btn btn-link" href="/smantiPlus">SMANTI+</a>
                            <a class="btn btn-link" href="/periode2022-2023">OSIS 2022-2023</a>
                        @endif
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Sekolah</h5>
                        <p>
                            <a href="https://www.smantiboo.sch.id/" class="text-white mx-1" target="_blank">
                                <i class="fa-solid fa-school fa-fw"></i></a>
                            SMA Negeri 3 Bogor
                        </p>
                        <p>
                            <a href="https://goo.gl/maps/EriexUQFoqsxhz6dA" target="_blank" class="text-white mx-1">
                                <i class="fa-solid fa-map-location-dot fa-fw"></i></a>
                            Jl. Pakuan Indah No.4, RT.01/RW.01, Baranangsiang, Kec. Bogor
                            Tim., Kota Bogor, Jawa Barat 16143
                        </p>
                        <p>
                            <a href="https://www.smantiboo.sch.id/" class="text-white mx-1" target="_blank">
                                <i class="fa-solid fa-globe fa-fw"></i></a>
                            www.smantiboo.sch.id
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Alamat Sekolah</h5>
                        <div class="ratio ratio-1x1">
                            <div>
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.3187909762223!2d106.80877961424373!3d-6.6072511952219015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5e7587abc6f%3A0x415df8e0b0afb5a9!2s3%20Bogor%20Senior%20High%20School!5e0!3m2!1sen!2sid!4v1677341606883!5m2!1sen!2sid"
                                    width="200" height="200" style="border: 0" allowfullscreen=""
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright">
                        Copyright &copy; OSIS MPK SMAN 3 BOGOR-2024, All
                        Right Reserved. Created by <a href="https://www.instagram.com/mirachelcj_/"
                            class="text-white">MC</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** footer End ***** -->

    <!-- jQuery -->
    <script src="{{ asset('assets/niskalaAssets/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/niskalaAssets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/niskalaAssets/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('assets/niskalaAssets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('assets/niskalaAssets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/niskalaAssets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/niskalaAssets/js/imgfix.min.js') }}"></script>
    <script src="{{ asset('assets/niskalaAssets/js/owl-carousel.js') }}"></script>

    <!-- Global Init -->
    <script src="{{ asset('assets/niskalaAssets/js/custom.js') }}"></script>
</body>

</html>
