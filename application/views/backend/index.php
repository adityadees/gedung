<!-- <div class="app-content content">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>          

    </div>
</div>
</div>
-->

<?php
//old 
/*
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
}
*/
?>


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



                                  /*  print_r(array_reduce($probabilitas, function ($newArr, $item) {
                                        $sumOfProducts = 0;
                                        foreach ($item as $k => $v) {
                                            $sumOfProducts += $v * $v;
                                        }
                                        $newArr[] = $sumOfProducts;

                                        return $newArr;
                                    }));*/



                                    $nEntropy = array();
                                    for ($i=0;$i<count($kriteria);$i++)
                                    {
                                        for ($j=0;$j<count($alternatif);$j++)
                                        {

                                            $nEntropy[$i] = (((-1)/log(7)) *( 
                                                ($probabilitas[0][0]*log($probabilitas[0][0]))+
                                                ($probabilitas[1][0]*log($probabilitas[1][0]))+
                                                ($probabilitas[2][0]*log($probabilitas[2][0]))+
                                                ($probabilitas[3][0]*log($probabilitas[3][0]))+
                                                ($probabilitas[4][0]*log($probabilitas[4][0]))+
                                                ($probabilitas[5][0]*log($probabilitas[5][0]))+
                                                ($probabilitas[6][0]*log($probabilitas[6][0]))
                                            ));

                                        }
                                    }

                                    $nEntropy1 = array();
                                    for ($i=0;$i<count($kriteria);$i++)
                                    {
                                        for ($j=0;$j<count($alternatif);$j++)
                                        {

                                            $nEntropy1[$i] = (((-1)/log(7)) *( 
                                                ($probabilitas[0][1]*log($probabilitas[0][1]))+
                                                ($probabilitas[1][1]*log($probabilitas[1][1]))+
                                                ($probabilitas[2][1]*log($probabilitas[2][1]))+
                                                ($probabilitas[3][1]*log($probabilitas[3][1]))+
                                                ($probabilitas[4][1]*log($probabilitas[4][1]))+
                                                ($probabilitas[5][1]*log($probabilitas[5][1]))+
                                                ($probabilitas[6][1]*log($probabilitas[6][1]))
                                            ));

                                        }
                                    }


                                    $nEntropy2 = array();
                                    for ($i=0;$i<count($kriteria);$i++)
                                    {
                                        for ($j=0;$j<count($alternatif);$j++)
                                        {

                                            $nEntropy2[$i] = (((-1)/log(7)) *( 
                                                ($probabilitas[0][2]*log($probabilitas[0][2]))+
                                                ($probabilitas[1][2]*log($probabilitas[1][2]))+
                                                ($probabilitas[2][2]*log($probabilitas[2][2]))+
                                                ($probabilitas[3][2]*log($probabilitas[3][2]))+
                                                ($probabilitas[4][2]*log($probabilitas[4][2]))+
                                                ($probabilitas[5][2]*log($probabilitas[5][2]))+
                                                ($probabilitas[6][2]*log($probabilitas[6][2]))
                                            ));

                                        }
                                    }


                                    $nEntropy3 = array();
                                    for ($i=0;$i<count($kriteria);$i++)
                                    {
                                        for ($j=0;$j<count($alternatif);$j++)
                                        {

                                            $nEntropy3[$i] = (((-1)/log(7)) *( 
                                                ($probabilitas[0][3]*log($probabilitas[0][3]))+
                                                ($probabilitas[1][3]*log($probabilitas[1][3]))+
                                                ($probabilitas[2][3]*log($probabilitas[2][3]))+
                                                ($probabilitas[3][3]*log($probabilitas[3][3]))+
                                                ($probabilitas[4][3]*log($probabilitas[4][3]))+
                                                ($probabilitas[5][3]*log($probabilitas[5][3]))+
                                                ($probabilitas[6][3]*log($probabilitas[6][3]))
                                            ));

                                        }
                                    }


                                    $nEntropyy4 = array();
                                    for ($i=0;$i<count($kriteria);$i++)
                                    {
                                        for ($j=0;$j<count($alternatif);$j++)
                                        {

                                            $nEntropy4[$i] = (((-1)/log(7)) *( 
                                                ($probabilitas[0][4]*log($probabilitas[0][4]))+
                                                ($probabilitas[1][4]*log($probabilitas[1][4]))+
                                                ($probabilitas[2][4]*log($probabilitas[2][4]))+
                                                ($probabilitas[3][4]*log($probabilitas[3][4]))+
                                                ($probabilitas[4][4]*log($probabilitas[4][4]))+
                                                ($probabilitas[5][4]*log($probabilitas[5][4]))+
                                                ($probabilitas[6][4]*log($probabilitas[6][4]))
                                            ));

                                        }
                                    }


                                    $nEntropy5 = array();
                                    for ($i=0;$i<count($kriteria);$i++)
                                    {
                                        for ($j=0;$j<count($alternatif);$j++)
                                        {

                                            $nEntropy5[$i] = (((-1)/log(7)) *( 
                                                ($probabilitas[0][5]*log($probabilitas[0][5]))+
                                                ($probabilitas[1][5]*log($probabilitas[1][5]))+
                                                ($probabilitas[2][5]*log($probabilitas[2][5]))+
                                                ($probabilitas[3][5]*log($probabilitas[3][5]))+
                                                ($probabilitas[4][5]*log($probabilitas[4][5]))+
                                                ($probabilitas[5][5]*log($probabilitas[5][5]))+
                                                ($probabilitas[6][5]*log($probabilitas[6][5]))
                                            ));

                                        }
                                    }



                                    showb($nEntropy);
                                    showb($nEntropy1);
                                    showb($nEntropy2);
                                    showb($nEntropy3);
                                    showb($nEntropy4);
                                    showb($nEntropy5);





// print_r($probabilitas);

        //$nEntropy[$i] = (-1/log($cAlter['cAlternatif']));

// showb($nEntropy); 








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