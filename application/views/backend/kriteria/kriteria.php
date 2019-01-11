
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2">
				<h3 class="content-header-title mb-0">Data Kriteria</h3>
			</div>
		</div>
		<div class="content-body">
			
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">
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
													<th>Kode</th>
													<th>Nama Kriteria</th>
													<th>Attribute</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($kriteria as $i)  : ?>
													<tr>
														<td><?php echo $i['kriteria_kode'];?></td>
														<td><?php echo $i['kriteria_nama'];?></td>
														<td><?php echo $i['kriteria_attribute'];?></td>
														<td class=" text-center">
															<div class="btn-group mr-1 mb-1">
																<button type="button" class="btn btn-icon btn-pink dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-info"></i></button>
																<div class="dropdown-menu">
																	<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalEdit<?php echo $i['kriteria_kode']; ?>">Edit</a>
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
						<h3 class="modal-title" id="myModalLabel34">Tambah User</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?php echo base_url()?>BackendC/save_user" method="POST">
						<div class="modal-body">

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Username: </label>
										<input type="text" placeholder="Username" name="username" class="form-control">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Nama: </label>
										<input type="text" placeholder="Nama" name="nama" class="form-control">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Password: </label>
										<input type="password" placeholder="Password" name="password" class="form-control">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Re-Password: </label>
										<input type="password" placeholder="Repassword" name="repassword" class="form-control">
									</div>									

								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Email: </label>
										<input type="email" placeholder="Email Address" name="email" class="form-control">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Jenis Kelamin: </label><br>
										<input type="checkbox" name="jk" class="switch" data-on-label="Male" data-off-label="Female" id="switch12" checked />
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Telepon: </label>
										<input type="tel" name="tel" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Role: </label>
										<select name="role" class="form-control">
											<option value="admin">Admin</option>
											<option value="customer">Customer</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Alamat: </label>
										<textarea name="alamat" class="form-control"></textarea>
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
		
		<?php foreach ($kriteria as $i)  : ?>
			<div class="modal fade text-left" id="modalEdit<?php echo $i['kriteria_kode']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="myModalLabel34">Edit User</h3>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="<?php echo base_url()?>backend/kriteria/edit_kriteria" method="POST">
							<div class="modal-body">

								<div class="col-md-12">
									<div class="form-group">
										<label>Kode: </label>
										<input type="text" placeholder="Username" name="kriteria_kode" class="form-control" value="<?php echo $i['kriteria_kode']; ?>" readonly="readonly">
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label>Nama Kriteria: </label>
										<input type="text" placeholder="Nama" name="kriteria_nama" value="<?php echo $i['kriteria_nama']; ?>" class="form-control">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Attribute: </label>
										<select name="kriteria_attribute" class="form-control">
											<option value="benefit" <?php if($i['kriteria_attribute']=='benefit'){echo "selected";} else {}?>>Benefit</option>
											<option value="cost" <?php if($i['kriteria_attribute']=='cost'){echo "selected";} else {}?>>Cost</option>
										</select>
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
		?>

