<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>DPR Coffee @yield('title')</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicons/site.webmanifest') }}">

    <!-- Sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/FontAwesome/6.2.1/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/dist/css/adminlte.min.css') }}">
    <!-- Our style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    @stack('css')
</head>

<body class="hold-transition layout-navbar-fixed layout-fixed sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white  navbar-light dropdown-legacy text-sm">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-white elevation-4 sidebar-no-expand bg-sidebar-dpr">
            <!-- Logo -->
            <a href="{{ route('dashboard') }}" class="logo-switch bg-sidebar-dpr">
                <img src="{{ asset('assets/DPR.png') }}" alt="dpr-lg"
                    class="shadow-lg rounded-circle brand-image-xl logo-xs" width="30px">
                <img src="{{ asset('assets/DPR.png') }}" alt="dpr-lg"
                    class="shadow-lg rounded-circle brand-image-xs logo-xl text-center" width="70px">
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-collapse-hide-child nav-child-indent"
                        data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">Menu</li>
                        {{-- <li class="nav-item">
                            <a onclick="window.location='{{ route('files') }}'" href="{{ route('files') }}"
                                class="nav-link">
                                <i class="nav-icon fa-solid fa-briefcase"></i>
                                <p>
                                    Files
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item d-none">
                                    <a href="{{ route('files') }}" class="nav-link">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dokumen.index') }}" class="nav-link">
                                        <i class="fa-regular fa-folder-open nav-icon"></i>
                                        <p>Dokumen</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa-solid fa-sitemap nav-icon"></i>
                                        <p>
                                            Situs
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview" style="display: none;">
                                        <li class="nav-item">
                                            <a href="{{ route('sitesByCategory.index', 'Perusahaan') }}"
                                                class="nav-link">
                                                <i class="fa-regular fa-building nav-icon"></i>
                                                <p>Perusahaan</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('sitesByCategory.index', 'Karyawan') }}"
                                                class="nav-link">
                                                <i class="fa-solid fa-users nav-icon"></i>
                                                <p>Karyawan</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('sitesByCategory.index', 'Lainnya') }}"
                                                class="nav-link">
                                                <i class="fa-regular fa-file nav-icon"></i>
                                                <p>Lainnya</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('memo.index') }}" class="nav-link">
                                        <i class="fa-solid fa-paste nav-icon"></i>
                                        <p>Memo</p>
                                    </a>
                                </li>
                                @if ($users['position_id'] == 1)
                                    <li class="nav-item">
                                        <a href="{{ route('signatures.index') }}" class="nav-link">
                                            <i class="fa-solid fa-signature nav-icon"></i>
                                            <p>Tangan Tangan</p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('order.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-list"></i>
                                <p>
                                    Order
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('menu.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-clipboard-list"></i>
                                <p>
                                    Menu
                                </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Simple Link
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li> --}}
                    </ul>
                </nav>

            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg-best">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer text-sm">
            <!-- To the right -->
            {{-- <div class="float-right d-none d-sm-inline">
                Anything you want
            </div> --}}
            <!-- Default to the left -->
            Copyright &copy; <strong>2023
                {{-- <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved. --}}
        </footer>
    </div>
    <!-- ./wrapper -->


    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('assets/adminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @stack('scripts')

    <!-- AdminLTE App -->
    <script src="{{ asset('assets/adminLTE/dist/js/adminlte.min.js') }}"></script>

    <script>
        /*** add active class and stay opened when selected ***/
        var url = window.location;

        // for sidebar menu entirely but not cover treeview
        $('ul.nav-sidebar a').filter(function() {
            if (this.href) {
                return this.href == url || url.href.indexOf(this.href) == 0;
            }
        }).addClass('active');

        // for the treeview
        $('ul.nav-treeview a').filter(function() {
            if (this.href) {
                return this.href == url || url.href.indexOf(this.href) == 0;
            }
        }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');

        $("#alert").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });
    </script>
</body>

</html>
