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
                            <li><a href="#home" class="">Home</a></li>
                            <li><a href="#osis">OSIS</a></li>
                            <li><a href="#sanskara">Sanskara Anagata</a></li>
                            <li><a href="#pengurus">Kepengurusan</a></li>
                            <li><a href="#proker">Proker</a></li>
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

    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="home">
        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-sm-12">
                        <p class="font-weight-light">Selamat datang di website resmi</p>
                        <h1>
                            <strong>OSIS MPK SMAN 3 BOGOR</strong>
                        </h1>
                        <p class="font-weight-light">
                            Organisasi siswa yang aktif dalam kegiatan sekolah. Temukan
                            informasi tentang kami dan program sekolah di sini. Terima kasih
                            telah berkunjung!
                        </p>
                        <div class="d-flex justify-content-center me-4">
                            <a href="#osis">
                                <div class="chevron"></div>
                                <div class="chevron"></div>
                                <div class="chevron"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** OSIS ***** -->
    <div class="container osis" id="osis">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-12 text-center">
                <img class="img-osis wow zoomIn" data-wow-delay="0.5s"
                    src="{{ asset('assets/sanskaraAssets/images/logoosis.png') }}" />
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 col-12 about-osis">
                <div class="row">
                    <div class="text-center text-white">
                        <h1>Tentang OSIS</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="btn-osis">
                        <div class="row r1">
                            <div class="col text-center mt-3">
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#pengertianModal">
                                    Pengertian
                                </button>
                            </div>
                            <div class="col text-center mt-4">
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#sejarahModal">
                                    Sejarah
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center mt-3">
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#tujuanModal">
                                    Tujuan
                                </button>
                            </div>
                            <div class="col text-center mt-4">
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#fungsiModal">
                                    Fungsi
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="pengertianModal" tabindex="-1" aria-labelledby="pengertian" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="pengertian">Pengertian OSIS</h1>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <strong>Organisasi Siswa Intra Sekolah (OSIS)</strong>
                    adalah organisasi siswa resmi yang terdapat di sekolah. Organisasi
                    ini memiliki peran sebagai penggerak siswa untuk aktif berkontribusi
                    di sekolah. OSIS merupakan wadah Pembinaan Kesiswaan di sekolah
                    untuk pengembangan minat, bakat serta potensi Siswa.
                    <br />
                    Seperti halnya organisasi lainnya, OSIS juga memiliki struktur
                    kepengurusan di mana pemilihannya dilakukan secara demokratis oleh
                    siswa dalam lingkup sekolah. OSIS dibimbing oleh seorang guru yang
                    telah dipilih sekolah dan memiliki keterampilan dalam bidang
                    tertentu.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="sejarahModal" tabindex="-1" aria-labelledby="sejarah" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="sejarah">Sejarah OSIS</h1>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sejarah OSIS berawal dari munculnya organisasi siswa di Belanda pada
                    tahun 1848. Organisasi siswa tersebut bertujuan untuk membantu siswa
                    dalam memahami dan mengelola sekolah secara efektif, serta membantu
                    siswa dalam mengembangkan kemampuan sosial dan kepemimpinan mereka.
                    Organisasi siswa tersebut kemudian menyebar ke negara-negara lain,
                    termasuk Indonesia.
                    <br /><br />
                    Di Indonesia, organisasi siswa pertama kali muncul pada tahun 1923
                    di Bandung, dengan nama “Perhimpunan Pelajar Indonesia” (PPI). PPI
                    bertujuan untuk memperjuangkan hak-hak siswa dan mengembangkan
                    potensi siswa di Indonesia. Pada tahun 1949, PPI diubah menjadi
                    “Perhimpunan Pelajar Indonesia Baru” (PPIB). PPIB bertujuan untuk
                    membantu siswa dalam memahami dan mengelola sekolah secara efektif,
                    serta membantu siswa dalam mengembangkan kemampuan sosial dan
                    kepemimpinan mereka.
                    <br /><br />
                    Pada tahun 1964, PPIB diubah menjadi “Organisasi Siswa Intra
                    Sekolah” (OSIS). OSIS bertujuan untuk membantu pengelolaan sekolah
                    dan mengembangkan potensi siswa-siswi di Indonesia. OSIS juga
                    bertujuan untuk meningkatkan komunikasi antara siswa dengan sekolah
                    dan masyarakat, serta membantu siswa dalam menjadi warga sekolah
                    yang bertanggung jawab. Saat ini, OSIS merupakan organisasi siswa
                    yang tersebar di seluruh sekolah di Indonesia.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="tujuanModal" tabindex="-1" aria-labelledby="tujuan" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tujuan">Tujuan OSIS</h1>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Dalam setiap organisasi, tentu terdapat tujuan yang ingin dicapai,
                    termasuk juga pada OSIS. Berikut adalah beberapa tujuan yang ingin
                    dicapai, antara lain:
                    <br /><br />1. Meningkatkan generasi penerus yang beriman dan
                    bertaqwa. <br />2. Membangun landasan kepribadian yang kuat.
                    <br />3. Memfasilitasi siswa dalam menyalurkan aspirasi,
                    mengekspresikan kreativitas, serta mampu berkontribusi untuk hal-hal
                    positif. <br />4. Memaksimalkan potensi siswa untuk bisa meraih
                    prestasi yang membanggakan diri dan sekolah. <br />5. Melatih
                    keterampilan siswa dalam bersosialisasi dan bernegosiasi. <br />6.
                    Membantu siswa dalam memahami dan menghargai lingkungan sekitar
                    serta nilai moral dalam mengambil keputusan yang tepat. <br />7.
                    Meningkatkan sikap sportif, jujur, disiplin, bertanggung jawab, dan
                    kerjasama secara mandiri, berpikir logis, dan demokratis.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="fungsiModal" tabindex="-1" aria-labelledby="fungsi" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="fungsi">Fungsi OSIS</h1>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sebagai upaya pembinaan siswa di sekolah, OSIS memiliki beberapa
                    funsgi yang digunakan untuk mencapai tujuan, di antaranya:
                    <br /><br />1. Sebagai satu-satunya organisasi yang resmi di
                    sekolah, OSIS berfungsi sebagai wadah kegiatan siswa di sekolah.
                    Didukung dengan pembinaan yang baik, diharapkan OSIS bisa mencapai
                    tujuan yang telah disebutkan. <br />2. OSIS berfungsi sebagai
                    motivator bagi siswa untuk melakukan kegiatan positif, menggali
                    minat dan bakat, serta berusaha mengembangkannya melalui kegiatan
                    yang diselenggarakan oleh OSIS maupun ekstrakurikuler. <br />3. OSIS
                    merupakan organisasi internal yang berfungsi untuk mencegah siswa
                    dari melakukan perbuatan negatif dan kurang terpuji. OSIS juga
                    membantu mengamankan sekolah dari ancaman yang mungkin saja datang,
                    baik dari dalam maupun luar.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** OSIS End ***** -->

    <!-- ***** Sanskara ***** -->
    <div class="container sanskara" id="sanskara">
        <div class="row">
            <div class="col-lg-4">
                <div class="card c1s">
                    <div class="card-body text-center">
                        <h5 class="card-title">Apa itu<br />Sanskara Anagata?</h5>
                        <p class="card-text">
                            Sanskara Anagara adalah nama OSIS SMAN 3 Bogor angkatan
                            2022-2023.
                        </p>
                    </div>
                </div>
                <div class="card c2s">
                    <div class="card-body text-center">
                        <h5 class="card-title">Visi</h5>
                        <p class="card-text">
                            Menjadikan OSIS SMAN 3 Bogor sebagai organisasi profesional yang
                            dapat menciptakan ruang lingkup nyaman dan positif bagi seluruh
                            warga SMAN 3 Bogor, dengan harapan terwujudnya visi misi sekolah
                            dan lingkungan yang berkualitas.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <h2 class="">Sanskara Anagata</h2>
                <img class="img-osis wow zoomIn" data-wow-delay="0.5s"
                    src="{{ asset('assets/sanskaraAssets/images/sanskara.png') }}" />
                <a href="/periode2022-2023/filosofi" class="btn mb-4">Filosofi</a>
            </div>
            <div class="col-lg-4">
                <div class="card c3s">
                    <div class="card-body text-center">
                        <h5 class="card-title">Misi</h5>
                        <p class="card-text">
                            1.Menjaga dan mengutamakan aspek keimanan dan ketakwaan untuk
                            menciptakan lingkungan yang religius & pribadi yang berkarakter
                            mulia.<br />2.Menciptakan sarana pengembangan inovatif bagi
                            seluruh siswa/i SMAN 3 Bogor untuk dapat mengasah bakat, minat,
                            maupun potensi diri agar terwujudnya lingkungan yang
                            berprestasi. <br />3.Meningkatkan hubungan & koordinasi yang
                            harmonis juga kekeluargaan yang erat antar sesama rekan kerja,
                            OSIS & MPK, maupun seluruh komponen di SMAN 3 Bogor.<br />4.Menjalankan
                            dan mengoptimalkan program kerja dan berinovasi untuk
                            menciptakan program kerja baru dengan mengedepankan rasa
                            kekeluargaan dan profesionalitas.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Sanskara End ***** -->

    <!-- ***** pengurus ***** -->
    <div class="container-xxl py-4">
        <div class="container pengurus" id="pengurus">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="mt-2">Kepengurusan OSIS 2022/2023</h2>
            </div>
            <div class="row g-3 justify-content-center rp">
                <div class="h-100 team-card col-lg-3 col-md-3 col-sm-3 col-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item overflow-hidden">
                        <img class="img-fluid mb-4" src="{{ asset('assets/sanskaraAssets/images/ketua1.jpg') }}"
                            alt="" />
                        <h5>Muhammad Bintang Paradise</h5>
                        <span>Ketua OSIS 1</span>
                    </div>
                </div>
                <div class="h-100 team-card col-lg-3 col-md-3 col-sm-3 col-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item overflow-hidden">
                        <img class="img-fluid mb-4" src="{{ asset('assets/sanskaraAssets/images/ketua-umum.jpg') }}"
                            alt="" />
                        <h5>Aletha Serafina Ramadhani Nugraha</h5>
                        <span>Ketua Umum OSIS</span>
                    </div>
                </div>
                <div class="h-100 team-card col-lg-3 col-md-3 col-sm-3 col-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item overflow-hidden">
                        <img class="img-fluid mb-4" src="{{ asset('assets/sanskaraAssets/images/ketua2.jpg') }}"
                            alt="" />
                        <h5>Muhammad Setyo Pamuji</h5>
                        <span>Ketua OSIS 2</span>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="/periode2022-2023/kepengurusan" class="btn">Lebih Lengkap</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** pengurus End ***** -->

    <!-- ***** proker ***** -->
    <div class="projects section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading" id="proker">
                        <h2>Program Kerja Kami</h2>
                        <div class="line-dec"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-features owl-carousel">
                        <div class="item">
                            <div class="img-project">
                                <img src="{{ asset('assets/sanskaraAssets/images/poster-2.png') }}" alt="" />
                            </div>
                            <div class="down-content">
                                <h4>SMANTI LEAGUE</h4>
                                <a href="https://www.instagram.com/stories/highlights/17860913525931355/"><i
                                        class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img-project">
                                <img src="{{ asset('assets/sanskaraAssets/images/poster-4.png') }}" alt="" />
                            </div>
                            <div class="down-content">
                                <h4>HARMONI</h4>
                                <a href="https://www.instagram.com/stories/highlights/17948827265569015/"><i
                                        class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img-project">
                                <img src="{{ asset('assets/sanskaraAssets/images/poster-3.png') }}" alt="" />
                            </div>
                            <div class="down-content">
                                <h4>PRASAIJA</h4>
                                <a href="#"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img-project">
                                <img src="{{ asset('assets/sanskaraAssets/images/poster-1.png') }}" alt="" />
                            </div>
                            <div class="down-content">
                                <h4>PLS 2023</h4>
                                <a href="#"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img-project">
                                <img src="{{ asset('assets/sanskaraAssets/images/poster-6.png') }}" alt="" />
                            </div>
                            <div class="down-content">
                                <h4>VISION</h4>
                                <a href="https://www.instagram.com/stories/highlights/18162885712279247/"><i
                                        class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img-project">
                                <img src="{{ asset('assets/sanskaraAssets/images/poster-7.png') }}" alt="" />
                            </div>
                            <div class="down-content">
                                <h4>SWASEMBADA</h4>
                                <a href="https://www.instagram.com/stories/highlights/17997695516304646/"><i
                                        class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img-project">
                                <img src="{{ asset('assets/sanskaraAssets/images/poster-5.jpg') }}" alt="" />
                            </div>
                            <div class="down-content">
                                <h4>SPSM 2023</h4>
                                <a href="https://www.instagram.com/stories/highlights/18261379093176755/"><i
                                        class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** proker End ***** -->

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
                        <a class="btn btn-link" href="#home">Home</a>
                        <a class="btn btn-link" href="#osis">OSIS</a>
                        <a class="btn btn-link" href="#sanskara">Sanskara Anagata</a>
                        <a class="btn btn-link" href="#pengurus">kepengurusan</a>
                        <a class="btn btn-link" href="#proker">Program Kerja</a>
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
