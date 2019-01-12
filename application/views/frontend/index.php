    <section id="section3">
        <div class="container formhome2 text-center justify-content-center align-items-center pb-4" >
            <h4 class="black mx-2 mb-3 mt-0 pt-4 text-center bold  d-block">Tentukan Pilihanmu</h4>
            Bingung? Ingin memilih gedung sesuai dengan apa yang anda inginkan? <br>
            <a href="<?= base_url()?>pencarian" class="btn btn-primary mb-2 mx-4 mx-md-0 mr-lg-2 py-2 form-control-inline3">Search</a>
        </div>
    </section>

    <section id="section-masonry">

        <div class="container">
            <div class="row">
                <div class="content tours-homepage">
                    <div class="container">
                        <div class="text-center"><h3 class="black front bold text-center">Gedung</h3>
                            <div class="separator text-center svgcenter"></div>     
                            <h5 class="primary-color text-center mb-5">Pilihan gedung yang mungkin akan menarik bagi anda.</h5> 
                        </div>
                        
                        <div class="row ">

                            <?php foreach ($gedung as $i) :?>
                                <div class="col-xs-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card ">
                                       
                                        <a class="img-card" href="<?= base_url()?>gedung/detail/<?= $i['gedung_kode']; ?>">
                                            <img src="<?= base_url()?>assets/images/<?= $i['gedung_header']?>" alt=""/>
                                        </a>
                                        <div class="card-content">
                                            <div>
                                                <a class="btn btn-primary px-3 ml-3 mr-1 my-1 btn-sm float-left" href="#" >
                                                    <i class="fa fa-tag"></i>  <?= $i['gedung_jenis']; ?>
                                                </a>
                                            </div>
                                            <h6 class="primary-color text-right "><?= "Rp. ".number_format($i['gedung_sewa'])?></h6>
                                            <h6 class="black"><a href="<?= base_url()?>gedung/detail/<?= $i['gedung_kode']; ?>"><?= $i['gedung_nama'];?></a></h6>
                                            <p class="">
                                                <?= $i['gedung_deskripsi'];?>
                                                 <a href="<?= base_url()?>gedung/detail/<?= $i['gedung_kode']; ?>"><span>... See more</span></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>


                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?= $this->pagination->create_links(); ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="section4">
        <img class="curve3" src="<?= base_url();?>assets/frontend/assets/svgs/curve2.svg" alt="">

        <div class="container">
            <div class="row">
                <div class="col-12"><h4 class="text-center bold mb-5"> Nikah Yukk !!!</h4></div>
                <h5 class="primary-color text-center mb-5 ">Solusi Cerdas untuk mencari gedung pernikahan yang sesuai dengan kebutuhan anda. Kami juga menawarkan pemasanan iklan gedung yang valid sesuai dengan data yang ada.</h5> 

                <div class="col-lg-4 col-12 order-1 order-lg-1 mx-auto">
                    <img class="svgcenter worldclass mb-2" src="<?= base_url();?>assets/frontend/assets/svgs/worldclass.svg" alt="" >
                </div>

                <div class="col-lg-4 col-12 order-3 order-lg-2 mx-auto">
                    <img class="svgcenter lovetravel mt-5 mt-lg-0 mb-2" src="<?= base_url();?>assets/frontend/assets/svgs/lovetravel.svg" alt="" >
                </div>

                <div class="col-lg-4 col-6 order-5 order-lg-3 mx-auto">
                    <img class="svgcenter parisicon mt-5 mt-lg-0 mb-2" src="<?= base_url();?>assets/frontend/assets/svgs/hottours.svg" alt="" >
                </div>

                <div class="col-lg-4 col-12 order-2 order-lg-4">
                    <h6 class="mt-3 text-center">Pencarian Cepat</h6>    
                    <p class="mb-0 pt-1 px-4  black text-justify">
                        Dapatkan Fitur pencarian gedung yang mempermudahkan anda untuk mengambil keputusan.
                    </p>                        
                </div>
                <div class="col-lg-4 col-12 order-4 order-lg-5">
                    <h6 class="mt-3 text-center">Pencarian Solusi</h6>    
                    <p class="pt-1 px-4 mb-0 black text-justify">
                        Kami memiliki fitur yang dapat memberikan solusi terhadap kebutuhan yang anda inginkan.
                    </p>                        
                </div>

                <div class="col-lg-4 col-12 order-6 order-lg-6">
                    <h6 class="mt-3 text-center">Pemasangan Iklan Gedung Valid</h6>    
                    <p class="pt-1 px-4 mb-0 black text-justify">
                        Kami meyakinkan anda untuk memverifikasikan data gedung yang akan anda pasang sesuai dengan ketentuan yang valid.
                    </p>            
                </div>
            </div>
        </div>

    </section>



