
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2">
				<h3 class="content-header-title mb-0">Data Gedung</h3>
			</div>
		</div>
		<div class="content-body">
			
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">
								<a class="btn btn-primary" href="" data-toggle="modal" data-target="#modalAdd">Tambah Data</a></h4>
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
							<div class="card-content collapse show">
								<div class="card-body card-dashboard">
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

									<div class="table-responsive">
										<table class="table table-striped table-bordered zero-configuration">
											<thead>
												<tr>
													<th>Kode</th>
													<th>Nama Gedung</th>
													<th>Nama Pemilik</th>
													<th>Koordinat</th>
													<th>Alamat</th>
													<th>Deskripsi</th>
													<th>Gambar</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($gedung as $i)  : ?>
													<tr>
														<td><?php echo $i['gedung_kode'];?></td>
														<td><?php echo $i['gedung_nama'];?></td>
														<td><?php echo $i['user_nama'];?></td>
														<td><?php echo $i['gedung_lat']." - ".$i['gedung_long'];?></td>
														<td><?php echo $i['gedung_alamat'];?></td>
														<td><?php echo $i['gedung_deskripsi'];?></td>
														<td>
															<?php 
															$wherefg = [
																'gedung_kode' => $i['gedung_kode']
															];
															$ckk = $this->Mymod->ViewDetail('foto_gedung',$wherefg);
															?>
															<img src="<?= base_url()?>assets/images/<?php echo $ckk['fg_foto'];?>" width="50px" height="50px">

														</td>
														<td class=" text-center">
															<div class="btn-group mr-1 mb-1">
																<button type="button" class="btn btn-icon btn-pink dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-info"></i></button>
																<div class="dropdown-menu">
																	<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalEdit<?php echo $i['gedung_kode']; ?>">Edit</a>
																	<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalHapus<?php echo $i['gedung_kode']; ?>">Hapus</a>
																	<div class="dropdown-divider"></div>
																	<a class="dropdown-item" href="<?= base_url();?>admin/gedung/detail/<?= $i['gedung_kode']; ?>">Lihat Detail</a>
																</div>
															</div>
														</td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
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
					<h3 class="modal-title" id="myModalLabel34">Tambah Gedung</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url()?>backend/Gedung/save_gedung" method="POST" enctype="multipart/form-data">
					<div class="modal-body">

						<div class="row">
							<div class="card-body">
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
											<label>Pemilik Gedung: </label>
											<select name="pemilik_gedung"  class="form-control">
												<?php foreach ($user as $u):?>
													<option value="<?= $u['user_id']; ?>"><?= $u['user_nama']; ?></option>
												<?php endforeach; ?>
											</select>
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
									<div class="col-sm-12">
										<div class="form-group">
											<label>Foto Cover: </label>
											<input type="file" name="filefoto[]" multiple="" class="dropzone dropzone-area form-control" id="dpz-single-file">
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
					<form action="<?= base_url();?>backend/gedung/update_gedung" method="POST" enctype="multipart/form-data">
						<div class="modal-body">


							<div class="row">
								<div class="card-body">

									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Gedung Kode: </label>
												<input type="text" name="gedung_kode" value="<?= $i['gedung_kode']; ?>" class="form-control" readonly>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Pemilik Gedung: </label>
												<select name="pemilik_gedung"  class="form-control">
													<?php foreach ($user as $u):?>
														<option value="<?= $u['user_id']; ?>" <?php if($u['user_id']==$i['user_id']){echo "selected";}else{}?>><?= $u['user_nama']; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Nama Gedung: </label>
												<input type="text" placeholder="Nama Gedung" name="gedung_nama" value="<?= $i['gedung_nama']; ?>" class="form-control">
											</div>
										</div>
									</div>


									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Harga: </label>
												<input type="number" placeholder="Harga Gedung" name="gedung_harga" value="<?= $i['gedung_sewa']; ?>" class="form-control harga">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Kapasitas Tamu: </label>
												<input type="text" placeholder="Kapasitas Tamu" name="kapasitas_tamu" value="<?= $i['gedung_kapasitas']; ?>"  class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Kapasitas Parkir: </label>
												<input type="text" placeholder="Kapasitas Parkir" name="kapasitas_parkir"  value="<?= $i['gedung_parkir']; ?>"  class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Jenis Gedung: </label>
												<select name="jenis_gedung" class="form-control">
													<option value="pendidikan" <?php if($i['gedung_jenis']=='pendidikan') {echo "selected";} else {}?>>Gedung Pendidikan</option>
													<option value="instansi" <?php if($i['gedung_jenis']=='instansi') {echo "selected";} else {}?>>Gedung Instansi / Pemerintah</option>
													<option value="ballroom" <?php if($i['gedung_jenis']=='ballroom') {echo "selected";} else {}?>>Ballroom Hotel</option>
													<option value="serbaguna" <?php if($i['gedung_jenis']=='serbaguna') {echo "selected";} else {}?>>Gedung Serbaguna</option>
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
																<input type="checkbox" id="<?= $kk; ?>" name="fasilitas[]" value="<?= $kk; ?>"  <?php if (in_array($kk, $gfasis)){  echo "checked";}?>>
																<label for="<?= $kk; ?>"><?= $fasi[$kk]; ?></label>
															</fieldset>
														<?php } ?>
													</div>
													<div class="col-md-4 col-sm-12">
														<?php
														for($kk=12; $kk<=21; $kk++) { ?>
															<fieldset>
																<input type="checkbox" id="<?= $kk; ?>" name="fasilitas[]" value="<?= $kk; ?>"  <?php if (in_array($kk, $gfasis)){  echo "checked";}?>>
																<label for="<?= $kk; ?>"><?= $fasi[$kk]; ?></label>
															</fieldset>
														<?php } ?>

													</div>

													<div class="col-md-4 col-sm-12">
														<?php
														for($kk=22; $kk<=31; $kk++) { ?>
															<fieldset>
																<input type="checkbox" id="<?= $kk; ?>" name="fasilitas[]" value="<?= $kk; ?>"  <?php if (in_array($kk, $gfasis)){  echo "checked";}?>>
																<label for="<?= $kk; ?>"><?= $fasi[$kk]; ?></label>
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
												<input type="hidden" name="numkor">
												<input type="text" class="inputAddress input-xxlarge form-control" value="<?= $i['gedung_alamat']; ?>" name="inputAddress" autocomplete="off" placeholder="Type in your address">
											</div>  
										</div>  
									</div>  


									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Latitude</label>
												<input type="text" class="latitude form-control" value="latitude" readonly name="latitude" >
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Longitude</label>
												<input type="text" class="longitude form-control" value="longitude" readonly name="longitude">
											</div>
										</div>
									</div>


									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Deskripsi: </label>
												<textarea name="gedung_deskripsi" class="form-control"><?= $i['gedung_deskripsi']; ?></textarea>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Foto Cover: </label>
												<input type="file" name="filefoto[]" multiple="" class="dropzone dropzone-area form-control" id="dpz-single-file">
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
					<form action="<?= base_url();?>backend/gedung/delete_gedung" method="POST">
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



	<?php endforeach; ?>




