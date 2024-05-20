@extends('niskala.layout')

@section('title', 'Filosofi NISKALA ASHCHARYA')

@section('content')
    <!-- content -->
    <div class="container-xxl" id="filosofi">
        <div class="container px-lg-5 filosofi">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="mb-4 text-white">OSIS : NISKALA ASHCHARYA</h2>
                <div class="text-center">
                    <img src="{{ asset('assets/niskalaAssets/images/logo-niskala.png') }}" alt="" />
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
                                        NISKALA
                                    </button>
                                </h2>
                                <div id="collapseOne1" class="accordion-collapse collapse" aria-labelledby="headingOne1"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Niskala</strong> memiliki arti kokoh, kuat, dan kemenangan. Maka dari itu
                                        Niskala dapat
                                        diartikan sebagai harapan bahwa OSIS SMAN 3 Bogor memiliki keinginan yang kuat
                                        serta pendirian yang kokoh untuk mencapai apa yang sudah direncanakan dan
                                        dipersiapkan dengan sebaik mungkin. Sehingga, terwujudnya suatu organisasi yang
                                        bersinergi, kuat dan selalu mengedepankan aspek kebersamaan dengan saling
                                        melengkapi dan mengingatkan dalam setiap pelaksanaan misi serta rintangan-rintangan
                                        yang menghadang di depan agar organisasi ini tetap kokoh dan dapat mencapai puncak
                                        kemenangan. Bukan hanya kemenangan untuk organisasi, namun juga kemenangan dan
                                        kejayaan untuk warga SMA Negeri 3 Bogor.
                                    </div>
                                </div>
                            </div>
                            <!-- ACCORDION ITEM 2 -->
                            <div class="accordion-item shadow mb-3">
                                <h2 class="accordion-header" id="headingTwo2">
                                    <button class="accordion-button collapsed text-light" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo2" aria-expanded="false"
                                        aria-controls="collapseTwo2">
                                        ASHCHARYA </button>
                                </h2>
                                <div id="collapseTwo2" class="accordion-collapse collapse" aria-labelledby="headingTwo2"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Ashcharya</strong> memiliki arti keajaiban dan kejutan, diharapkan OSIS SMA
                                        Negeri
                                        3 Bogor dapat memunculkan nuansa baru, sebuah kejutan dan keajaiban bagi warga
                                        SMA Negeri 3 Kota Bogor. Serta, diharapkan pula OSIS SMA Negeri 3 Bogor dapat
                                        menjalankan seluruh program kerja yang dilaksanakan dengan maksimal agar
                                        menghasilkan program kerja yang mengagumkan sehingga dapat mendorong seluruh
                                        warga SMA Negeri 3 Bogor dalam mengembangkan seluruh potensi yang dimiliki.
                                        Demi memunculkan suatu keajaiban dan kejutan dalam bentuk siswa maupun siswi
                                        yang berprestasi sehingga dapat mewujudkan generasi emas 2045.
                                    </div>
                                </div>
                            </div>
                            <!-- ACCORDION ITEM 3 -->
                            <div class="accordion-item shadow mb-3">
                                <h2 class="accordion-header" id="headingThree3">
                                    <button class="accordion-button collapsed text-light" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        NISKALA ASHCHARYA
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Niskala Ashcharya</strong> secara keseluruhan memiliki arti, OSIS SMA Negeri
                                        3
                                        Bogor sebagai organisasi yang akan berdiri kokoh dan kuat dengan berintegritas pada
                                        rasa simpati, empati, tenggang rasa, serta saling tolong menolong sehingga mampu
                                        mewujudkan kesuksesan dalam menjalankan kewajiban serta selalu menciptakan
                                        keajaiban bagi warga SMA Negeri 3 Bogor dan merealisasikan harapan siswa siswi
                                        dalam bentuk program kerja-program kerja yang efektif dan bermanfaat bagi seluruh
                                        aspek yang ada di dalam maupun di luar SMA Negeri 3 Bogor dan dapat
                                        membanggakan serta mengharumkan nama baik sekolah SMA Negeri 3 Bogor
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
