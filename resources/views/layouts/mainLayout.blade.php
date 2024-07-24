<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets/assets/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') | OSIS SMANTI</title>

    <meta name="description" content="" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/assets/img/logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/assets/vendor/fonts/boxicons.css') }}" />
    

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('assets/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="/dashboard" class="app-brand-link">
                        <span class="app-brand-text demo menu-text fw-bolder ms-2"> <img
                                src="{{ asset('assets/assets/img/logo.png') }}" alt="" width="30px">
                            ADMIN SMANTI+</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    @if (Auth::guard('administrator')->user()->role_id != 3)
                        <li class="menu-item @if (request()->route()->uri == 'dashboard') active @endif">
                            <a href="/dashboard" class="menu-link">
                                <i class="menu-icon fa-fw fa-solid fa-gauge-high"></i>
                                <div data-i18n="Analytics">Dashboard</div>
                            </a>
                        </li>
                        <li class="menu-item @if (request()->route()->uri == 'type') active @endif">
                            <a href="/type" class="menu-link">
                                <i class="menu-icon fa-fw fa-solid fa-table-cells-large"></i>
                                <div data-i18n="Analytics">Jenis</div>
                            </a>
                        </li>
                        <li class="menu-item @if (request()->route()->uri == 'category') active @endif">
                            <a href="/category" class="menu-link">
                                <i class="menu-icon fa-fw fa-solid fa-hashtag"></i>
                                <div data-i18n="Analytics">Tag</div>
                            </a>
                        </li>
                        <li class="menu-item @if (request()->route()->uri == 'info' ||
                                request()->route()->uri == 'info-add' ||
                                request()->route()->uri == 'info-detail/{slug}') active @endif">
                            <a href="/info" class="menu-link">
                                <i class="menu-icon fa-fw fa-solid fa-info"></i>
                                <div data-i18n="Analytics">Daftar Informasi</div>
                            </a>
                        </li>
                        <li class="menu-item @if (request()->route()->uri == 'info-archived') active @endif">
                            <a href="/info-archived" class="menu-link">
                                <i class="menu-icon fa-fw fa-solid fa-box-archive"></i>
                                <div data-i18n="Analytics">Informasi Diarsipkan</div>
                            </a>
                        </li>
                        @if (Auth::guard('administrator')->user()->role_id != 2)
                            <li class="menu-item @if (request()->route()->uri == 'users-grid' ||
                                    request()->route()->uri == 'users-list' ||
                                    request()->route()->uri == 'userDetail/{slug}' ||
                                    request()->route()->uri == 'adminDetail/{slug}' ||
                                    request()->route()->uri == 'admin-list' ||
                                    request()->route()->uri == 'admin-grid' ||
                                    request()->route()->uri == 'admin-add') active open @endif">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon fa-fw fa-solid fa-users"></i>
                                    <div data-i18n="Daftar Akun">Daftar Akun</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item @if (request()->route()->uri == 'users-grid' ||
                                            request()->route()->uri == 'userDetail/{slug}' ||
                                            request()->route()->uri == 'users-list') active @endif">
                                        <a href="/users-grid" class="menu-link">
                                            <div data-i18n="Siswa">Siswa</div>
                                        </a>
                                    </li>
                                    <li class="menu-item @if (request()->route()->uri == 'admin-grid' ||
                                            request()->route()->uri == 'admin-list' ||
                                            request()->route()->uri == 'adminDetail/{slug}' ||
                                            request()->route()->uri == 'admin-add') active @endif">
                                        <a href="/admin-grid" class="menu-link">
                                            <div data-i18n="Pengurus">Pengurus</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li class="menu-item @if (request()->route()->uri == 'requestRoleList') active @endif">
                            <a href="/requestRoleList" class="menu-link">
                                <i class="menu-icon fa-fw fa-regular fa-hand-point-up"></i>
                                <div data-i18n="Analytics">Request Penulis</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="/" class="menu-link">
                                <i class="menu-icon fa-fw fa-solid fa-house"></i>
                                <div data-i18n="Analytics">Halaman Utama</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="/smantiPlus" class="menu-link">
                                <i class="menu-icon fa-fw fa-solid fa-square-plus"></i>
                                <div data-i18n="Analytics">SMANTI+</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                @if (request()->route()->uri == 'users-grid')
                                    <i class="bx bx-search fs-4 lh-0"></i>
                                    <form method="GET" action="{{ url('/users-grid') }}">
                                        <input type="text" name="search" id="search"
                                            class="form-control border-0 shadow-none" placeholder="Cari Siswa..."
                                            aria-label="Cari Siswa..." autofocus="true"
                                            value="{{ $search }}" />
                                    </form>
                                @elseif (request()->route()->uri == 'users-list')
                                    <i class="bx bx-search fs-4 lh-0"></i>
                                    <form method="GET" action="{{ url('/users-list') }}">
                                        <input type="text" name="search" id="search"
                                            class="form-control border-0 shadow-none" placeholder="Cari Siswa..."
                                            aria-label="Cari Siswa..." autofocus="true"
                                            value="{{ $search }}" />
                                    </form>
                                @elseif (request()->route()->uri == 'admin-list')
                                    <i class="bx bx-search fs-4 lh-0"></i>
                                    <form method="GET" action="{{ url('/admin-list') }}">
                                        <input type="text" name="search" id="search"
                                            class="form-control border-0 shadow-none" placeholder="Cari Pengurus..."
                                            aria-label="Cari Pengurus..." autofocus="true"
                                            value="{{ $search }}" />
                                    </form>
                                @elseif (request()->route()->uri == 'admin-grid')
                                    <i class="bx bx-search fs-4 lh-0"></i>
                                    <form method="GET" action="{{ url('/admin-grid') }}">
                                        <input type="text" name="search" id="search"
                                            class="form-control border-0 shadow-none" placeholder="Cari Pengurus..."
                                            aria-label="Cari Pengurus..." autofocus="true"
                                            value="{{ $search }}" />
                                    </form>
                                @elseif (request()->route()->uri == 'info')
                                    <i class="bx bx-search fs-4 lh-0"></i>
                                    <form method="GET" action="{{ url('/info') }}">
                                        <input type="text" name="search" id="search"
                                            class="form-control border-0 shadow-none" placeholder="Cari Informasi..."
                                            aria-label="Cari Informasi..." autofocus="true"
                                            value="{{ $search }}" />
                                    </form>
                                @elseif (request()->route()->uri == 'info-archived')
                                    <i class="bx bx-search fs-4 lh-0"></i>
                                    <form method="GET" action="{{ url('/info-archived') }}">
                                        <input type="text" name="search" id="search"
                                            class="form-control border-0 shadow-none" placeholder="Cari Informasi..."
                                            aria-label="Cari Informasi..." autofocus="true"
                                            value="{{ $search }}" />
                                    </form>
                                @elseif (request()->route()->uri == 'category')
                                    <i class="bx bx-search fs-4 lh-0"></i>
                                    <form method="GET" action="{{ url('/category') }}">
                                        <input type="text" name="search" id="search"
                                            class="form-control border-0 shadow-none" placeholder="Cari Tag..."
                                            aria-label="Cari Tag..." autofocus="true" value="{{ $search }}" />
                                    @elseif (request()->route()->uri == 'type')
                                        <i class="bx bx-search fs-4 lh-0"></i>
                                        <form method="GET" action="{{ url('/type') }}">
                                            <input type="text" name="search" id="search"
                                                class="form-control border-0 shadow-none" placeholder="Cari Jenis..."
                                                aria-label="Cari Jenis..." autofocus="true"
                                                value="{{ $search }}" />
                                        </form>
                                @endif
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->
                            <li class="nav-item lh-1 me-1">
                                <div class="flex-grow-1 text-end">
                                    <span
                                        class="fw-semibold d-block">{{ Auth::guard('administrator')->user()->username }}</span>
                                </div>
                            </li>

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        @if (Auth::guard('administrator')->user()->profile != '')
                                            <img src="{{ asset('storage/profile/' . Auth::guard('administrator')->user()->profile) }}"
                                                alt class="w-px-40 rounded-circle" />
                                        @else
                                            <img src="{{ asset('assets/assets/img/profile-default.png') }}" alt
                                                class="w-px-40 rounded-circle" />
                                        @endif
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        @if (Auth::guard('administrator')->user()->profile != '')
                                                            <img src="{{ asset('storage/profile/' . Auth::guard('administrator')->user()->profile) }}"
                                                                alt class="w-px-40 rounded-circle" />
                                                        @else
                                                            <img src="{{ asset('assets/assets/img/profile-default.png') }}"
                                                                alt class="w-px-40 rounded-circle" />
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span
                                                        class="fw-semibold d-block">{{ Auth::guard('administrator')->user()->name }}</span>
                                                    <small class="text-muted">
                                                        @if (Auth::guard('administrator')->user()->role_id == 1)
                                                            Super Admin
                                                        @else
                                                            Pengurus
                                                        @endif
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/profile-admin">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/logoutAdministrator">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">

                        @yield('content')

                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div
                            class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made by
                                <a href="#" target="_blank" class="footer-link fw-bolder text-black">OSIS SMAN
                                    3 Bogor</a>
                                {{-- , and theme created by
                                <a href="https://themeselection.com" target="_blank"
                                    class="footer-link fw-bolder text-black">ThemeSelection</a> --}}
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js') }} -->
    <script src="{{ asset('assets/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Icons JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
        integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
