<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <div class="row">
                <div class="col-xl-6 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-danger bg-darken-2">
                                    <i class="fa fa-building font-large-2 white"></i>
                                </div>
                                <div class="p-2 bg-gradient-x-danger white media-body">
                                    <h5>Gedung</h5>
                                    <h5 class="text-bold-400 mb-0"><i class="ft-plus"></i> 28</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-primary bg-darken-2">
                                    <i class="fa fa-user font-large-2 white"></i>
                                </div>
                                <div class="p-2 bg-gradient-x-primary white media-body">
                                    <h5>Pemilik Gedung</h5>
                                    <h5 class="text-bold-400 mb-0"><i class="ft-plus"></i> 28</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <a class="btn btn-primary" href="<?= base_url();?>admin/rumus" >Detail Rumus</a></h4>
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
                                $cAlter = $this->db->query('SELECT count(*) as cAlternatif FROM gedung')->row_array();

                                $alternatif = array(); 

                                $i=0;
                                $galternatif = $this->db->query('SELECT * FROM gedung');
                                foreach ($galternatif->result_array()  as $dataalternatif) :
                                    $alternatif[$i] = $dataalternatif['gedung_kode'];
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
                                    $dataalternatif1=$dataalternatif['gedung_kode'];
                                    $j=0;
                                    foreach ($gkriteria->result_array()  as $datakriteria) :
                                        $datakriteria1=$datakriteria['kriteria_kode'];
                                        $queryalternatifkriteria=   $this->db->query("SELECT * FROM nilai WHERE gedung_kode ='$dataalternatif1' AND kriteria_kode = '$datakriteria1'");

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




                                $alternatif_count = count($probabilitas[0]);

                                for($j=0; $j<$alternatif_count; $j++){
                                    $col_arr[] = array_column($probabilitas, $j);
                                }

                                $entropy_arr = array();
                                foreach($col_arr as $col){
                                    $calc = 0;
                                    foreach($col as $prob){
                                        $calc += $prob * log($prob);
                                        $entropy = ((-1)/log(count($alternatif))) * $calc;
                                    }
                                    array_push($entropy_arr, $entropy);
                                }


                                $divergence = array();
                                for ($i=0;$i<count($kriteria);$i++)
                                {
                                    $divergence[$i] = (1-$entropy_arr[$i]);
                                }

                                $sumDiv = array_sum($divergence);


                                $lamda = array();
                                for ($i=0;$i<count($kriteria);$i++)
                                {
                                    $lamda[$i] = $divergence[$i]/$sumDiv;
                                }

                                $lamdaXbobotA = array();
                                for ($i=0;$i<count($kriteria);$i++)
                                {
                                    $lamdaXbobotA[$i] = $lamda[$i]*$bobotAwal[$i];
                                }


                                $sumLamdaXbobotA = array_sum($lamdaXbobotA);


                                $bobotEntropy = array();
                                for ($i=0;$i<count($kriteria);$i++)
                                {
                                    $bobotEntropy[$i] = $lamdaXbobotA[$i]/$sumLamdaXbobotA;
                                }

                                $solusi = array();
                                for ($i=0;$i<count($alternatif);$i++)
                                {
                                    for ($j=0;$j<count($kriteria);$j++)
                                    {
                                        $solusi[$i][$j] = $bobotEntropy[$j]*(($fiMax[$j]-$normalisasi[$i][$j])/($fiMax[$j]-$fiMin[$j]));

                                    }
                                }

                                $sj = array();
                                $rj = array();
                                for ($i=0;$i<count($alternatif);$i++)
                                {
                                    $sj[$i] = array_sum($solusi[$i]);
                                    $rj[$i] = max($solusi[$i]);
                                }

                                $sjMin = min($sj);
                                $sjMax = max($sj);
                                $rjMin = min($rj);
                                $rjMax = max($rj);


                                $Qj = array();
                                for ($i=0;$i<count($alternatif);$i++)
                                {
                                    $Qj[$i] = (0.5*(($sj[$i]-$sjMin)/($sjMax-$sjMin))) + ((1-0.5) * (($rj[$i]-$rjMin) / ($rjMax-$rjMin)));
                                }

                                $sql= $this->Mymod->ViewData('gedung');

                                    /*$arrk = array();
                                    foreach ($sql as $key) {
                                        echo $gedung_kode = $key['gedung_kode'];

                                    }
*/

                                    $hasilrangking = array();
                                    $alternatifrangking = array();
                                    for ($i=0;$i<count($alternatif);$i++)
                                    {
                                        $hasilrangking[$i] = $Qj[$i];
                                        $alternatifrangking[$i] = $alternatif[$i];
                                    }


                                    for ($i=0;$i<count($alternatif);$i++)
                                    {
                                        for ($j=$i;$j<count($alternatif);$j++)
                                        {
                                            if ($hasilrangking[$j] < $hasilrangking[$i])
                                            {
                                                $tmphasil = $hasilrangking[$i];
                                                $tmpalternatif = $alternatifrangking[$i];
                                                $hasilrangking[$i] = $hasilrangking[$j];
                                                $alternatifrangking[$i] = $alternatifrangking[$j];
                                                $hasilrangking[$j] = $tmphasil;
                                                $alternatifrangking[$j] = $tmpalternatif;
                                            }
                                        }
                                    }

                                    ?>

                                    <div class="table table-responsive">
                                        <table class="table table-striped table-bordered complex-headers">
                                            <thead>
                                                <tr>
                                                    <td>Rank</td>
                                                    <td>Kode</td>
                                                    <td>Nama Gedung</td>
                                                    <td>Pemilik Gedung</td>
                                                    <td class="text-center">#</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no=0;
                                                for ($i=0;$i<count($alternatifrangking);$i++)
                                                {
                                                    $no++;

                                                    $where = [
                                                        't1.gedung_kode' => $alternatifrangking[$i]
                                                    ];

                                                    $table = [
                                                        'gedung' => 'user_id',
                                                        'user' => 'user_id'
                                                    ];
                                                    $ck = $this->Mymod->getJoinWhere($table,$where)->row_array();
                                                    ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= $alternatifrangking[$i] ?></td>
                                                        <td><?= $ck['gedung_nama'] ?></td>
                                                        <td><?= $ck['user_nama'] ?></td>
                                                        <td class="text-center"><a href="<?= base_url();?>admin/gedung/detail/<?= $ck['gedung_kode'] ?>" class="btn btn-primary">Detail</a></td>
                                                    </tr>
                                                <?php } ?>
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

