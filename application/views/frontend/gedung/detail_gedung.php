
<div class="tour-title not-fixed center-image">
    <img class="w-100 h-100" src="<?= base_url()?>assets/images/<?= $gedung['gedung_header']?>" alt="">
    <h1 class="white text-center front shadow-text center-text"><?= $gedung['gedung_nama']; ?></h1>  

    <a class="smooth-scroll" href="#read-tour">
        <img class="curvechevron" src="<?= base_url()?>assets/frontend/assets/svgs/curvesingle.svg" alt="image">
        <div class="chevroncurve">
            <i class="fas  hoverchevron white fa-chevron-down"></i>
        </div>
    </a>
</div>

<section id="section3" class="tour-list-sidebar tour-list-sidebar-2-col">



    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-3 ml-lg-5 order-lg-first order-last mt-5 mt-lg-0">

                <div class="mb-lg-3 mb-4  text-center">

                    <a href="#gallery-1" role="button"  class="btn-gallery mb-2 d-lg-inline-block d-block">
                        <span id="btnFA" class="btn  btn-outline-danger pt-2 mr-1  px-3">
                            View Gallery
                            <i class="ml-2 fas fa-images"></i>
                        </span>
                    </a>

                    <div id="gallery-1" class="hidden">
                        <?php foreach($foto as $kk):?>
                            <a href="<?= base_url()?>assets/images/<?= $kk['fg_foto']; ?>" class="image-link card-grid-popup"></a>
                        <?php endforeach; ?>
                    </div>

                    <a href="#test-popup" role="button" class="open-popup-link d-lg-inline-block d-block">
                        <span id="btnFA2" class="btn btn-outline-danger pt-2 px-3">
                            Share This
                            <i class="ml-2 fas fa-share-alt"></i>
                        </span>
                    </a>

                    <div id="test-popup" class="white-popup mfp-hide text-center">
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

                <div class="more-info mx-auto my-4">
                    <h6 class="black semibold text-center mx-4 mt-3 mb-3 info-title">Quick Contact</h6>
                    <div class="pb-2">                      
                        <a href="tel:<?= $gedung['user_tel']; ?>"><h5 class="grey text-center tel-info"><i class="fas primary-color fa-phone faa-tada animated mr-2 grey my-lg-0 mb-1"></i><?= $gedung['user_tel']; ?></h5></a>  
                        <a href="mailto:<?= $gedung['user_email']; ?>"><h5 class="grey text-center mail-info"><i class="fas fa-envelope faa-horizontal animated primary-color mr-2"></i><?= $gedung['user_email']; ?></h5></a>                        
                    </div>
                </div>

                <div class="mb-lg-3 mb-4  text-center">
                    <h5 class="bold">Our Location </h5>
                    <div id="map-small"></div>
                </div>
            </div>

            <div class="col-xs-12 col-md-11 col-lg-8   single-tour">

                <h4 id="read-tour" class="black text-left mb-3 bold"><?= $gedung['gedung_nama']; ?></h4>

                <div class="separator-tour"></div>
                <div class="cardHolder album">
                    <?php foreach($foto as $kk):?>
                        <a href="<?= base_url()?>assets/images/<?= $kk['fg_foto']; ?>" class="image-link card-grid-popup">
                            <img class="card-grid-popup2" src="<?= base_url()?>assets/images/<?= $kk['fg_foto']; ?>" alt="image"/>
                        </a>
                    <?php endforeach; ?>
                </div>

                <div class="separator-tour"></div>

                <ul class="single-tour-container">
                    <li>
                        <div class="tour-item-title list-font">Harga</div>
                        <div class="tour-item-description list-font"><?= "Rp. ".number_format($gedung['gedung_sewa']); ?></div>
                    </li>

                    <li>
                        <div class="tour-item-title list-font">Kapasitas Gedung</div>
                        <div class="tour-item-description list-font"><?=  $gedung['gedung_kapasitas']." Orang"; ?></div>
                    </li>

                    <li>
                        <div class="tour-item-title list-font">Kapasitas Parkir</div>
                        <div class="tour-item-description list-font"><?= $gedung['gedung_parkir']." Kendaraan"; ?></div>
                    </li>

                    <li>
                        <div class="tour-item-title list-font">Jenis Gedung </div>
                        <div class="tour-item-description list-font"><?= ucwords($gedung['gedung_jenis']); ?></div>
                    </li> 
                    <li>
                        <div class="tour-item-title list-font">Alamat Gedung </div>
                        <div class="tour-item-description list-font"><?= ucwords($gedung['gedung_alamat']); ?></div>
                    </li> 

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