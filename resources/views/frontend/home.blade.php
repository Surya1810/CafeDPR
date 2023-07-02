@extends('frontend.layout')

@section('title')
    | Home
@endsection

@push('css')
    <style>
        /* .nav-pills>li.active>a,
                                                .nav-pills>li.active>a:focus,
                                                .nav-pills>li.active>a:hover {
                                                    border: 0;
                                                } */

        .nav-pills .nav-item .nav-link {
            /* background-color: #0080FF; */
            color: #e3d0c9;
        }

        .nav-pills .nav-item .nav-link.active {
            color: #F6B273;
            background-color: rgba(122, 120, 114, 0.5);
            font-weight: bolder;
            border-radius: 10rem 10rem 10rem 10rem;
        }

        .tab-content {
            border-top: transparent;
            padding: 15px;
        }

        .tab-content .tab-pane {
            min-height: 200px;
            height: auto;
        }
    </style>
@endpush

@section('content')
    <div class="d-flex w-100 h-100 p-3 mx-auto flex-column text-center">
        <header class="mb-auto">
            <div>
                <a class="float-md-start mb-0"><img class="shadow-lg rounded-circle" width="75px"
                        src="https://ik.imagekit.io/surya1810/DPR/DPR.png?updatedAt=1688292317578" alt="logo"></a>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="/">Home</a>
                    <a class="nav-link fw-bold py-1 px-0" href="#menu">Menu</a>
                    <a class="nav-link fw-bold py-1 px-0" href="https://www.instagram.com/coffee_dpr/">Galeri</a>
                </nav>
            </div>
        </header>

        <main class="px-3">
            <div class="blur-circle">
                <div class="image">
                    <img class="Logo" src="https://ik.imagekit.io/surya1810/DPR/Hero.png?updatedAt=1688323433715"
                        alt="Text">
                </div>
            </div>
        </main>

        <footer class="mt-auto text-white-50">
            <p>Created by <a href="https://getbootstrap.com/" class="text-white">Surya</a>, <a
                    href="https://twitter.com/mdo" class="text-white">2023</a>.</p>
        </footer>
    </div>

    <!-- Menu -->
    <div class="col-12 pt-5" id="menu">
        <h1 style="color: #e3d0c9" class="lato text-center"><strong>MENU</strong></h1>
        <div class="bg-menu pt-3">
            <ul class="nav nav-pills mb-3 justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">Special</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false">Makanan</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                        role="tab" aria-controls="contact" aria-selected="false">Minuman</button>
                </li>
            </ul>
            <div class="garis"></div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <!-- Special -->
                    <div class="row mb-3">
                        @foreach ($menu as $data)
                            <div class="col-6 col-lg-3 mt-3">
                                <div class="card best-rounded border-0 bg-invert">
                                    <img class="card-img-top best-rounded" src="{{ asset('storage/' . $data->foto) }}"
                                        alt="Menu">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $data->nama }}</h5>
                                        <p class="card-text">{{ formatRupiah($data->harga) }}</p>
                                    </div>
                                    <div class="card-footer border-0">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
            </div>
        </div>
    </div>

    <!-- About Us -->
    <div class="pt-5" id="about_us">
        <h1 style="color: #e3d0c9" class="lato text-center"><strong>ABOUT US</strong></h1>
        <div class="card mb-3 px-5 py-3 mx-auto bg-about">
            <div class="row">
                <div class="col-4">
                    <img src="https://ik.imagekit.io/surya1810/DPR/DPR.png?updatedAt=1688292317578"
                        class="img-fluid shadow-lg rounded-circle" alt="Logo">
                </div>
                <div class="col-8">
                    <div class="card-body">
                        <p class="card-text"><i class="fa-regular fa-clock"></i> Jam Operasional</p><br>
                        <p class="card-text">Sabtu-Kamis | 10.00 - 22.00</p><br>
                        <p class="card-text">Jumat | 13.00 - 22.00</p><br><br>
                        <p class="card-text"><i class="fa-solid fa-phone-volume"></i> Order</p><br>
                        <p class="card-text"><a href="">0895 0451 3287</a></p><br>
                    </div>
                </div>
            </div>
        </div>
        <div style="border-bottom: 2px solid white"></div>
        <!-- Maps -->
        <iframe width="100%" height="200px" class="mt-3"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.1301780928966!2d110.8417092!3d-6.7539751!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70db1da4259b17%3A0xfdfdb060b033e6d2!2sKedai%20DPR%20Coffee!5e0!3m2!1sid!2sid!4v1686380219893!5m2!1sid!2sid"
            style="border:0;" allowfullscreen="true" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection

@push('scripts')
@endpush
