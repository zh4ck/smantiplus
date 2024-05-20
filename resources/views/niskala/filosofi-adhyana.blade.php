@extends('niskala.layout')

@section('title', 'Filosofi ADHYANA SAHAKARA')

@section('content')
    <!-- content -->
    <div class="container-xxl" id="filosofi">
        <div class="container px-lg-5 filosofi">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="mb-4 text-white">MPK : ADHYANA SAHAKARA</h2>
                <div class="text-center">
                    <img src="{{ asset('assets/niskalaAssets/images/logo-adhyana.png') }}" alt="" />
                </div>
                <h2 class="mt-4 text-white">Filosofi Nama</h2>
            </div>
            <div class="row g-4 mb-5 text-center justify-content-center align-items-center">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="accordion" id="accordionExample">
                            <!-- ACCORDION ITEM 1 -->
                            <div class="accordion-item shadow mb-3">
                                <h2 class="accordion-header" id="headingOne1">
                                    <button class="accordion-button collapsed text-light" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="true"
                                        aria-controls="collapseOne1">
                                        ADHYANA
                                    </button>
                                </h2>
                                <div id="collapseOne1" class="accordion-collapse collapse" aria-labelledby="headingOne1"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Adhyana</strong> memiliki makna konsentrasi pikiran yang mendalam dan
                                        terfokus.
                                        Yang artinya, kami berharap seluruh bagian dari MPK dapat menjadi suatu kesatuan
                                        yang dapat berkonsentrasi penuh ketika sedang melaksanakan kewajiban (mengawasi
                                        kinerja OSIS serta menampung seluruh aspirasi warga SMA Negeri 3 Bogor). Sahakara
                                        : Bekerjasama untuk mencapai tujuan Dapat diartikan bahwa organisasi MPK menjadi
                                        organisasi yang seluruh anggota nya berpatisipasi aktif dalam bekerjasama baik
                                        secara
                                        emosi, mental serta tenaga dalam bekerja dan bertindak, untuk mencapai tujuan mulia
                                        bersama. Adhyana Sahakara dengan nama “Adhyana Sahakara”, besar harapan kami
                                        MPK dalam menjunjung tinggi jalinan komunikasi antar komponen yang ada di SMA
                                        Negeri 3 Bogor dan berfokus serta bekerjasama untuk fondasi perancangan strategi
                                        kinerja hingga melaksakan kewajiban dan tanggungjawab sebagai organisasi MPK
                                        SMA Negeri 3 Bogor.

                                    </div>
                                </div>
                            </div>
                            <!-- ACCORDION ITEM 2 -->
                            <div class="accordion-item shadow mb-3">
                                <h2 class="accordion-header" id="headingTwo2">
                                    <button class="accordion-button collapsed text-light" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo2" aria-expanded="false"
                                        aria-controls="collapseTwo2">
                                        SAHAKARA</button>
                                </h2>
                                <div id="collapseTwo2" class="accordion-collapse collapse" aria-labelledby="headingTwo2"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Sahakara</strong> memiliki makna bekerjasama untuk mencapai tujuan. Dapat
                                        diartikan
                                        bahwa organisasi MPK menjadi organisasi yang seluruh anggota nya mampu
                                        berpatisipasi aktif dan menjalin komunikasi yang baik dalam bekerjasama, baik secara
                                        emosi, mental serta tenaga dalam bekerja dan bertindak, untuk mencapai tujuan mulia
                                        bersama.
                                    </div>
                                </div>
                            </div>
                            <!-- ACCORDION ITEM 3 -->
                            <div class="accordion-item shadow mb-3">
                                <h2 class="accordion-header" id="headingThree3">
                                    <button class="accordion-button collapsed text-light" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        ADHYANA SAHAKARA
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Adhyana Sahakara</strong> secara keseluruhan memiliki arti, harapan MPK
                                        dalam menjunjung
                                        tinggi jalinan komunikasi yang baik antar komponen sekolah dan berfokus serta
                                        bekerjasama untuk membangun fondasi perancangan strategi kinerja yang unggul, serta
                                        menjalankan kewajiban dan tanggungjawab sebagai organisasi MPK SMA Negeri 3
                                        Bogor dengan sebaik-baiknya.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content end -->

@endsection
