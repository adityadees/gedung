    <div class="app-content content">
    	<div class="content-wrapper">
    		<div class="content-header row">
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

    									<table class="table table-bordered">
    										<tr>
    											<th>No</th>
    											<th>Alternatif</th>
    											<?php 
    											$dd = $this->Mymod->ViewData('kriteria'); 
    											foreach($dd as $i):
    												?>
    												<th><?= $i['kriteria_nama']; ?></th>
    											<?php endforeach; ?>
    										</tr>

    										<?php
// $gc= $this->db->query("SELECT * from nilai GROUP by alternatif_kode,kriteria_kode")->result_array();
    										$gc= $this->db->query("SELECT * from alternatif")->result_array();

    										foreach ($gc as $cc):
    											?>
    											<tr>
    												<td>a</td>
    												<td><?= $cc['alternatif_nama']; ?></td>
    												<?php
    												$de= $this->db->query("SELECT * from nilai where alternatif_kode = '$cc[alternatif_kode]'")->result_array();
    												foreach ($de as $cdd):
    													?>
    													<td><?= $cdd['nilai_nilai']; ?></td>
    												<?php endforeach; ?>
    											</tr>
    										<?php endforeach; ?>
    									</table>	



    									<table class="table table-bordered">
    										<tr>
    											<th>No</th>
    											<th>Alternatif</th>
    											<?php 
    											$dd = $this->Mymod->ViewData('kriteria'); 
    											foreach($dd as $i):
    												?>
    												<th><?= $i['kriteria_nama']; ?></th>
    											<?php endforeach; ?>
    										</tr>

    										<?php
// $gc= $this->db->query("SELECT * from nilai GROUP by alternatif_kode,kriteria_kode")->result_array();
    										$gc= $this->db->query("SELECT * from alternatif")->result_array();
    										foreach ($gc as $cc):
    											?>
    											<tr>
    												<td>a</td>
    												<td><?= $cc['alternatif_nama']; ?></td>
    												<?php
    												$de= $this->db->query("SELECT * from nilai where alternatif_kode = '$cc[alternatif_kode]'")->result_array();
    												foreach ($de as $cdd):
    													$ef= $this->db->query("SELECT max(nilai_nilai) as maxNilaiK  from nilai where kriteria_kode = '$cdd[kriteria_kode]'")->row_array();
    													$Mnormal = $cdd['nilai_nilai'] / $ef['maxNilaiK'];
    													?>
    													<td><?= $Mnormal; ?></td>
    												<?php endforeach; ?>
    											</tr>
    										<?php endforeach; ?>
    									</table>	



    									<table class="table table-bordered">
    										<tr>
    											<th>No</th>
    											<th>Alternatif</th>
    											<?php 
    											$dd = $this->Mymod->ViewData('kriteria'); 
    											foreach($dd as $i):
    												?>
    												<th><?= $i['kriteria_nama']; ?></th>
    											<?php endforeach; ?>
    										</tr>

    										<?php
    										$gc= $this->db->query("SELECT * from alternatif")->result_array();
                                            $dbobot=array();
                                            $nana=0;
                                            foreach ($gc as $cc):
                                               $nana++;
                                               ?>
                                               <tr>
                                                <td>a</td>
                                                <td><?= $cc['alternatif_nama']; ?></td>
                                                <?php
                                                $de= $this->db->query("SELECT * from nilai where alternatif_kode = '$cc[alternatif_kode]'")->result_array();
                                                $no=0;
                                                $re=0;
                                                foreach ($de as $cdd):
                                                    $no++;
                                                    $ef= $this->db->query("SELECT max(nilai_nilai) as maxNilaiK  from nilai where kriteria_kode = '$cdd[kriteria_kode]'")->row_array();
                                                    $dbobot = array($Mnormal = $cdd['nilai_nilai'] / $ef['maxNilaiK']);

                                                    ?>
                                                    <td><?= $Mnormal; ?></td>

                                                    <?php
                                                endforeach; ?>
                                            </tr>

                                            <?php 
                                            
                                        endforeach;
                                        ?>
                                    </table>    

<!-- 
                                        <?php
                                        $krt = $this->db->query("SELECT * from kriteria")->result_array();
                                        foreach ($krt as $vkrt) {
                                            $jkriteria = $this->db->query("SELECT * FROM nilai where kriteria_kode='$vkrt[kriteria_kode]'")->result_array();
                                            $no=0;
                                            foreach ($jkriteria as $vjkriteria) {
                                                $no++;
                                                print_r(array($vjkriteria['nilai_nilai']));
                                            }


                                        }
                                        ?> -->


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
