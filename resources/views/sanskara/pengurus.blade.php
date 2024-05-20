<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="{{ asset('assets/sanskaraAssets/images/sanskara.png') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />

    <title>OSIS SMAN 3 BOGOR - 2022/2023</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/sanskaraAssets/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/sanskaraAssets/css/osissmanti-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/sanskaraAssets/css/owl.css') }}" />
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
                        <a href="#" class="logo">
                            <h5 class="font-weight-bold">OSISSMANTIBOO</h5>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="/periode2022-2023" class="">Home</a></li>
                            <li><a href="/periode2022-2023#osis">OSIS</a></li>
                            <li><a href="/periode2022-2023#sanskara">Sanskara Anagata</a></li>
                            <li><a href="#pengurus">Kepengurusan</a></li>
                            <li><a href="/periode2022-2023#proker">Proker</a></li>
                            <li><a href="/">Periode 2023-2024</a></li>
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

    <!-- ***** content start ***** -->
    <div class="container-xxl pt-5 mt-5 pengurus-page">
        <div class="container px-lg-5 mt-5 d-flex justify-content-center align-items-center">
            <div class="row">
                <div class="col-12 mt-auto pb-3 text-center">
                    <h2 class="animated zoomIn">PENGURUS OSIS SMAN 3 BOGOR PERIODE 2022/2023</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container pengurus-page" id="pengurus">
        <!-- KEPALA SEKOLAH -->
        {{-- <div class="container-xxl pb-5">
            <div class="container">
                <div class="section-title position-relative text-center mb-4 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="mt-2 text-light">KEPALA SEKOLAH</h4>
                </div>
                <div class="row g-3 justify-content-center">
                    <div class="h-100 team-card col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4">
                            <img class="img-fluid mb-4" src="{{ asset('assets/sanskaraAssets/images/team-1.jpg') }}"
                                alt="">
                            <h5>Alex Robin</h5>
                            <span>Kepala Sekolah</span>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- KETUA OSIS -->
        <div class="container-xxl pb-5">
            <div class="container">
                <div class="section-title position-relative text-center mb-4 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="mt-2 text-light">KETUA OSIS</h4>
                </div>
                <div class="row g-3 justify-content-center">
                    <div class="h-100 team-card col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4" src="{{ asset('assets/sanskaraAssets/images/ketua1.jpg') }}"
                                alt="">
                            <h5>Muhammad Bintang Paradise</h5>
                            <span>Ketua OSIS 1</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4" src="{{ asset('assets/sanskaraAssets/images/ketua-umum.jpg') }}"
                                alt="">
                            <h5>Aletha Serafina Ramadhani Nugraha</h5>
                            <span>Ketua Umum OSIS</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4" src="{{ asset('assets/sanskaraAssets/images/ketua2.jpg') }}"
                                alt="">
                            <h5>Muhammad Setyo Pamuji</h5>
                            <span>Ketua OSIS 2</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEKRETARIS -->
        <div class="container-xxl pb-5">
            <div class="container">
                <div class="section-title position-relative text-center mb-4 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="mt-2 text-light">SEKRETARIS</h4>
                </div>
                <div class="row g-3 justify-content-center">
                    <div class="h-100 team-card col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/sekretaris-umum.jpg') }}" alt="">
                            <h5>Keisha Putri Athaya</h5>
                            <span>Sekretaris Umum</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/sekretaris1.jpg') }}" alt="">
                            <h5>Djibril Abbi</h5>
                            <span>Sekretaris 1</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/sekretaris2.jpg') }}" alt="">
                            <h5>Chiquita Laila</h5>
                            <span>Sekretaris 2</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BENDAHARA -->
        <div class="container-xxl pb-5">
            <div class="container">
                <div class="section-title position-relative text-center mb-4 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="mt-2 text-light">BENDAHARA</h4>
                </div>
                <div class="row g-3 justify-content-center">
                    <div class="h-100 team-card col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/bendahara-umum.jpg') }}" alt="">
                            <h5>Khauzaifa Layla Azzarqi</h5>
                            <span>Bendahara Umum</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/bendahara1.jpg') }}" alt="">
                            <h5>Caroline Irene</h5>
                            <span>Bendahara 1</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEKBID 1 -->
        <div class="container-xxl pb-5">
            <div class="container">
                <div class="section-title position-relative text-center mb-4 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="mt-2 text-light">SEKBID 1<br>
                        <h5>"Pembinaan keimana dan
                            ketakwaan terhadap Tuhan Yang Maha Esa"</h5>
                    </h4>
                </div>
                <div class="row g-3 justify-content-center pb-5">
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/pembina1-sekbid1.jpg') }}"
                                alt="">
                            <h5>Syahrul Fahmi, S.Pd.I.</h5>
                            <span>Pembina Sekbid 1</span>
                        </div>
                    </div>
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/pembina2-sekbid1.jpg') }}"
                                alt="">
                            <h5>Vera Mohede, S.Pd.K.</h5>
                            <span>Pembina Sekbid 1</span>
                        </div>
                    </div>
                </div>
                <div class="row g-3 justify-content-center">
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/ketua-sekbid1.jpg') }}" alt="">
                            <h5>Amanda Septi Wulandari</h5>
                            <span>Ketua Sekbid 1</span>
                        </div>
                    </div>
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/wakabid1.jpg') }}" alt="">
                            <h5>Viola Imanuela</h5>
                            <span>Wakil Ketua Sekbid 1</span>
                        </div>
                    </div>
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota1-sekbid1.jpg') }}"
                                alt="">
                            <h5>Fabian Serafino Feriantoro</h5>
                            <span>Anggota Sekbid 1</span>
                        </div>
                    </div>
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota2-sekbid1.jpg') }}"
                                alt="">
                            <h5>Ayu Wulandari Putri Mendra</h5>
                            <span>Anggota Sekbid 1</span>
                        </div>
                    </div>
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota3-sekbid1.jpg') }}"
                                alt="">
                            <h5>Fathira Falaka Wijaksmi</h5>
                            <span>Anggota Sekbid 1</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEKBID 2 -->
        <div class="container-xxl pb-5">
            <div class="container">
                <div class="section-title position-relative text-center mb-4 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="mt-2 text-light">SEKBID 2 <br>
                        <h5>"Pembinaan budi pekerti luhur atau
                            akhlak mulia"</h5>
                    </h4>
                </div>
                <div class="row g-3 justify-content-center pb-5">
                    <div class="h-100 team-card col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/pembina-sekbid2.jpg') }}" alt="">
                            <h5>Yeffi Anugratiwi Yulin, S.Pd.</h5>
                            <span>Pembina Sekbid 2</span>
                        </div>
                    </div>
                </div>
                <div class="row g-3 justify-content-center">
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/ketua-sekbid2.jpg') }}" alt="">
                            <h5>Emmanuela Jeha Putri</h5>
                            <span>Ketua Sekbid 2</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/wakabid2.jpg') }}" alt="">
                            <h5>Fildzah Khariza</h5>
                            <span>Wakil Ketua Sekbid 2</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota1-sekbid2.jpg') }}"
                                alt="">
                            <h5>Letisya Ribkha</h5>
                            <span>Anggota Sekbid 2</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota2-sekbid2.jpg') }}"
                                alt="">
                            <h5>Nasywa Atifa</h5>
                            <span>Anggota Sekbid 2</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEKBID 3 -->
        <div class="container-xxl pb-5">
            <div class="container">
                <div class="section-title position-relative text-center mb-4 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="mt-2 text-light">SEKBID 3 <br>
                        <h5>"Pembinaan kepribadiaan
                            unggul, wawasan kebangsaan, dan
                            bela Negara"<h5>
                    </h4>
                </div>
                <div class="row g-3 justify-content-center pb-5">
                    <div class="h-100 team-card col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4" src="{{ asset('assets/sanskaraAssets/images/team-1.jpg') }}"
                                alt="">
                            <h5>Muhammad Chaerul Fahru Rizal, S.Pd.</h5>
                            <span>Pembina Sekbid 3</span>
                        </div>
                    </div>
                </div>
                <div class="row g-3 justify-content-center">
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/ketua-sekbid3.jpg') }}" alt="">
                            <h5>Zaldy Arroja Fadillah Setiyawan</h5>
                            <span>Ketua Sekbid 3</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/wakabid3.jpg') }}" alt="">
                            <h5>Sharifa Nursya Putri</h5>
                            <span>Wakil Ketua Sekbid 3</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota1-sekbid3.jpg') }}"
                                alt="">
                            <h5>Prabu Jibranov Friera</h5>
                            <span>Anggota Sekbid 3</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota2-sekbid3.jpg') }}"
                                alt="">
                            <h5>Hazaelavia Dinara</h5>
                            <span>Anggota Sekbid 3</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEKBID 4 -->
        <div class="container-xxl pb-5">
            <div class="container">
                <div class="section-title position-relative text-center mb-4 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="mt-2 text-light">SEKBID 4 <br>
                        <h5>"Pembinaan prestasi akademik
                            seni, dan/atau olahraga sesuai bakat dan
                            minat"</h5>
                    </h4>
                </div>
                <div class="row g-3 justify-content-center pb-5">
                    <div class="h-100 team-card col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4" src="{{ asset('assets/sanskaraAssets/images/team-1.jpg') }}"
                                alt="">
                            <h5>Devi Putri Rozalina, M.Pd.</h5>
                            <span>Pembina Sekbid 4</span>
                        </div>
                    </div>
                </div>
                <div class="row g-3 justify-content-center">
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/ketua-sekbid4.jpg') }}" alt="">
                            <h5>Dinda Nurchasanah</h5>
                            <span>Ketua Sekbid 4</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/wakabid4.jpg') }}" alt="">
                            <h5>Muhammad Rifa'i Syandana Hafiz</h5>
                            <span>Wakil Ketua Sekbid 4</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota1-sekbid4.jpg') }}"
                                alt="">
                            <h5>Viorentine Princessa S.</h5>
                            <span>Anggota Sekbid 4</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota2-sekbid4.jpg') }}"
                                alt="">
                            <h5>Muhammad Yafi</h5>
                            <span>Anggota Sekbid 4</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEKBID 5 -->
        <div class="container-xxl pb-5">
            <div class="container">
                <div class="section-title position-relative text-center mb-4 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="mt-2 text-light">SEKBID 5 <br>
                        <h5>"Pembinaan demokrasi, hak asasi
                            manusia, pendidikan politik,
                            lingkungan hidup, kepekaan dan toleransi
                            sosial dalam konteks
                            masyarakat plural"</h5>
                    </h4>
                </div>
                <div class="row g-3 justify-content-center pb-5">
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/pembina-sekbid5.jpg') }}" alt="">
                            <h5>Enung Herawati, S.Pd.I.</h5>
                            <span>Pembina Sekbid 5</span>
                        </div>
                    </div>
                </div>
                <div class="row g-3 justify-content-center">
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/ketua-sekbid5.jpg') }}" alt="">
                            <h5>Emily Sabila</h5>
                            <span>Ketua Sekbid 5</span>
                        </div>
                    </div>
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/wakabid5.jpg') }}" alt="">
                            <h5>Violet Fairuz Zahirah</h5>
                            <span>Wakil Ketua Sekbid 5</span>
                        </div>
                    </div>
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota1-sekbid5.jpg') }}"
                                alt="">
                            <h5>Arva Maghalidzikra</h5>
                            <span>Anggota Sekbid 5</span>
                        </div>
                    </div>
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota2-sekbid5.jpg') }}"
                                alt="">
                            <h5>Austi Mauliante Raja Noter Tampubolon</h5>
                            <span>Anggota Sekbid 5</span>
                        </div>
                    </div>
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota3-sekbid5.jpg') }}"
                                alt="">
                            <h5>Muhammad Irsyad Azharul Haq</h5>
                            <span>Anggota Sekbid 5</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEKBID 6 -->
        <div class="container-xxl pb-5">
            <div class="container">
                <div class="section-title position-relative text-center mb-4 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="mt-2 text-light">SEKBID 6 <br>
                        <h5>"Pembinaan kreativitas,
                            keterampilan dan kewirausahaan"</h5>
                    </h4>
                </div>
                <div class="row g-3 justify-content-center pb-5">
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/pembina-sekbid6.jpg') }}" alt="">
                            <h5>Deswita, S.Pd, M.Pd.</h5>
                            <span>Pembina Sekbid 6</span>
                        </div>
                    </div>
                </div>
                <div class="row g-3 justify-content-center">
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/ketua-sekbid6.jpg') }}" alt="">
                            <h5>Yulia Khusnul</h5>
                            <span>Ketua Sekbid 6</span>
                        </div>
                    </div>
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/wakabid6.jpg') }}" alt="">
                            <h5>Muhammad Syamil Aydin</h5>
                            <span>Wakil Ketua Sekbid 6</span>
                        </div>
                    </div>
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota1-sekbid6.jpg') }}"
                                alt="">
                            <h5>Tubagus Rama Rotta</h5>
                            <span>Anggota Sekbid 6</span>
                        </div>
                    </div>
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota2-sekbid6.jpg') }}"
                                alt="">
                            <h5>Muhammad Hilmy Aditya</h5>
                            <span>Anggota Sekbid 6</span>
                        </div>
                    </div>
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota3-sekbid6.jpg') }}"
                                alt="">
                            <h5>Cattaleya Naila Tzabita</h5>
                            <span>Anggota Sekbid 6</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEKBID 7 -->
        <div class="container-xxl pb-5">
            <div class="container">
                <div class="section-title position-relative text-center mb-4 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="mt-2 text-light">SEKBID 7 <br>
                        <h5>"Pembinaan kualitas jasmani,
                            kesehatan dan gizi berbasis
                            sumber gizi yang terdiversifikasi"</h5>
                    </h4>
                </div>
                <div class="row g-3 justify-content-center pb-5">
                    <div class="h-100 team-card col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4" src="{{ asset('assets/sanskaraAssets/images/team-1.jpg') }}"
                                alt="">
                            <h5>Sri Nurhaeni, S.E.</h5>
                            <span>Pembina Sekbid 7</span>
                        </div>
                    </div>
                </div>
                <div class="row g-3 justify-content-center">
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/ketua-sekbid7.jpg') }}" alt="">
                            <h5>Deslee Jever Phillipa</h5>
                            <span>Ketua Sekbid 7</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/wakabid7.jpg') }}" alt="">
                            <h5>Marya Dalilla Rassya</h5>
                            <span>Wakil Ketua Sekbid 7</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota1-sekbid7.jpg') }}"
                                alt="">
                            <h5>Fakhira Zahra</h5>
                            <span>Anggota Sekbid 7</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota2-sekbid7.jpg') }}"
                                alt="">
                            <h5>Aldezra Raspati</h5>
                            <span>Anggota Sekbid 7</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEKBID 8 -->
        <div class="container-xxl pb-5">
            <div class="container">
                <div class="section-title position-relative text-center mb-4 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="mt-2 text-light">SEKBID 8 <br>
                        <h5>"Pembinaan sastra dan budaya"</h5>
                    </h4>
                </div>
                <div class="row g-3 justify-content-center pb-5">
                    <div class="h-100 team-card col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/pembina-sekbid8.jpg') }}" alt="">
                            <h5>Deden Nurdiansyah, S.Pd.</h5>
                            <span>Pembina Sekbid 8</span>
                        </div>
                    </div>
                </div>
                <div class="row g-3 justify-content-center">
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/ketua-sekbid8.jpg') }}" alt="">
                            <h5>Nadya Bhianca Putri</h5>
                            <span>Ketua Sekbid 8</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/wakabid8.jpg') }}" alt="">
                            <h5>Lucia Ratih Prasetyaningsih</h5>
                            <span>Wakil Ketua Sekbid 8</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota1-sekbid8.jpg') }}"
                                alt="">
                            <h5>Fadhil Dzil Ikram Nurjaman</h5>
                            <span>Anggota Sekbid 8</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota2-sekbid8.jpg') }}"
                                alt="">
                            <h5>Bayu Rizqi Ramadhan</h5>
                            <span>Anggota Sekbid 8</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEKBID 9 -->
        <div class="container-xxl pb-5">
            <div class="container">
                <div class="section-title position-relative text-center mb-4 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="mt-2 text-light">SEKBID 9<br>
                        <h5>"Pembinaan teknologi informasi dan
                            komunikasi (TIK)"</h5>
                    </h4>
                </div>
                <div class="row g-3 justify-content-center pb-5">
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4" src="{{ asset('assets/sanskaraAssets/images/team-1.jpg') }}"
                                alt="">
                            <h5>Laila Nuriyahu Guntari, S.Pd., Gr.</h5>
                            <span>Pembina Sekbid 9</span>
                        </div>
                    </div>
                </div>
                <div class="row g-3 justify-content-center">
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/ketua-sekbid9.jpg') }}" alt="">
                            <h5>Nailah Putri</h5>
                            <span>Ketua Sekbid 9</span>
                        </div>
                    </div>
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/wakabid9.jpg') }}" alt="">
                            <h5>Fairie Ayuki Hendriadi</h5>
                            <span>Wakil Ketua Sekbid 9</span>
                        </div>
                    </div>
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota1-sekbid9.jpg') }}"
                                alt="">
                            <h5>Zayyan Ramadzaki Firdaus</h5>
                            <span>Anggota Sekbid 9</span>
                        </div>
                    </div>
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota2-sekbid9.jpg') }}"
                                alt="">
                            <h5>Kenes Nuzula Shafwah</h5>
                            <span>Anggota Sekbid 9</span>
                        </div>
                    </div>
                    <div class="h-100 team-card2 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota3-sekbid9.jpg') }}"
                                alt="">
                            <h5>Irvalinka Sandrina Z.S.</h5>
                            <span>Anggota Sekbid 9</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEKBID 10 -->
        <div class="container-xxl pb-5">
            <div class="container">
                <div class="section-title position-relative text-center mb-4 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="mt-2 text-light">SEKBID 10<br>
                        <h5>"Pembinaan komunikasi dalam
                            bahasa Inggris"</h5>
                    </h4>
                </div>
                <div class="row g-3 justify-content-center pb-5">
                    <div class="h-100 team-card col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/pembina-sekbid10.jpg') }}"
                                alt="">
                            <h5>Munawaroh, S.Pd.</h5>
                            <span>Pembina Sekbid 10</span>
                        </div>
                    </div>
                </div>
                <div class="row g-3 justify-content-center">
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/ketua-sekbid10.jpg') }}" alt="">
                            <h5>Elizabeth Santosa</h5>
                            <span>Ketua Sekbid 10</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/wakabid10.jpg') }}" alt="">
                            <h5>Hasya Maurilla</h5>
                            <span>Wakil Ketua Sekbid 10</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota1-sekbid10.jpg') }}"
                                alt="">
                            <h5>Siti Arterina Annisa Hasanah</h5>
                            <span>Anggota Sekbid 10</span>
                        </div>
                    </div>
                    <div class="h-100 team-card col-md-6 mx-3 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item rounded overflow-hidden pb-4 h-100">
                            <img class="img-fluid mb-4"
                                src="{{ asset('assets/sanskaraAssets/images/anggota2-sekbid10.jpg') }}"
                                alt="">
                            <h5>Muhammad Hisyam Raditya</h5>
                            <span>Anggota Sekbid 10</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** content End ***** -->

    <!-- ***** footer start ***** -->
    <footer>
        <div class="container container-fluid text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container pb-5 px-lg-5">
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
                        <a class="btn btn-link" href="/periode2022-2023#home">Home</a>
                        <a class="btn btn-link" href="/periode2022-2023#osis">OSIS</a>
                        <a class="btn btn-link" href="/periode2022-2023#sanskara">Sanskara Anagata</a>
                        <a class="btn btn-link" href="#pengurus">kepengurusan</a>
                        <a class="btn btn-link" href="/periode2022-2023#proker">Program Kerja</a>
                        <a class="btn btn-link" href="/">Periode 2023-2024</a>
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
                        Copyright &copy; OSIS SMAN 3 BOGOR-SANSKARA ANAGATA-2023, All
                        Right Reserved. Created by <a href="https://www.instagram.com/mirachelcj_/"
                            class="text-white">MC</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** footer End ***** -->

    <!-- jQuery -->
    <script src="{{ asset('assets/sanskaraAssets/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/sanskaraAssets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/sanskaraAssets/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('assets/sanskaraAssets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('assets/sanskaraAssets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/sanskaraAssets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/sanskaraAssets/js/imgfix.min.js') }}"></script>
    <script src="{{ asset('assets/sanskaraAssets/js/owl-carousel.js') }}"></script>

    <!-- Global Init -->
    <script src="{{ asset('assets/sanskaraAssets/js/custom.js') }}"></script>
</body>

</html>
