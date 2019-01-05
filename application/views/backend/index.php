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
    										<?php
    										$gc= $this->db->query("SELECT * from alternatif")->result_array();
    										foreach ($gc as $cc):
    											?>
    											<tr>
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
    										<?php
    										$gc= $this->db->query("SELECT * from alternatif")->result_array();
    										foreach ($gc as $cc):
    											?>
    											<tr>
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
    										<?php
                                            $no=0;
                                            $gc= $this->db->query("SELECT * from alternatif")->result_array();
                                            foreach ($gc as $cc):
                                                $no++;
                                                ?>
                                                <tr>
                                                    <?php
                                                    $nom = 0; 
                                                    $de= $this->db->query("SELECT * from nilai where alternatif_kode = '$cc[alternatif_kode]'")->result_array();
                                                    foreach ($de as $cdd):
                                                        $nom++;
                                                        $ef= $this->db->query("SELECT max(nilai_nilai) as maxNilaiK  from nilai where kriteria_kode = '$cdd[kriteria_kode]'")->row_array();

                                                        $arrN[$no][$nom] = array([$Mnormal = $cdd['nilai_nilai'] / $ef['maxNilaiK']]);
                                                        ?>
                                                        <td><?= print_r($arrN[$no][$nom]); ?></td>
                                                        <?php
                                                    endforeach; ?>
                                                </tr>

                                                <?php 

                                            endforeach;
                                            ?>
                                        </table>    

                                        <?php
                                        $cars = array(["Volvo",22,18],["BMW",15,13],["Saab",5,2],["Land Rover",17,15]);

                                        echo $cars[0][0].":".$cars[0][1].":".$cars[0][2].".<br>";
                                        echo $cars[1][0].":".$cars[1][1].":".$cars[1][2].".<br>";
                                        echo $cars[2][0].":".$cars[2][1].":".$cars[2][2].".<br>";
                                        echo $cars[3][0].":".$cars[3][1].":".$cars[3][2].".<br>";

                                        echo array_sum([$cars[0][1],$cars[1][1],$cars[2][1],$cars[3][1]]);

                                        ?>

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
