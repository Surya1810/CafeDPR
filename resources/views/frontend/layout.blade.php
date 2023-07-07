<!DOCTYPE html class="h-100">
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicons/site.webmanifest') }}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/FontAwesome/6.2.1/css/all.min.css') }}">

    <!-- google font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>DPR Coffee @yield('title')</title>

    <!-- Our style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        .lato {
            font-family: "Lato", sans-serif !important;
        }

        body {
            font-family: "Montserrat", sans-serif !important;
        }
    </style>
    @stack('css')
</head>

<body class="text-bg-dark bg-dpr">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="instagram" viewBox="0 0 16 16">
            <path
                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
        </symbol>
    </svg>


    <div class="overflow">
        <div class="gradient">
            <div class="container">
                @yield('content')

                <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top"
                    style="border-color: #e3d0c9">
                    <div class="col-md-4 d-flex align-items-center">
                        <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                            <img src="{{ asset('assets/DPR.png') }}" alt="logo" class="bi shadow-lg" width="30"
                                height="24">
                        </a>
                        <span class="mb-3 mb-md-0 text-light">&copy; 2023 DPR Coffee, Inc</span>
                    </div>

                    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex" sty>
                        <li class="ms-3">
                            <a class="text-body-secondary" href="https://www.instagram.com/coffee_dpr/">
                                <svg class="bi" width="24" height="24" style="fill: white">
                                    <use xlink:href="#instagram" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </footer>
            </div>
        </div>
    </div>


    @if (Route::current()->getName() == 'meja')
        <!-- Button trigger modal -->
        <button type="button" class="float" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa fa-cart-shopping my-float my-auto"></i>
            @if ($cart->count())
                <p>{{ Gloudemans\Shoppingcart\Facades\Cart::count() }}</p>
            @endif
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content best-rounded">
                    <div class="modal-header cart">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Keranjang</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body cart">
                        @if ($cart->count() == null)
                            <h3>Belum ada menu yang dipilih:(</h3>
                        @else
                            <h3><strong>Meja {{ $id }}</strong></h3>
                            <form action="{{ route('bayar') }}" method="POST" id="pesanan">
                                @csrf
                                <div class="row">
                                    <div class="col-5">
                                        <h4>atas nama</h4>
                                    </div>
                                    <div class="col-7">
                                        <div class="form-group">
                                            <input type="hidden" name="nomor_meja" value="{{ $id }}">
                                            <input type="text" name="nama"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" placeholder="Tulis Nama Anda"
                                                value="{{ old('nama') }}" required>
                                            @error('nama')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            @foreach ($cart as $data)
                                <div class="row">
                                    <div class="col-4">
                                        <h3>{{ $data->name }}</h1>
                                    </div>
                                    <div class="col-2">
                                        <h3>{{ $data->qty }}</>
                                    </div>
                                    <div class="col-4">
                                        <h3 class="float-end">
                                            <strong>{{ formatRupiah($data->price * $data->qty) }}</strong></>
                                    </div>
                                    <div class="col-2">
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="nomor_meja" value="{{ $id }}">
                                            <input type="hidden" name="id" value="{{ $data->rowId }}">
                                            <input type="hidden" name="qty" value="{{ $data->qty }}">
                                            <button type="submit" style="all: unset"><i class="fa fa-trash mt-1"
                                                    style="font-size:20px;"></i></button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                    <div class="modal-footer cart">
                        <p>Total:
                            <strong>Rp{{ Gloudemans\Shoppingcart\Facades\Cart::priceTotal(0, ',', '.') }}</strong>
                        </p>


                        <button type="submit" form="pesanan" class="btn btn-secondary best-rounded"
                            @disabled($cart->count() == null) style="background-color: #224f28">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (session('message'))
        <!-- Modal Info-->
        <div class="modal fade" id="pesan" tabindex="-1" aria-labelledby="pesanLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content best-rounded">
                    <div class="modal-header cart">
                        <h1 class="modal-title fs-5" id="pesanLabel">Pesanan Berhasil</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body cart">
                        <h3><strong>Cara Pembayaran</strong></h3>
                        <h5><strong>Cash</strong>: Harap ke kasir untuk melakukan pembayaran</h5>
                        <h5><strong>QRIS</strong>: Harap menunjukan bukti pembayaran pada kasir</h5>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    @if (session('message'))
        <script type="text/javascript">
            $(window).on('load', function() {
                $('#pesan').modal('show');
            });
        </script>
    @endif
    @stack('scripts')
</body>

</html>
