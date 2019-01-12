  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/map/jquery.addressPickerByGiro.css" media="screen">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/backend/vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/backend/vendors/css/tables/datatable/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/backend/css/app.min.css">

  <hr>

  <section id="section3">
    <div class="container tour-wrapper">
        <div class="row">
            <div class="col-12 mb-4">
                <h3 class="text-center pb-1 black bold">My Account</h3>
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
                    <div class="card-header" style="background: #fcfcfc;">
                        <div class="col-lg-12 col-sm-12 col-12 mx-auto mt-3">
                            <ul class="nav nav-pills nav-justified" >
                                <li class="nav-item" >
                                    <a class="nav-link active" data-toggle="pill" href="#gedungSaya" >Gedung Saya</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#dataPribadi">Data Pribadi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#pengaturan">Pengaturan</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content bg-darken collapse show" style="background: #eeebf4;">
                        <div class="card-body card-dashboard">
                          <div class="tab-content" >
                              <div class="tab-pane container active" id="gedungSaya" >
                                <table class="table table-striped table-bordered zero-configuration" >
                                    <thead>
                                        <tr>
                                            <th>Nama Gedung</th>
                                            <th>Biaya Sewa</th>
                                            <th>Kapasitas</th>
                                            <th>Luas Parkir</th>
                                            <th>Jenis</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($gedung as $i) : ?>
                                            <tr>
                                                <td><a href="<?= base_url(); ?>gedung/detail/<?= $i['gedung_kode']; ?>"><b><?= $i['gedung_nama']; ?></b></a></td>
                                                <td><?= "Rp. ".number_format($i['gedung_sewa']); ?></td>
                                                <td><?= number_format($i['gedung_kapasitas']); ?></td>
                                                <td><?= number_format($i['gedung_parkir']); ?></td>
                                                <td><?= ucwords($i['gedung_jenis']); ?></td>
                                                <td><img src="<?= base_url()?>assets/images/<?= $i['gedung_header']; ?>" width="50px" height="50px"></td>
                                                <td>
                                                    <div class="btn-group mr-1 mb-1">
                                                        <button type="button" class="btn btn-info btn-min-width dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-info"></i> &nbsp;Aksi</button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalAddF<?php echo $i['gedung_kode']; ?>">Tambah Foto</a>
                                                            <div class="divider"></div>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalEdit<?php echo $i['gedung_kode']; ?>">Edit</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalHapus<?php echo $i['gedung_kode']; ?>">Hapus</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane container fade" id="dataPribadi">

                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        <form class="form form-horizontal" action="<?= base_url();?>frontend/myaccount/update_user" method="POST" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput1">Username</label>
                                                    <div class="col-md-9">
                                                        <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>">
                                                        <input type="text" id="projectinput1" class="form-control" placeholder="Username" name="username" value="<?= $user['user_username']; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput2">Nama</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="projectinput2" class="form-control" placeholder="Nama" name="nama" value="<?= $user['user_nama']; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput3">E-mail</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="projectinput3" class="form-control" placeholder="E-mail" name="email" value="<?= $user['user_email']; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput4">Telepon</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="projectinput4" class="form-control" placeholder="Telepon" name="tel" value="<?= $user['user_tel']; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput6">Jenis Kelamin</label>
                                                    <div class="col-md-9">
                                                        <select id="projectinput6" name="jk" class="form-control">
                                                            <option value="L" <?php if($user['user_jk']=='L'){ echo "selected";} else {}?>>Laki - Laki</option>
                                                            <option value="P" <?php if($user['user_jk']=='P'){ echo "selected";} else {}?>>Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Foto</label>
                                                    <div class="col-md-9">
                                                        <label id="projectinput8" class="file center-block">
                                                            <input type="file" name="filefoto" id="file">
                                                            <span class="file-custom"></span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput9">Alamat</label>
                                                    <div class="col-md-9">
                                                        <textarea id="projectinput9" rows="5" class="form-control" name="alamat" placeholder="Alamat"><?= $user['user_alamat']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane container fade" id="pengaturan">
                                <div class="card-content collapse show">

                                    <div class="card-body">
                                        <form class="form form-horizontal" action="<?= base_url();?>frontend/myaccount/update_password" method="POST">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i> Ganti Password</h4>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput1">Password Lama</label>
                                                    <div class="col-md-9">
                                                        <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>">
                                                        <input type="password" id="projectinput1" class="form-control"  name="oldpassword" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput2">Password Baru</label>
                                                    <div class="col-md-9">
                                                        <input type="password" id="projectinput2" class="form-control" name="newpassword">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput2">Ulangi Password</label>
                                                    <div class="col-md-9">
                                                        <input type="password" id="projectinput2" class="form-control" name="repassword">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
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



<?php foreach ($gedung as $i)  : ?>
    <div class="modal fade text-left" id="modalEdit<?php echo $i['gedung_kode']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel34">Edit Gedung</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url();?>frontend/myaccount/update_gedung" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">


                        <div class="row">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-underline no-hover-bg">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="base-tab31<?= $i['gedung_kode']; ?>" data-toggle="tab" aria-controls="tab31<?= $i['gedung_kode']; ?>" href="#tab31<?= $i['gedung_kode']; ?>" role="tab" aria-selected="true">Informasi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="base-tab32<?= $i['gedung_kode']; ?>" data-toggle="tab" aria-controls="tab32<?= $i['gedung_kode']; ?>" href="#tab32<?= $i['gedung_kode']; ?>" role="tab" aria-selected="false">Kriteria</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="base-tab33<?= $i['gedung_kode']; ?>" data-toggle="tab" aria-controls="tab33<?= $i['gedung_kode']; ?>" href="#tab33<?= $i['gedung_kode']; ?>" role="tab" aria-selected="false">Alamat</a>
                                    </li>
                                </ul>
                                <div class="tab-content px-1 pt-1">
                                    <div class="tab-pane active" id="tab31<?= $i['gedung_kode']; ?>" role="tab" aria-labelledby="base-tab31<?= $i['gedung_kode']; ?>">
                                        <div class="form-group">
                                            <label>Gedung Kode: </label>
                                            <input type="text" name="gedung_kode" value="<?= $i['gedung_kode']; ?>" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Gedung: </label>
                                            <input type="text" placeholder="Nama Gedung" name="gedung_nama" value="<?= $i['gedung_nama']; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi: </label>
                                            <textarea name="gedung_deskripsi" class="form-control"><?= $i['gedung_deskripsi']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Foto Cover: </label>
                                            <input type="file" name="filefoto" class="dropzone dropzone-area form-control" id="dpz-single-file">
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="tab32<?= $i['gedung_kode']; ?>" aria-labelledby="base-tab32<?= $i['gedung_kode']; ?>">

                                        <div class="form-group">
                                            <label>Harga: </label>
                                            <input type="number" placeholder="Harga Gedung" name="gedung_harga" value="<?= $i['gedung_sewa']; ?>" class="form-control harga">
                                        </div>

                                        <div class="form-group">
                                            <label>Kapasitas Tamu: </label>
                                            <input type="text" placeholder="Kapasitas Tamu" name="kapasitas_tamu" value="<?= $i['gedung_kapasitas']; ?>"  class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Kapasitas Parkir: </label>
                                            <input type="text" placeholder="Kapasitas Parkir" name="kapasitas_parkir"  value="<?= $i['gedung_parkir']; ?>"  class="form-control">
                                        </div>                                  

                                        <div class="form-group">
                                            <label>Jenis Gedung: </label>
                                            <select name="jenis_gedung" class="form-control">
                                                <option value="pendidikan" <?php if($i['gedung_jenis']=='pendidikan') {echo "selected";} else {}?>>Gedung Pendidikan</option>
                                                <option value="instansi" <?php if($i['gedung_jenis']=='instansi') {echo "selected";} else {}?>>Gedung Instansi / Pemerintah</option>
                                                <option value="ballroom" <?php if($i['gedung_jenis']=='ballroom') {echo "selected";} else {}?>>Ballroom Hotel</option>
                                                <option value="serbaguna" <?php if($i['gedung_jenis']=='serbaguna') {echo "selected";} else {}?>>Gedung Serbaguna</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Fasilitas: </label>
                                            <div class="row skin skin-flat">
                                                <div class="col-md-4 col-sm-12">


                                                    <?php

                                                    $gfasis =  (explode(", ",$i['gedung_fasilitas']));

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


                                                    for($kk=1; $kk<=11; $kk++) { ?>
                                                        <fieldset>
                                                            <input type="checkbox" id="<?= $kk; ?>" name="fasilitas[]" value="<?= $kk; ?>">
                                                            <label for="<?= $kk; ?>"><?= $fasi[$kk]; ?></label>
                                                        </fieldset>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <?php
                                                    for($kk=12; $kk<=21; $kk++) { ?>
                                                        <fieldset>
                                                            <input type="checkbox" id="<?= $kk; ?>" name="fasilitas[]" value="<?= $kk; ?>">
                                                            <label for="<?= $kk; ?>"><?= $fasi[$kk]; ?></label>
                                                        </fieldset>
                                                    <?php } ?>

                                                </div>

                                                <div class="col-md-4 col-sm-12">
                                                    <?php
                                                    for($kk=22; $kk<=31; $kk++) { ?>
                                                        <fieldset>
                                                            <input type="checkbox" id="<?= $kk; ?>" name="fasilitas[]" value="<?= $kk; ?>">
                                                            <label for="<?= $kk; ?>"><?= $fasi[$kk]; ?></label>
                                                        </fieldset>
                                                    <?php } ?>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="tab33<?= $i['gedung_kode']; ?>" aria-labelledby="base-tab33<?= $i['gedung_kode']; ?>">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="hidden" name="numkor">
                                            <input type="text" class="inputAddress input-xxlarge form-control" value="<?= $i['gedung_alamat']; ?>" name="inputAddress" autocomplete="off" placeholder="Type in your address">
                                        </div>  

                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input type="text" class="latitude form-control" value="latitude" readonly name="latitude" >
                                        </div>
                                        <div class="form-group">
                                            <label>Longitude</label>
                                            <input type="text" class="longitude form-control" value="longitude" readonly name="longitude">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                        <input type="submit" class="btn btn-outline-primary btn-lg" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php
endforeach;
foreach ($gedung as $i)  : 
    ?>

    <div class="modal fade text-left" id="modalHapus<?php echo $i['gedung_kode']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel34">Konfirmasi</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url();?>frontend/myaccount/delete_gedung" method="POST">
                    <div class="modal-body bg-red">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="gedung_kode" value="<?php echo $i['gedung_kode'];?>">
                                    <label class="text-center text-white">Anda yakin ingin menghapus gedung <b><?php echo $i['gedung_nama']; ?></b> ?</label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                        <input type="submit" class="btn btn-outline-primary btn-lg" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
endforeach;
foreach ($gedung as $i)  : 
    ?>


    <div class="modal fade text-left" id="modalAddF<?= $i['gedung_kode'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel34">Tambah Foto</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url()?>frontend/myaccount/upload_foto" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Foto: </label>
                                    <input type="hidden" name="gedung_kode" value="<?= $i['gedung_kode']; ?>">
                                    <input type="file" name="filefoto" class="dropzone dropzone-area form-control" id="dpz-single-file">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                      <input type="submit" class="btn btn-outline-primary btn-lg" value="Submit">
                  </div>
              </form>
          </div>
      </div>
  </div>

<?php endforeach; ?>

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