<?php
class Pencarian extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Mymod');
	}

	public function index()
	{
		$y['title']='Pencarian';
		$jharga=[
			'kriteria' => 'kriteria_kode',
			'sub_kriteria' => 'kriteria_kode'
		];
		$wharga=[
			't1.kriteria_kode'=>'C1',
		];

		$jkapasitas=[
			'kriteria' => 'kriteria_kode',
			'sub_kriteria' => 'kriteria_kode'
		];
		$wkapasitas=[
			't1.kriteria_kode'=>'C2',
		];

		$jparkir=[
			'kriteria' => 'kriteria_kode',
			'sub_kriteria' => 'kriteria_kode'
		];
		$wparkir=[
			't1.kriteria_kode'=>'C3',
		];

		$jjenis=[
			'kriteria' => 'kriteria_kode',
			'sub_kriteria' => 'kriteria_kode'
		];
		$wjenis=[
			't1.kriteria_kode'=>'C4',
		];

		$jfasilitas=[
			'kriteria' => 'kriteria_kode',
			'sub_kriteria' => 'kriteria_kode'
		];
		$wfasilitas=[
			't1.kriteria_kode'=>'C5',
		];


		$jjarak=[
			'kriteria' => 'kriteria_kode',
			'sub_kriteria' => 'kriteria_kode'
		];
		$wjarak=[
			't1.kriteria_kode'=>'C6',
		];


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

		$this->load->library('pagination');
		$config['base_url'] = base_url().'pencarian';
		$config['total_rows'] = count($alternatif);
		$config['per_page'] = 3;
		$from = $this->uri->segment(2);

		$config['query_string_segment'] = 'start';

		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';		

		$this->pagination->initialize($config);


		$x['maxAl'] = $config['per_page'];
		$x['from'] = $from;
		$x['hasil'] = array_slice($alternatifrangking, $from, $config['per_page']);
		$x['harga'] = $this->Mymod->getJoinWhere($jharga,$wharga)->result_array();
		$x['kapasitas'] = $this->Mymod->getJoinWhere($jkapasitas,$wkapasitas)->result_array();
		$x['parkir'] = $this->Mymod->getJoinWhere($jparkir,$wparkir)->result_array();
		$x['jenis'] = $this->Mymod->getJoinWhere($jjenis,$wjenis)->result_array();
		$x['fasilitas'] = $this->Mymod->getJoinWhere($jfasilitas,$wfasilitas)->result_array();
		$x['jarak'] = $this->Mymod->getJoinWhere($jjarak,$wjarak)->result_array();

		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/gedung/pencarian',$x);
		$this->load->view('frontend/layout/footer');
	}

	public function cari()
	{
		$harga = $this->input->post('harga');
		$kapasitas = $this->input->post('kapasitas');
		$parkir = $this->input->post('parkir');
		$jenis = $this->input->post('jenis');
		$fasilitas = $this->input->post('fasilitas');
		$jarak = $this->input->post('jarak');
		$latitude = $this->input->post('latitude');
		$longitude = $this->input->post('longitude');

		function rad($x){ return $x * M_PI / 180; }
		function distHaversine($coord_a, $coord_b){
			$R = 6371;
			$coord_a = explode(",",$coord_a);
			$coord_b = explode(",",$coord_b);
			$dLat = rad(($coord_b[0]) - ($coord_a[0]));
			$dLong = rad($coord_b[1] - $coord_a[1]);
			$a = sin($dLat/2) * sin($dLat/2) + cos(rad($coord_a[0])) * cos(rad($coord_b[0])) * sin($dLong/2) * sin($dLong/2);
			$c = 2 * atan2(sqrt($a), sqrt(1-$a));
			$d = $R * $c;
			return number_format($d, 0, '.', ',');
		}

		$sql= $this->Mymod->ViewData('gedung');
		$arr = array();
		$kk=0;
		foreach($sql as $i):
			$a = $latitude.",".$longitude;
			$b = $i['gedung_lat'].",".$i['gedung_long'];
			$arr[$kk] = distHaversine($a, $b);

			$kk++;
		endforeach;

		$ar = array();
		for($j=0; $j<count($arr); $j++){
			if($arr[$j] > 10){
				$ar[$j] = 1;
			} else if ($arr[$j] > 6 && $arr[$j] <=10) {
				$ar[$j] = 2;
			}
			else if ($arr[$j] > 2 && $arr[$j] <=6) {
				$ar[$j] = 4;
			}
			else if ($arr[$j] <= 2) {
				$ar[$j] = 5;
			}
		}

		$arrBobot = [$harga,$kapasitas,$parkir,$jenis,$fasilitas,$jarak];
		$kridata = ['C1','C2','C3','C4','C5','C6'];

		for($i=0; $i <6; $i++)
		{
			$dataDetail =[ 
				'kriteria_bobot'=>$arrBobot[$i],
			];

			$where =[ 
				'kriteria_kode'=>$kridata[$i],
			];

			$this->Mymod->UpdateData('kriteria',$dataDetail,$where);
		}

		$whereN = [
			'kriteria_kode' => 'C6'
		];
		$arrNilai = array(); 
		$M=0;
		$gNilai = $this->Mymod->ViewDataWhere('nilai',$whereN);
		foreach ($gNilai as $NilaiN) :
			$arrNilai[$M] = $NilaiN['gedung_kode'];
			$M++;
		endforeach;

		for($j=0; $j<count($ar); $j++){
			$dnilai =[ 
				'nilai_nilai'=>$ar[$j],
			];
			$wnilai =[ 
				'gedung_kode'=>$arrNilai[$j],
				'kriteria_kode'=>'C6',
			];
			$this->Mymod->UpdateData('nilai',$dnilai,$wnilai);
		}

		
		$title = 'Pencarian';
		$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
		redirect('pencarian');	
	}

}


?>