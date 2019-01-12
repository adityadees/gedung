<div class="tour-title not-fixed center-image">
    <img class="w-100 h-100" src="<?= base_url()?>assets/frontend/assets/images/search.jpg" alt="">
    <h1 class="white text-center front shadow-text center-text">Find your Rent</h1>  
    <img class="curve2 front" src="<?= base_url()?>assets/frontend/assets/svgs/curve.svg" alt="">
</div>

<section id="section3" class="tour-list-sidebar-2-col">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-4 order-lg-first order-last mt-3 mt-lg-0">
            <div class="form-container py-3">
                <h4 class="black bold mt-3 px-4 pb-2 text-center">Cari Gedung</h4>
                <form id="sidebar-form" class="px-xl-5 px-lg-3 px-4" method="POST" action="<?= base_url();?>frontend/pencarian/cari"> 
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <span>Harga Gedung</span>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <select class="form-control" name="harga">
                                    <?php foreach ($harga as $hr) : ?>
                                        <option value="<?= $hr['sk_nilai']; ?>"><?= $hr['sk_klasifikasi']. " (".$hr['sk_range'].")"; ?></option>
                                    <?php endforeach; ?>
                                </select>                                                   
                                <div class="input-group-append">
                                    <div class="input-group-text">  <i class="fa fa-dollar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="form-group row">

                        <div class="col-sm-12">
                            <span>Kapasitas Gedung</span>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <select class="form-control" name="kapasitas">
                                    <?php foreach ($kapasitas as $hr) : ?>
                                        <option value="<?= $hr['sk_nilai']; ?>"><?= $hr['sk_klasifikasi']. " (".$hr['sk_range'].")"; ?></option>
                                    <?php endforeach; ?>
                                </select>                                                   
                                <div class="input-group-append">
                                    <div class="input-group-text">  <i class="fa fa-cube"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="form-group row">

                        <div class="col-sm-12">
                            <span>Luas Parkir</span>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <select class="form-control" name="parkir">
                                    <?php foreach ($parkir as $hr) : ?>
                                        <option value="<?= $hr['sk_nilai']; ?>"><?= $hr['sk_klasifikasi']. " (".$hr['sk_range'].")"; ?></option>
                                    <?php endforeach; ?>
                                </select>                                                   
                                <div class="input-group-append">
                                    <div class="input-group-text">  <i class="fas fa-car"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="form-group row">

                        <div class="col-sm-12">
                            <span>Jenis Gedung</span>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <select class="form-control" name="jenis">
                                    <?php foreach ($jenis as $hr) : ?>
                                        <option value="<?= $hr['sk_nilai']; ?>"><?= $hr['sk_klasifikasi']. " (".$hr['sk_range'].")"; ?></option>
                                    <?php endforeach; ?>
                                </select>                                                   
                                <div class="input-group-append">
                                    <div class="input-group-text">  <i class="fas fa-tag"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <span>Fasilitas Gedung</span>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <select class="form-control" name="fasilitas">
                                    <?php foreach ($fasilitas as $hr) : ?>
                                        <option value="<?= $hr['sk_nilai']; ?>"><?= $hr['sk_klasifikasi']. " (".$hr['sk_range'].")"; ?></option>
                                    <?php endforeach; ?>
                                </select>                                                   
                                <div class="input-group-append">
                                    <div class="input-group-text">  <i class="fas fa-building"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  


                    <div class="form-group row">
                        <div class="col-sm-12">
                            <span>Jarak Lokasi</span>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <select class="form-control" name="jarak">
                                    <?php foreach ($jarak as $hr) : ?>
                                        <option value="<?= $hr['sk_nilai']; ?>"><?= $hr['sk_klasifikasi']. " (".$hr['sk_range'].")"; ?></option>
                                    <?php endforeach; ?>
                                </select>                                                   
                                <div class="input-group-append">
                                    <div class="input-group-text">  <i class="fas fa-marker"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  


                    <div class="form-group row">
                        <div class="col-sm-12">
                            <span>Lokasi Anda</span>
                        </div>
                        <div class="col-sm-12">
                            <input type="text" class="inputAddress input-xxlarge form-control" value="Palembang, Kota Palembang, Sumatera Selatan, Indonesia" name="inputAddress" autocomplete="off" placeholder="Type in your address">
                        </div>

                        <input type="hidden" class="latitude form-control" name="latitude" >
                        <input type="hidden" class="longitude form-control" name="longitude">
                    </div>  




                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn col-sm-12 my-2 btn-primary">Search</button>

                        </div>
                    </div>
                </form>
            </div>
            <div class="more-info mx-auto my-4">
                <h6 class="black semibold text-center mx-4 mt-3 mb-3 info-title">Quick Contact</h6>
                <div class="pb-2">                      

                    <a href="tel:+133331111"><h5 class="grey text-center tel-info"><i class="fas primary-color fa-phone faa-tada animated mr-2 grey my-lg-0 mb-1"></i>(+62) 8888888</h5></a>  
                    <a href="mailto:hello@ourcompany.com"><h5 class="grey text-center mail-info"><i class="fas fa-envelope faa-horizontal animated primary-color mr-2"></i>nikah@yuk.com</h5></a>                        
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <?php
            $no=0;
            for($i=0;$i<10;$i++){
                $no++;
                $arrH[$i] = $hasil[$i];
                $ck = $this->db->query("SELECT * from gedung where gedung_kode='$arrH[$i]'")->row_array();
                ?>
                <div class="card mb-4">
                    <a class="img-card" href="<?= base_url()?>gedung/detail/<?= $ck['gedung_kode']; ?>">
                        <small class="white front tiny"><span class="mr-2 white"></span><?= $no;?></small>
                        <div class="bottom-tour-background"></div>                         
                        <img src="<?= base_url()?>assets/images/<?= $ck['gedung_header']?>" alt="image" />
                    </a>
                    <div class="card-content"> 
                        <div class="row align-items-center">  
                            <div class="col-8">                         
                                <h6 class="black mb-2"><a href="<?= base_url()?>gedung/detail/<?= $ck['gedung_kode']; ?>" target="_blank"><?= $ck['gedung_nama']?></a></h6>
                            </div>  
                            <div class="col-4 align-middle">                         
                                <h6 class="primary-color text-right "><?= "Rp. ".number_format($ck['gedung_sewa'])?></h6>
                            </div>
                            <div>
                                <a class="btn btn-primary px-3 ml-3 mr-1 my-1 btn-sm float-left" href="#" >
                                    <i class="fa fa-tag"></i>  <?= $ck['gedung_jenis']; ?>
                                </a>
                                <a class="btn btn-primary mx-1 px-3 mx-2 my-1 btn-sm float-left" href="#" role="button">
                                    <i class="fa fa-male"></i>  <?= $ck['gedung_kapasitas']; ?>
                                </a>
                                <a class="btn btn-primary mx-1 px-3 mx-2 my-1 btn-sm float-left" href="#" role="button">
                                    <i class="fa fa-car"></i> <?= $ck['gedung_parkir']; ?>
                                </a>
                            </div>
                        </div>                                                                                               
                    </div>
                </div>


            <?php } ?>

            

        </div>



    </div>
</div>
</section>




<script src="<?php echo base_url() ?>assets/map/jquery.addressPickerByGiro.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAogXD-AHrsmnWinZIyhRORJ84bgLwDPpg&sensor=false&language=id"></script>


<script>
    $('.inputAddress').addressPickerByGiro({
        distanceWidget: true,
        boundElements: {
            'latitude': '.latitude',
            'longitude': '.longitude',
            'formatted_address': '.formatted_address'
        }
    });
</script>