<hr style="margin-top: 100px;">
<div class="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h4><?= $gedung['gedung_nama'];?></h4>
            </div>
            <div class="col-md-6 text-right">
                <h4>Rp. <?= number_format($gedung['gedung_sewa']);?></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div  class="white-popup">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url();?>gedung/detail<?= $gedung['gedung_kode']; ?>"  target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a> &nbsp;
                    <a href="https://twitter.com/intent/tweet?text=Uxithemes&amp;url=<?= base_url();?>gedung/detail<?= $gedung['gedung_kode']; ?>" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>&nbsp;
                    <a href="https://plus.google.com/share?url=<?= base_url();?>gedung/detail<?= $gedung['gedung_kode']; ?>">
                        <i class="fab fa-google-plus-g"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<section id="section3" class="tour-list-sidebar tour-list-sidebar-2-col" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <div class="more-info mx-auto my-4">

                    <h6 class="black semibold text-center mx-4 mt-3 mb-3 info-title"><?= $gedung['user_nama']; ?></h6>
                    <div class="pb-2 pl-4">                      
                        <a href="tel:<?= $gedung['user_tel']; ?>"><h5 class="grey tel-info"><i class="fas primary-color fa-phone faa-tada animated mr-2 grey my-lg-0 mb-1"></i><?= $gedung['user_tel']; ?></h5></a>  
                        <a href="mailto:<?= $gedung['user_email']; ?>"><h5 class="grey mail-info"><i class="fas fa-envelope faa-horizontal animated primary-color mr-2"></i><?= $gedung['user_email']; ?></h5></a>
                        <h5 class="grey mail-info"><i class="fas fa-map-marker faa-horizontal animated primary-color mr-2"></i><?= $gedung['gedung_alamat']; ?></h5>
                    </div>
                    <div class="pb-2">                      
                        <div id="map-small"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <section id="sectioncarousel" style="margin-top: -35px;max-height: 520px">
                    <div id="carouselExampleIndicators" class="carousel carousel-home2  slide" data-ride="carousel" >
                        <ol class="carousel-indicators">
                            <?php $no=0; foreach($foto as $kk):?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $no; ?>" class="<?php if($no==0){ echo "active";} else {}?>"></li>
                            <?php  $no++; endforeach; ?>
                        </ol>
                        <div class="carousel-inner " role="listbox">
                            <?php $no=0; foreach($foto as $kk):?>
                            <div class="carousel-item <?php if($no==0){ echo "active";} else {}?>">

                                <div class="album">
                                    <a href="<?= base_url()?>assets/images/<?= $kk['fg_foto']; ?>" class="image-link card-grid-popup">
                                        <img class=" img-fluid" src="<?= base_url()?>assets/images/<?= $kk['fg_foto']; ?>" alt="First slide" style="max-height: 520px">
                                    </a>
                                </div>
                            </div>
                            <?php $no++; endforeach; ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>              
                </section>


                <h4 id="read-tour" class="black text-left mb-3 bold"><?= $gedung['gedung_nama']; ?></h4>

                <div class="separator-tour"></div>
                <div class="separator-tour"></div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="tour-item-title list-font">Harga</div>
                        <div class="tour-item-description list-font"><?= "Rp. ".number_format($gedung['gedung_sewa']); ?></div>
                    </div>
                    <div class="col-md-3">
                        <div class="tour-item-title list-font">Kapasitas Gedung</div>
                        <div class="tour-item-description list-font"><?=  $gedung['gedung_kapasitas']." Orang"; ?></div>

                    </div>
                    <div class="col-md-3">
                        <div class="tour-item-title list-font">Kapasitas Parkir</div>
                        <div class="tour-item-description list-font"><?= $gedung['gedung_parkir']." M2"; ?></div>

                    </div>
                    <div class="col-md-3">
                        <div class="tour-item-title list-font">Jenis Gedung </div>
                        <div class="tour-item-description list-font"><?= ucwords($gedung['gedung_jenis']); ?></div>
                    </div>
                </div>

                <div class="separator-tour"></div>

                <ul class="single-tour-container">

                    <div class="row">

                        <?php
                        $gfasis =  (explode(", ",$gedung['gedung_fasilitas']));

                        $fasi = [
                            1=>
                            "Catering",
                            "Dekorasi Pelaminan",
                            "Photo & Video Akad Resepsi",
                            "Album Kolase",
                            "Makeup",
                            "Mc / Pembawa Acara",
                            "Weeding Organizer",
                            "Entertainment",
                            "Pakaian Pengantin",
                            "Ruang Full AC",
                            "Meja VIP",
                            "Lighting",
                            "Lcd Proyektor",
                            "Tari Tradisional",
                            "Photo Both",
                            "Seragam Keluarga",
                            "Seragam Orang tua",
                            "Meja Akad nikah",
                            "Buku Tamu",
                            "Kotak Amplop",
                            "Box Hantaran",
                            "Free Menginap di Hotel",
                            "Qoori Akad / Resepsi",
                            "Ruang Hias",
                            "Raung Tunggu Pengantin",
                            "Beskap Pengantin",
                            "Rental Mobil Pengantin",
                            "Kursi sofa",
                            "Meja makan prasmanan",
                            "Gazebo Pintu Masuk",
                            "Red Carpet"
                        ];

                        for($kk=1; $kk<=31; $kk++) { 
                            ?>
                            <div class="col-md-4">
                                <?php if (in_array($kk, $gfasis)) {echo "<label style='color:red'>".$fasi[$kk]."</label>"; } else { echo "<label><strike>".$fasi[$kk]."</strike></label>";}?>
                            </div>
                        <?php } 
                        ?>
                    </div>
                </ul> 

                <div class="mr-lg-5">    
                    <div class="tour-schedule">
                        <h6 class="black bold mt-5 mb-3">Deskripsi</h6>

                        <p><?= $gedung['gedung_deskripsi']; ?></p>

                    </div>    
                </div>    
            </div>
        </div>
    </div>
</section>



<script>
    function initMap() {
        var uluru = {lat: <?= $gedung['gedung_lat']; ?>, lng: <?= $gedung['gedung_long']; ?>};
        var map = new google.maps.Map(document.getElementById('map-small'), {
            zoom: 12,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAX6LW8_BIKXNVzx205L88xRdjfaf5dpfg&callback=initMap">
</script>