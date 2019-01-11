<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Detail Gedung</h3>
        <div class="row breadcrumbs-top">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a>
              </li>
              <li class="breadcrumb-item"><a href="<?= base_url();?>gedung">Gedung</a>
              </li>
              <li class="breadcrumb-item active">Detail Gedung
              </li>
            </ol>
          </div>
        </div>
      </div>
      <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
          <div class="btn-group" role="group"></div>
          <a class="btn btn-outline-primary" href="" data-toggle="modal" data-target="#modalAdd" ><i class="ft-plus"></i> Tambah Foto</a>
        </div>
      </div>
    </div>
    <div class="content-detached content-left">
      <div class="content-body"><section class="row">
       <div class="col-md-12">
        <div class="card">
         <div class="card-head">
          <div class="card-header">
           <h4 class="card-title"><?= $gedung['gedung_nama']; ?></h4>
           <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
         </div>
         <div class="px-1">
           <ul class="list-inline list-inline-pipe text-center p-1 border-bottom-grey border-bottom-lighten-3">
            <li><b>Pemilik Gedung: <span class="text-muted"><?= $gedung['user_nama']; ?></span></b></li>
          </ul>
        </div>
      </div>
      <div id="project-info" class="card-body row">
        <div class="col-md-12">        
          <img src="<?= base_url()?>assets/images/<?= $gedung['gedung_header']; ?>" class="form-control">
        </div>
      </div>
      <div class="card-body">
        <div class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
         <span>Lokasi Gedung</span>
       </div>
       <div class="row py-2">
        <div class="col-md-12">

          <div class="form-group">
            <div id="map" style="height: 400px;width: 100%"></div>

          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
</section>


<section id="image-gallery" class="card">
  <div class="card-header">
    <h4 class="card-title">Gallery</h4>
    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
    <div class="heading-elements">
      <ul class="list-inline mb-0">
        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
        <li><a data-action="close"><i class="ft-x"></i></a></li>
      </ul>
    </div>
  </div>
  <div class="card-content">
    <div class="card-body">
      <div class="card-text">
      </div>
    </div>
    <div class="card-body  my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
      <div class="row">
        <?php foreach($foto as $kk ):?>
          <figure class="col-lg-3 col-md-6 col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
            <a href="<?= base_url()?>assets/images/<?= $kk['fg_foto']; ?>" itemprop="contentUrl" data-size="480x360">
              <img class="img-thumbnail img-fluid" src="<?= base_url()?>assets/images/<?= $kk['fg_foto']; ?>" itemprop="thumbnail" alt="Images"/>
            </a>
          </figure>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="pswp__bg"></div>
     <div class="pswp__scroll-wrap">
      <div class="pswp__container">
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
      </div>

      <div class="pswp__ui pswp__ui--hidden">
        <div class="pswp__top-bar">
          <div class="pswp__counter"></div>
          <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
          <button class="pswp__button pswp__button--share" title="Share"></button>
          <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
          <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
          <div class="pswp__preloader">
            <div class="pswp__preloader__icn">
              <div class="pswp__preloader__cut">
                <div class="pswp__preloader__donut"></div>
              </div>
            </div>
          </div>
        </div>

        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
          <div class="pswp__share-tooltip"></div> 
        </div>
        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
        </button>
        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
        </button>
        <div class="pswp__caption">
          <div class="pswp__caption__center"></div>
        </div>

      </div>

    </div>
  </div>
</div>
</section>


</div>
</div>
<div class="sidebar-detached sidebar-right">
  <div class="sidebar">
    <div class="project-sidebar-content">

      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Informasi Gedung</h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-content">
          <div class="card-body">
           <ul>
            <li>Sewa : Rp. <?= $gedung['gedung_sewa'];?></li>
            <li>Kapasitas : Rp. <?= $gedung['gedung_kapasitas'];?></li>
            <li>Parkir : Rp. <?= $gedung['gedung_parkir'];?></li>
            <li>Jenis : Rp. <?= ucwords($gedung['gedung_jenis']);?></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Deskripsi</h4>
        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
          <ul class="list-inline mb-0">
            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
            <li><a data-action="close"><i class="ft-x"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="card-content">
        <div class="card-body">
          <p>
            <?= $gedung['gedung_deskripsi']; ?>
          </p>
        </div>
      </div>
    </div>


  </div>

</div>
</div>
</div>
</div>



<div class="modal fade text-left" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel34">Tambah Foto</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url()?>backend/Gedung/upload_foto" method="POST" enctype="multipart/form-data">
        <div class="modal-body">

          <div class="row">
            <div class="card-body">

              <div class="form-group">
                <label>Foto: </label>
                <input type="hidden" name="gedung_kode" value="<?= $gedung['gedung_kode']; ?>">
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
<script>
  var map;
  function initMap() {
   var myLatLng = {lat: <?= $gedung['gedung_lat']; ?>, lng: <?= $gedung['gedung_long']; ?>};

   var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    center: myLatLng
  });

   var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Hello World!'
  });
 }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAX6LW8_BIKXNVzx205L88xRdjfaf5dpfg&callback&callback=initMap"
async defer></script>
