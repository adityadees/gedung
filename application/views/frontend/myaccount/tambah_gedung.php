  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/map/jquery.addressPickerByGiro.css" media="screen">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/backend/vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/backend/vendors/css/tables/datatable/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/backend/css/app.min.css">

  <hr>

  <section id="section3">
    <div class="container tour-wrapper">
        <div class="row">
            <div class="col-12 mb-4">
                <h3 class="text-center pb-1 black bold">Tambah Gedung</h3>
                <div class="separator text-center svgcenter"></div>    

                <p>
                    <?php if($this->session->flashdata('success')){ ?>
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Sukses!</strong> <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php } else if($this->session->flashdata('error')){?>
                        <div class="alert alert-warning">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php }?>
                </p> 
            </div>            
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class="card-header text-white" style="background: #0c373b;">
                        <h5 style="border-bottom: 1px solid;">Publish</h5>
                    </div>
                    <div class="card-content bg-darken collapse show" style="background: #fff;">
                        <div class="card-body card-dashboard">
                            <form action="<?php echo base_url()?>frontend/myaccount/save_gedung" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-md-12">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Gedung Kode: </label>
                                                <?php 
                                                $kd = "GD";
                                                $tgl = date('ydm');
                                                $rand1 = rand(0,999);
                                                $rand2 = rand(0,9);
                                                $gkode = $kd.$tgl.$rand1.$rand2;
                                                ?>
                                                <input type="text" name="gedung_kode" value="<?= $gkode; ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Nama Gedung: </label>
                                                <input type="text" placeholder="Nama Gedung" name="gedung_nama" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Harga: </label>
                                                <input type="text" placeholder="Harga Gedung" name="gedung_harga" class="form-control">
                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Kapasitas Tamu: </label>
                                                <input type="text" placeholder="Kapasitas Tamu" name="kapasitas_tamu" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Kapasitas Parkir: </label>
                                                <input type="text" placeholder="Kapasitas Parkir" name="kapasitas_parkir" class="form-control">
                                            </div>                                  
                                        </div>                                  

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Jenis Gedung: </label>
                                                <select name="jenis_gedung" class="form-control">
                                                    <option value="pendidikan">Gedung Pendidikan</option>
                                                    <option value="instansi">Gedung Instansi / Pemerintah</option>
                                                    <option value="ballroom">Ballroom Hotel</option>
                                                    <option value="serbaguna">Gedung Serbaguna</option>
                                                </select>
                                            </div>
                                        </div>   
                                    </div>   

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Fasilitas: </label>
                                                <div class="row skin skin-flat">
                                                    <div class="col-md-4 col-sm-12">

                                                        <?php
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
                                                        for($i=1; $i<=11; $i++) { ?>
                                                            <fieldset>
                                                                <input type="checkbox" id="<?= $i; ?>" name="fasilitas[]" value="<?= $i; ?>">
                                                                <label for="<?= $i; ?>"><?= $fasi[$i]; ?></label>
                                                            </fieldset>
                                                        <?php } ?>
                                                    </div>


                                                    <div class="col-md-4 col-sm-12">


                                                        <?php
                                                        for($i=12; $i<=21; $i++) { ?>
                                                            <fieldset>
                                                                <input type="checkbox" id="<?= $i; ?>" name="fasilitas[]" value="<?= $i; ?>">
                                                                <label for="<?= $i; ?>"><?= $fasi[$i]; ?></label>
                                                            </fieldset>
                                                        <?php } ?>

                                                    </div>

                                                    <div class="col-md-4 col-sm-12">
                                                        <?php
                                                        for($i=22; $i<=31; $i++) { ?>
                                                            <fieldset>
                                                                <input type="checkbox" id="<?= $i; ?>" name="fasilitas[]" value="<?= $i; ?>">
                                                                <label for="<?= $i; ?>"><?= $fasi[$i]; ?></label>
                                                            </fieldset>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" class="inputAddress input-xxlarge form-control" value="Palembang, Kota Palembang, Sumatera Selatan, Indonesia" name="inputAddress" autocomplete="off" placeholder="Type in your address">
                                            </div>  
                                        </div>  
                                    </div>  


                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Latitude</label>
                                                <input type="text" class="latitude form-control" name="latitude" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Longitude</label>
                                                <input type="text" class="longitude form-control" name="longitude" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Deskripsi: </label>
                                                <textarea name="gedung_deskripsi" placeholder="Deskripsi" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Foto Cover: </label>
                                                <input type="file" name="filefoto" class="dropzone dropzone-area form-control" id="dpz-single-file">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="submit" value="Save" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


<script src="<?= base_url()?>assets/backend/vendors/js/vendors.min.js"></script>
<script src="<?= base_url()?>assets/backend/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?= base_url()?>assets/backend/js/scripts/tables/datatables/datatable-basic.min.js"></script>



<script src="<?php echo base_url();?>assets/backend/vendors/js/forms/icheck/icheck.min.js"></script>
<script src="<?php echo base_url();?>assets/backend/js/scripts/forms/checkbox-radio.min.js"></script>


<script src="<?php echo base_url() ?>assets/map/jquery.addressPickerByGiro.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAogXD-AHrsmnWinZIyhRORJ84bgLwDPpg"></script>
<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $( '.angka' ).mask('0.000.000.000', {reverse: true});
    })
</script>

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