
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2">
				<h3 class="content-header-title mb-0">Data Sub-Kriteria</h3>
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
										<table class="table table-striped table-bordered complex-headers">
											<thead>
												<tr>
													<th>Nama Kriteria</th>
													<th>Klasifikasi</th>
													<th>Range</th>
													<th>Nilai Kepentingan</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($sub as $i)  : ?>
													<tr>
														<td><?php echo $i['kriteria_nama'];?></td>
														<td><?php echo $i['sk_klasifikasi'];?></td>
														<td><?php echo $i['sk_range'];?></td>
														<td><?php echo $i['sk_nilai'];?></td>
														<td class=" text-center">
															<div class="btn-group mr-1 mb-1">
																<button type="button" class="btn btn-icon btn-pink dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-info"></i></button>
																<div class="dropdown-menu">
																	<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalEdit<?php echo $i['sk_id']; ?>">Edit</a>
																	<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalHapus<?php echo $i['sk_id']; ?>">Hapus</a>
																</div>
															</div>
														</td>
													</tr>
												<?php endforeach; ?>
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
						<h3 class="modal-title" id="myModalLabel34">Tambah Sub-Kriteria</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?php echo base_url()?>backend/Kriteria/save_subkrit" method="POST">
						<div class="modal-body">

							<div class="form-group">
								<label>Kriteria : </label>
								<select name="kriteria_kode" class="form-control">
									<?php foreach($kriteria as $krit) :?>
										<option value="<?= $krit['kriteria_kode']; ?>"><?= $krit['kriteria_nama']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Klasifikasi: </label>
								<input type="text" placeholder="Klasifikasi" name="sk_klasifikasi" class="form-control">
							</div>

							<div class="form-group">
								<label>Range: </label>
								<input type="text" placeholder="Range" name="sk_range" class="form-control">
							</div>
							<div class="form-group">
								<label>Nilai Kepentingan: </label>
								<input type="text" placeholder="Nilai Kepentingan" name="sk_nilai" class="form-control">
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

		<?php foreach ($sub as $i)  : ?>
			<div class="modal fade text-left" id="modalEdit<?php echo $i['sk_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="myModalLabel34">Edit Sub-Kriteria</h3>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="<?php echo base_url()?>backend/Kriteria/edit_subkrit" method="POST">
							<div class="modal-body">

								<div class="form-group">
									<label>Kriteria: </label>
									<input type="hidden" name="sk_id" value="<?php echo $i['sk_id']; ?>" class="form-control">
									<select name="kriteria_kode" class="form-control">
										<?php foreach($kriteria as $krit): ?>
											<option value="<?= $krit['kriteria_kode']; ?>" <?php if($i['kriteria_kode']==$krit['kriteria_kode']) { echo  "selected"; } else {} ?>><?= $krit['kriteria_nama']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group">
									<label>Klasifikasi: </label>
									<input type="text" placeholder="Klasifikasi" name="sk_klasifikasi" value="<?php echo $i['sk_klasifikasi']; ?>" class="form-control">
								</div>


								<div class="form-group">
									<label>Range: </label>
									<input type="text" placeholder="Range" name="sk_range" value="<?php echo $i['sk_range']; ?>" class="form-control">
								</div>

								<div class="form-group">
									<label>Nilai Kepentingan: </label><br>
									<input type="text" placeholder="Nilai Kepentingan" name="sk_nilai" value="<?php echo $i['sk_nilai']; ?>" class="form-control">
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
		foreach ($sub as $i)  : 
			?>

			<div class="modal fade text-left" id="modalHapus<?php echo $i['sk_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="myModalLabel34">Konfirmasi</h3>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="<?php echo base_url()?>BackendC/delete_Kriteria" method="POST">
							<div class="modal-body bg-red">

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="hidden" name="sk_id" value="<?php echo $i['sk_id'];?>">
											<label class="text-center text-white">Anda yakin ingin menghapus Sub-Kriteria <b><?php echo $i['sk_klasifikasi']; ?></b> ?</label>
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
