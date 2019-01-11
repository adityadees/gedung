    <hr>
    <section id="section3" style="margin-top: 100px;">
        <div class="container">


            <div class="row">
                <div class="col-md-12  col-12 text-center">
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
                    <div class="bs-calltoaction bs-calltoaction-default white-cta">
                        <h3 class="text-center pb-1 black bold">Register</h3>
                        <div class="separator text-center svgcenter"></div>     
                        <div class="row">
                            <form action="<?= base_url()?>login/register" method="POST" enctype="multipart/form-data">
                                <div class="col-md-12  cta-contents text-left">


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                Username
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" name="username" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                Password
                                            </div>
                                            <div class="col-md-9">
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                Re-Password
                                            </div>
                                            <div class="col-md-9">
                                                <input type="password" name="repassword" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                Nama
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" name="nama" class="form-control">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                Email
                                            </div>
                                            <div class="col-md-9">
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                Telepon
                                            </div>
                                            <div class="col-md-9">
                                                <input type="tel" name="tel" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                Alamat
                                            </div>
                                            <div class="col-md-9">
                                                <textarea name="alamat" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                Jenis Kelamin
                                            </div>
                                            <div class="col-md-9">
                                                <select name="jk" class="form-control">
                                                    <option value="L">Laki - Laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                Foto
                                            </div>
                                            <div class="col-md-9">
                                                <input type="file" name="filefoto" class="form-control">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group  text-center">
                                        <div class="row ">
                                            <div class="col-md-6 offset-md-3">
                                                <input type="submit" class="btn btn-block px-3 mr-5 btn-primary" >
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


<!-- 
                        <div class="col-md-3 mr-5  cta-button cta-button-2">
                            <a href="#" class="btn btn-block px-3 mr-5 btn-primary">buy Template now</a>
                        </div> -->