<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/niskalaAssets/images/logo-niskala.png') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />

    <title>@yield('title') | OSIS SMANTI</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/sanskaraAssets/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/niskalaAssets/css/smantiPlus.css') }}" />
</head>

<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky background-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/smantiPlus" class="logo">
                            <h1>SMANTI+</h1>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Serach Start ***** -->
                        <div class="search-input" style="width: 100%;">
                            @if (request()->route()->uri != 'smantiPlus/explore' && request()->route()->uri != 'result')
                                <a href="/smantiPlus" class="logo-md d-block d-md-none">
                                    <h1>SMANTI+</h1>
                                </a>
                            @endif
                            @if (request()->route()->uri == 'smantiPlus' ||
                                    request()->route()->uri == 'smantiPlus/searchByType/{slug}' ||
                                    request()->route()->uri == 'smantiPlus/searchByTag/{slug}' ||
                                    request()->route()->uri == 'smantiPlus/explore' ||
                                    request()->route()->uri == 'profile' ||
                                    request()->route()->uri == 'result' ||
                                    request()->route()->uri == 'profile/created')
                                <form id="search"
                                    class="@if (request()->route()->uri != 'smantiPlus/explore' && request()->route()->uri != 'result') d-none d-sm-none d-md-block @endif"
                                    method="GET" action="{{ url('/result') }}">
                                    <input type="text" placeholder="Cari Informasi" id='searchText' name="search"
                                        style="width: 100%;" aria-label="Cari Informasi..."
                                        value="{{ $search }}" />
                                    <i class="fa fa-search"></i>
                                </form>
                            @endif
                        </div>
                        <!-- ***** Serach Start ***** -->
                        <ul class="nav">
                            <div class="d-flex">
                                <li class="scroll-to-section"><a href="/" class="active"><i
                                            class="fa-solid fa-house"></i></a>
                                <li class="scroll-to-section"><a href="/smantiPlus/explore" class="active">Jelajahi</a>
                                </li>
                                @if (Auth::guard('student')->user())
                                    <li class="scroll-to-section d-flex"><a href="/profile" class="active">
                                            <div class="d-flex align-items-center">
                                                Profile
                                                @if (Auth::guard('student')->user()->profile != '')
                                                    <img src="{{ asset('storage/profile/' . Auth::guard('student')->user()->profile) }}"
                                                        alt class="profile-circle" />
                                                @else
                                                    <img src="{{ asset('assets/assets/img/profile-default.png') }}" alt
                                                        class="profile-circle" />
                                                @endif
                                            </div>
                                        </a>
                                    </li>
                                    <li class="scroll-to-section">
                                        <a type="button" class="active" data-bs-toggle="modal"
                                            data-bs-target="#logoutModal">
                                            <i class="fa-solid fa-right-from-bracket"></i>
                                        </a>
                                    </li>
                                @else
                                    @if (!Auth::guard('administrator')->user())
                                        <li class="scroll-to-section">
                                            <a href="/login" class="active">Login</a>
                                        </li>
                                    @else
                                        <li class="scroll-to-section">
                                            <a href="/dashboard" class="active">Dashboard</a>
                                        </li>
                                    @endif
                                @endif
                            </div>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="content">
        @yield('content')

        <!-- Modal -->
        <div class="modal" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda ingin keluar dari akun ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <a href="/logoutStudent" class="btn btn-outline-danger">Keluar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <nav class="navbar fixed-bottom navbar-light bg-light d-block d-md-none">
            <div class="container-fluid justify-content-around">
                <a href="/" class="navbar-brand">
                    <i class="fa-solid fa-house"></i>
                </a>
                <a href="/smantiPlus" class="navbar-brand">
                    <i class="fa-solid fa-circle-info"></i>
                </a>
                <a href="/smantiPlus/explore" class="navbar-brand">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
                @if (Auth::guard('student')->user())
                    <a href="/profile" class="navbar-brand">
                        <i class="fa-solid fa-user"></i>
                    </a>
                    <a type="button" data-bs-toggle="modal" data-bs-target="#logoutModal" class="navbar-brand">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                @else
                    <a href="/login" class="navbar-brand">
                        <i class="fa-solid fa-right-to-bracket"></i>
                    </a>
                @endif
            </div>
        </nav>
    </footer>

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

    <!-- Global Init -->
    <script src="{{ asset('assets/niskalaAssets/js/custom.js') }}"></script>
</body>

</html>
