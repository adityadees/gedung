<?php
class Gedung extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
			$url=base_url('loginadmin');
			redirect($url);
		};
		$this->load->model('Mymod');
	}

	public function index()
	{
		$y['title']='Gedung';
		$x['gedung'] = $this->Mymod->ViewData('gedung');
		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/gedung/gedung',$x);
		$this->load->view('backend/layout/footer');
	}


	public function save_gedung(){
		$gedung_kode = $this->input->post('gedung_kode');
		$gedung_nama = $this->input->post('gedung_nama');
		$gedung_deskripsi = $this->input->post('gedung_deskripsi');
		$gedung_harga = $this->input->post('gedung_harga');
		$gedung_kapasitas = $this->input->post('kapasitas_tamu');
		$gedung_parkir = $this->input->post('kapasitas_parkir');
		$gedung_jenis = $this->input->post('jenis_gedung');
		$fasilitas = $this->input->post('fasilitas');
		$gedung_alamat = $this->input->post('inputAddress');
		$gedung_lat = $this->input->post('latitude');
		$gedung_long = $this->input->post('longitude');
		$countFas = count($fasilitas);

		$jumFas = $countFas / 31; 

		$gedung_fasilitas= implode(", ", $fasilitas);

		if($gedung_harga <= 20000000){
			$bobot_harga = 5;
		} else if($gedung_harga > 20000000 && $gedung_harga <= 50000000){
			$bobot_harga = 4;
		} else  if($gedung_harga > 50000000 && $gedung_harga <= 100000000){
			$bobot_harga = 2;
		} else  if($gedung_harga > 100000000){
			$bobot_harga = 1;
		} else {
			$bobot_harga = '';
		}

		if($gedung_kapasitas <= 300){
			$bobot_tamu = 1;
		} else if($gedung_kapasitas > 300 && $gedung_kapasitas <= 600){
			$bobot_tamu = 2;
		} else  if($gedung_kapasitas > 600 && $gedung_kapasitas <= 1200){
			$bobot_tamu = 4;
		} else  if($gedung_kapasitas > 1200){
			$bobot_tamu = 5;
		} else {
			$bobot_tamu = '';
		}

		if($gedung_parkir <= 500){
			$bobot_parkir = 1;
		} else if($gedung_parkir > 500 && $gedung_parkir <= 800){
			$bobot_parkir = 2;
		} else  if($gedung_parkir > 800 && $gedung_parkir <= 1200){
			$bobot_parkir = 4;
		} else  if($gedung_parkir > 1200){
			$bobot_parkir = 5;
		} else {
			$bobot_parkir = '';
		}

		if($gedung_jenis == 'pendidikan'){
			$bobot_jenis = 1;
		} else if($gedung_jenis == 'instansi'){
			$bobot_jenis = 2;
		} else  if($gedung_jenis == 'ballroom'){
			$bobot_jenis = 4;
		} else  if($gedung_jenis == 'serbaguna'){
			$bobot_jenis = 5;
		} else {
			$bobot_jenis = '';
		}


		if($jumFas <= 0.4){
			$bobot_fasi = 1;
		} else if($jumFas > 0.4 && $jumFas <= 0.6){
			$bobot_fasi = 2;
		} else  if($jumFas > 0.6 && $jumFas <= 0.8){
			$bobot_fasi = 4;
		} else  if($jumFas > 0.8){
			$bobot_fasi = 5;
		} else {
			$bobot_fasi = '';
		}



		if(!empty($_FILES['filefoto']['name'])){
			$config['upload_path'] = 'assets\images';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $_FILES['filefoto']['name'];
			$config['width'] = 700;
			$config['height'] = 700;

			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('filefoto')){
				$uploadData = $this->upload->data();
				$gedung_header = $uploadData['file_name'];
			}else{
				$this->session->set_flashdata('error', 'Foto gagal diupload');
				redirect('admin/gedung');			
			}
		}else{
			$this->session->set_flashdata('error', 'Gagal menambah data, Silahkan masukan Foto');
			redirect('admin/gedung');		
		}

		$data =[ 
			'gedung_kode'=>$gedung_kode,
			'gedung_nama'=>$gedung_nama,
			'gedung_lat'=>$gedung_lat,
			'gedung_long'=>$gedung_long,
			'gedung_alamat'=>$gedung_alamat,
			'gedung_sewa'=>$gedung_harga,
			'gedung_kapasitas'=>$gedung_kapasitas,
			'gedung_parkir'=>$gedung_parkir,
			'gedung_jenis'=>$gedung_jenis,
			'gedung_fasilitas'=>$gedung_fasilitas,
			'gedung_deskripsi'=>$gedung_deskripsi,
			'gedung_header' => $gedung_header
		];
		$InsertData=$this->Mymod->InsertData('gedung',$data);
		if($InsertData){


			$arrdata = [$bobot_harga,$bobot_tamu,$bobot_parkir,$bobot_jenis,$bobot_fasi,'2'];
			$kridata = ['C1','C2','C3','C4','C5','C6'];

			for($i=0; $i <=6; $i++)
			{
				$dataDetail =[ 
					'gedung_kode'=>$gedung_kode,
					'kriteria_kode'=> $kridata[$i],
					'nilai_nilai'=>$arrdata[$i],
				];

				$this->Mymod->InsertData('nilai',$dataDetail);
			}
			$this->session->set_flashdata('success', 'Berhasil menambah data '.$title);
			redirect('admin/gedung');		
		}else{
			$this->session->set_flashdata('error', 'Gagal menambah data '.$title);
			redirect('admin/gedung');		
		}		
	}
}

?>