<!--     <div class="app-content content">
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
    										$gc= $this->db->query("SELECT * from alternatif")->result_array();
                                            $dbobot=array();
                                            $no=0;
                                            foreach ($gc as $cc):
                                             $no++;
                                             ?>
                                             <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $cc['alternatif_nama']; ?></td>
                                                <?php
                                                $de= $this->db->query("SELECT * from nilai where alternatif_kode = '$cc[alternatif_kode]'")->result_array();
                                                foreach ($de as $cdd):
                                                    $ef= $this->db->query("SELECT max(nilai_nilai) as maxNilaiK  from nilai where kriteria_kode = '$cdd[kriteria_kode]'")->row_array();
                                                    $Mnormal = $cdd['nilai_nilai'] / $ef['maxNilaiK']

                                                    ?>
                                                    <td><?= $Mnormal; ?></td>

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
  /* versi lambat
                                    for ($i=0;$i<count($kriteria);$i++)
                                    {
                                        $maxKepentingan[$i] = 0;
                                        for ($j=0;$j<count($alternatif);$j++)
                                        {

                                            if ($j == 0) 
                                            { 
                                                $maxKepentingan[$i] = $alternatifkriteria[$j][$i];
                                            }
                                            else 
                                            {
                                                if ($maxKepentingan[$i] < $alternatifkriteria[$j][$i])
                                                {
                                                    $maxKepentingan[$i] = $alternatifkriteria[$j][$i];
                                                }
                                            }
                                        }
                                    }*/
                                -->




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




                                                                    <?php


                                                                    function showt($gdarray)
                                                                    {
                                                                        echo '<div class="table table-responsive">';
                                                                        echo '<table  class="table">';
                                                                        for ($i=0;$i<count($gdarray);$i++)
                                                                        {
                                                                            echo '<tr>';
                                                                            for ($j=0;$j<count($gdarray[$i]);$j++)
                                                                            {
                                                                                echo '<td>'.$gdarray[$i][$j].'</td>';
                                                                            }
                                                                            echo '</tr>';
                                                                        }
                                                                        echo '</table>';
                                                                        echo '</div>';
                                                                    }

                                                                    function showb($gdarray)
                                                                    {
                                                                        echo '<div class="table table-responsive">';
                                                                        echo '<table class="table table-bordered">';
                                                                        echo '<tr>';
                                                                        for ($i=0;$i<count($gdarray);$i++)
                                                                        {
                                                                            echo '<td>'.$gdarray[$i].'</td>';
                                                                        }
                                                                        echo "</tr>";
                                                                        echo '</table>';
                                                                        echo '</div>';
                                                                    }

                                                                    function showk($gdarray)
                                                                    {
                                                                        echo '<div class="table table-responsive">';
                                                                        echo '<table class="table">';
                                                                        for ($i=0;$i<count($gdarray);$i++)
                                                                        {
                                                                            echo '<tr>';
                                                                            echo '<td>'.$gdarray[$i].'</td>';
                                                                            echo "</tr>";
                                                                        }
                                                                        echo '</table>';
                                                                        echo '</div>';
                                                                    }


                                                                    $sumBobot = $this->db->query('SELECT sum(kriteria_bobot) as sumbot FROM kriteria')->row_array();
                                                                    $cAlter = $this->db->query('SELECT count(*) as cAlternatif FROM alternatif')->row_array();

                                                                    $alternatif = array(); 

                                                                    $i=0;
                                                                    $galternatif = $this->db->query('SELECT * FROM alternatif');
                                                                    foreach ($galternatif->result_array()  as $dataalternatif) :
                                                                        $alternatif[$i] = $dataalternatif['alternatif_nama'];
                                                                        $i++;
                                                                    endforeach;

                                                                    $kriteria = array(); 

                                                                    $kriteria_attribute = array();

                                                                    $kriteria_bobot = array(); 

                                                                    $i=0;
                                                                    $gkriteria = $this->db->query('SELECT * FROM kriteria');
                                                                    foreach ($gkriteria->result_array()  as $datakriteria) :

                                                                        $kriteria[$i] = $datakriteria['kriteria_nama'];
                                                                        $kriteria_attribute[$i] = $datakriteria['kriteria_attribute'];
                                                                        $kriteria_bobot[$i] = $datakriteria['kriteria_bobot'];
                                                                        $i++;
                                                                    endforeach;



                                                                    $alternatifkriteria = array();

                                                                    $i=0;
                                                                    foreach ($galternatif->result_array()  as $dataalternatif) :
                                                                        $dataalternatif1=$dataalternatif['alternatif_kode'];
                                                                        $j=0;
                                                                        foreach ($gkriteria->result_array()  as $datakriteria) :
                                                                            $datakriteria1=$datakriteria['kriteria_kode'];
                                                                            $queryalternatifkriteria=   $this->db->query("SELECT * FROM nilai WHERE alternatif_kode ='$dataalternatif1' AND kriteria_kode = '$datakriteria1'");

                                                                            $dataalterkriteria=$queryalternatifkriteria->row_array() ;


                                                                            $alternatifkriteria[$i][$j] = $dataalterkriteria['nilai_nilai'];
                                                                            $j++;
                                                                        endforeach;
                                                                        $i++;
                                                                    endforeach;



                                                                    $bobotAwal = array();

                                                                    for ($i=0;$i<count($kriteria);$i++)
                                                                    {
                                                                        $bobotAwal[$i] = 0;
                                                                        for ($j=0;$j<count($alternatif);$j++)
                                                                        {
                                                                            $bobotAwal[$i] = $kriteria_bobot[$i]/$sumBobot['sumbot'];
                                                                        }
                                                                    }




                                                                    $maxKepentingan = array();

                                                                    for ($i=0;$i<count($kriteria);$i++)
                                                                    {
                                                                        $maxKepentingan[$i] = 0;
                                                                        for ($j=0;$j<count($alternatif);$j++)
                                                                        {
                                                                            $maxKepentingan[$i] = max($maxKepentingan[$i], $alternatifkriteria[$j][$i]);
                                                                        }
                                                                    }




                                                                    $normalisasi = array();

                                                                    for ($i=0;$i<count($alternatif);$i++)
                                                                    {
                                                                        for ($j=0;$j<count($kriteria);$j++)
                                                                        {
                                                                            $normalisasi[$i][$j] = $alternatifkriteria[$i][$j] / $maxKepentingan[$j];
                                                                        }
                                                                    }


                                                                    $sumNormal = array();
                                                                    for ($i=0;$i<count($kriteria);$i++)
                                                                    {
                                                                        $sumNormal[$i] = 0;
                                                                        for ($j=0;$j<count($alternatif);$j++)
                                                                        {
                                                                            $sumNormal[$i] += $normalisasi[$j][$i];
                                                                           // print_r($sumNormal); 
                                                                        }
                                                                    }


                                                                    $probabilitas = array();

                                                                    for ($i=0;$i<count($alternatif);$i++)
                                                                    {
                                                                        for ($j=0;$j<count($kriteria);$j++)
                                                                        {
                                                                            $probabilitas[$i][$j] = $normalisasi[$i][$j] / $sumNormal[$j];
                                                                        }
                                                                    }



                                                                    $fiMax = array();

                                                                    for ($i=0;$i<count($kriteria);$i++)
                                                                    {
                                                                        $fiMax[$i] = 0;
                                                                        for ($j=0;$j<count($alternatif);$j++)
                                                                        {
                                                                            $fiMax[$i] = max($fiMax[$i], $normalisasi[$j][$i]);
                                                                        }
                                                                    }

                                                                    $fiMin = array();

                                                                    for ($i=0;$i<count($kriteria);$i++)
                                                                    {
                                                                        $fiMin[$i] = 99999;
                                                                        for ($j=0;$j<count($alternatif);$j++)
                                                                        {
                                                                            $fiMin[$i] = min($fiMin[$i], $normalisasi[$j][$i]);
                                                                        }
                                                                    }



//(-1/log(jumlah(alternatif))) * ((probabilitas*Log(probabilitas)+probabilitas*Log(probabilitas)))

                                                                    $nEntropy = array();

                                                                    for ($i=0;$i<count($kriteria);$i++)
                                                                    {
                                                                        for ($j=0;$j<count($alternatif);$j++)
                                                                        {

                                                                         //   $nEntropy[$j][$i] = ($probabilitas[$j][$i]);

                                                                         $nEntropy[$j][$i] = ((-1/log(7)) * ($probabilitas[$j][$i]*log($probabilitas[$i])) + ($probabilitas[$j][$i]*log($probabilitas[$i])) + ($probabilitas[$j][$i]*log($probabilitas[$i])) + ($probabilitas[$j][$i]*log($probabilitas[$i])) + ($probabilitas[$j][$i]*log($probabilitas[$i])) + ($probabilitas[$j][$i]*log($probabilitas[$i])) + ($probabilitas[$j][$i]*log($probabilitas[$i])));
                                                                      }
                                                                  }

/*(-1/log(7)) * ((0,217391304*log(0,217391304))+(0,086956522*log(0,086956522))+(0,043478261*log(0,043478261))+(0,086956522*log(0,086956522))+(0,217391304*log(0,217391304))+(0,173913043*log(0,173913043))+(0,173913043*log(0,173913043)))

(-1/log(7)) * ((0,043478261*log(0,043478261))+(0,173913043*log(0,173913043))+(0,173913043*log(0,173913043))+(0,173913043*log(0,173913043))+(0,173913043*log(0,173913043))+(0,173913043*log(0,173913043))+(0,086956522*log(0,086956522)))

(-1/log(7)) * ((0,238095238*log(0,238095238))+(0,095238095*log(0,095238095))+(0,095238095*log(0,095238095))+(0,19047619*log(0,19047619))+(0,19047619*log(0,19047619))+(0,095238095*log(0,095238095))+(0,095238095*log(0,095238095)))

(-1/log(7)) * ((0,071428571*log(0,071428571))+(0,178571429*log(0,178571429))+(0,178571429*log(0,178571429))+(0,178571429*log(0,178571429))+(0,035714286*log(0,035714286))+(0,178571429*log(0,178571429))+(0,178571429*log(0,178571429)))

(-1/log(7)) * ((0,058823529*log(0,058823529))+(0,235294118*log(0,235294118))+(0,117647059*log(0,117647059))+(0,235294118*log(0,235294118))+(0,117647059*log(0,117647059))+(0,117647059*log(0,117647059))+(0,117647059*log(0,117647059)))

(-1/log(7)) * ((0,208333333*log(0,208333333))+(0,166666667*log(0,166666667))+(0,166666667*log(0,166666667))+(0,083333333*log(0,083333333))+(0,166666667*log(0,166666667))+(0,166666667*log(0,166666667))+(0,041666667*log(0,041666667)))*/




                                                                   // print_r($probabilitas);

                                                                            //$nEntropy[$i] = (-1/log($cAlter['cAlternatif']));

                                                                   // showb($nEntropy); 
showt($nEntropy);








$solusi = array();

for ($i=0;$i<count($alternatif);$i++)
{
    for ($j=0;$j<count($kriteria);$j++)
    {
        $solusi[$i][$j] = $probabilitas[$i][$j]*(($fiMax[$j]-$normalisasi[$i][$j])/($fiMax[$j]-$fiMin[$j]));

                                                                            /*
                                                                            $solusi[$i][$j] = $probabilitas[$i][$j]*(($fiMax[$j]-$normalisasi[$i][$j])/($fiMax[$j]-$fiMin[$j]));*/
                                                                        }
                                                                    }

                                                                    //probabilitas * (fiMax-Normal)/(fiMax-fiMin)


                                                                    showt($solusi);



                                                                    $setMatriks = array();
                                                                    $a=0;
                                                                    $talternatif = $this->db->query('SELECT * FROM alternatif');
                                                                    $tkriteria = $this->db->query('SELECT * FROM kriteria');
                                                                    foreach ($talternatif->result() as $baris) {
                                                                        $b=0;
                                                                        foreach ($tkriteria->result() as $kolom) {
                                                                            $tnilai = $this->db->query("SELECT * FROM nilai WHERE kriteria_kode = '$kolom->kriteria_kode'")->row()->nilai_nilai;
                                                                            $setMatriks[$a][$b] = $tnilai;
                                                                            $b++;
                                                                        }
                                                                        $a++;
                                                                    }











                                                                    $matriksKuadrat = array();
                                                                    $c=0;
                                                                    foreach ($talternatif->result() as $baris) {
                                                                        $d=0;
                                                                        foreach ($tkriteria->result() as $kolom) {
                                                                            $tnilai = $this->db->query("SELECT * FROM nilai WHERE kriteria_kode = '$kolom->kriteria_kode'")->row()->nilai_nilai;
                                                                            $matriksKuadrat[$c][$d] = pow($tnilai, 2);
                                                                            $d++;
                                                                        }
                                                                        $c++;
                                                                    }

                                   // print json_encode($matriksKuadrat); 


                                                                    $jumlahBarisMatriks = array();
                                                                    $e=0;
                                                                    foreach ($talternatif->result() as $row) {
                                                                        $f=0;
                                                                        $jumlah = 0;
                                                                        foreach ($tkriteria->result() as $column) {
                                                                            $jumlah = $jumlah + $matriksKuadrat[$e][$f];
                                                                            $f++;
                                                                        }

                                                                        $jumlahBarisMatriks[] = $jumlah;
                                                                        $e++;
                                                                    }

                                                                    $akarMatriks = array();
                                                                    for ($g=0; $g < count($jumlahBarisMatriks) ; $g++) { 
                                                                        $akarMatriks[$g] = round(sqrt($jumlahBarisMatriks[$g]),3);
                                                                    }

                                                                    $normalisasi = array();
                                                                    for ($h=0; $h < $talternatif->num_rows() ; $h++) { 
                                                                        for ($i=0; $i < $tkriteria->num_rows() ; $i++) { 
                                                                            $normalisasi[$h][$i] = round($setMatriks[$h][$i]/$akarMatriks[$h],3);  
                                                                        }
                                                                    }   
                                                                    $nilaiBobot = array();
                                                                    $j=0;
                                                                    foreach ($talternatif->result() as $baris) {
                                                                        $k=0;
                                                                        foreach ($tkriteria->result() as $kolom) {
                                                                            $tnilai = $this->db->query("SELECT * FROM nilai WHERE kriteria_kode = '$kolom->kriteria_kode'")->row()->nilai_nilai;
                                                                            $bobot = $this->db->query("SELECT * FROM kriteria WHERE kriteria_kode = '$kolom->kriteria_kode'")->row()->kriteria_bobot;
                                                                            $nilaiBobot[$j][$k] = round($normalisasi[$j][$k] * $bobot , 3);
                                                                            $k++;
                                                                        }
                                                                        $j++;
                                                                    }


                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>