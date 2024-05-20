@extends('niskala.layout')

@section('title', 'Home')

@section('content')
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

    <!-- ***** info ***** -->
    <div class="projects section" id="info">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading" id="info">
                        <a href="/smantiPlus">
                            <h2>Informasi</h2>
                        </a>
                        <a href="/smantiPlus">
                            <p class="text-white"><i class="fa-solid fa-chevron-right me-2"></i>Lihat di SMANTI+</p>
                        </a>
                        <div class="line-dec"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-features owl-carousel">
                        @foreach ($info as $item)
                            <a href="{{ url('/smantiPlus/detail-info/' . $item->slug) }}">
                                <div class="item">
                                    <div class="img-project">
                                        <img src="{{ asset('storage/imgInfo/' . $item->imgInfo) }}" alt="" />
                                    </div>
                                    <div class="down-content">
                                        <div class="title-info">
                                            {{ \Illuminate\Support\Str::limit($item->title, 35) }}</div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="d-flex flex-wrap justify-content-center align-items-center">
                    @foreach ($type as $item)
                        <a href="/smantiPlus/searchByType/{{ $item->slug }}" class="btn btn-type-home">
                            {{ $item->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- ***** info End ***** -->

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
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#sejarahModal">
                                    Sejarah
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center mt-3">
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#tujuanModal">
                                    Tujuan
                                </button>
                            </div>
                            <div class="col text-center mt-4">
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#fungsiModal">
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
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
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

    <!-- ***** Niskala  ***** -->
    <div class="container mt-5" id="niskala">
        <div class="row">
            <div class="col-lg-5 col-md-4 col-sm-12 col-12 d-flex justify-content-center align-items-center">
                <img src="{{ asset('assets/niskalaAssets/images/logo-niskala.png') }}" alt=""
                    style="width: 100%; height: auto;">
            </div>
            <div class="col-lg-7 col-md-8 col-sm-12 col-12 p-4">
                <h1 class="text-white fw-bold mb-3">OSIS : NISKALA ASHCHARYA</h1>
                <p class="text-white">Niskala Ashcharya secara keseluruhan memiliki arti, OSIS SMA Negeri 3
                    Bogor sebagai organisasi yang akan berdiri kokoh dan kuat dengan berintegritas pada
                    rasa simpati, empati, tenggang rasa, serta saling tolong menolong sehingga mampu
                    mewujudkan kesuksesan dalam menjalankan kewajiban serta selalu menciptakan
                    keajaiban bagi warga SMA Negeri 3 Bogor dan merealisasikan harapan siswa siswi
                    dalam bentuk program kerja-program kerja yang efektif dan bermanfaat bagi seluruh
                    aspek yang ada di dalam maupun di luar SMA Negeri 3 Bogor dan dapat
                    membanggakan serta mengharumkan nama baik sekolah SMA Negeri 3 Bogor.</p>
                <div class="mt-4">
                    <a href="/filosofi-niskala" class="btn btn-filosofi px-3 py-2 me-2">Filosofi</a>
                    <a class="btn btn-filosofi px-3 py-2" data-bs-toggle="collapse" href="#collapseNiskala"
                        role="button" aria-expanded="false" aria-controls="collapseNiskala">
                        Organigram
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 collapse" id="collapseNiskala">
        <div class="row">
            <div class="col-12">
                <img src="{{ asset('assets/niskalaAssets/images/ORGANIGRAM OSIS.png') }}" alt=""
                    style="width: 100%; height: auto;">
            </div>
        </div>
    </div>
    <!-- ***** Niskala End ***** -->

    <!-- ***** ADHYANA SAHAKARA ***** -->
    <div class="container my-5" id="adhyana">
        <div class="row">
            <div class="col-lg-5 col-md-4 col-sm-12 col-12 d-flex justify-content-center align-items-center">
                <img src="{{ asset('assets/niskalaAssets/images/logo-adhyana.png') }}" alt=""
                    style="width: 100%; height: auto;">
            </div>
            <div class="col-lg-7 col-md-8 col-sm-12 col-12 p-4">
                <h1 class="text-white fw-bold mb-3 mt-lg-5">MPK : ADHYANA SAHAKARA</h1>
                <p class="text-white">Adhyana Sahakara secara keseluruhan memiliki arti, harapan MPK dalam menjunjung
                    tinggi jalinan komunikasi yang baik antar komponen sekolah dan berfokus serta
                    bekerjasama untuk membangun fondasi perancangan strategi kinerja yang unggul, serta
                    menjalankan kewajiban dan tanggungjawab sebagai organisasi MPK SMA Negeri 3
                    Bogor dengan sebaik-baiknya.</p>
                <div class="mt-4">
                    <a href="/filosofi-adhyana" class="btn btn-filosofi px-3 py-2 me-2">Filosofi</a>
                    <a class="btn btn-filosofi px-3 py-2" data-bs-toggle="collapse" href="#collapseAdhyana"
                        role="button" aria-expanded="false" aria-controls="collapseAdhyana">
                        Organigram
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5 collapse" id="collapseAdhyana">
        <div class="row">
            <div class="col-12">
                <img src="{{ asset('assets/niskalaAssets/images/ORGANIGRAM MPK.png') }}" alt=""
                    style="width: 100%; height: auto;">
            </div>
        </div>
    </div>
    <!-- ***** ADHYANA SAHAKARA End ***** -->


@endsection
