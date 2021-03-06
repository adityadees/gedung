<?php
class Myaccount extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in_user'])){
			$url=base_url('login');
			redirect($url);
		};
		$this->load->model('Mymod');
	}

	public function index()
	{ 
		if($_SESSION['user_role']=='pemilik'){
			$y['title']='My Account';
			$segment=$_SESSION['user_id'];
			$where=[
				'user_id'=>$segment,
			];

			$x['gedung'] = $this->Mymod->ViewDataWhere('gedung',$where);
			$x['user'] = $this->Mymod->ViewDetail('user',$where);
			$this->load->view('frontend/layout/header',$y);
			$this->load->view('frontend/layout/topbar');
			$this->load->view('frontend/myaccount/myaccount',$x);
			$this->load->view('frontend/layout/footer');
		} else {
			$this->load->view('404');
		}
	}


	public function tambah_gedung()
	{
		if($_SESSION['user_role']=='pemilik'){
			$y['title']='Tambah Gedung';
			$segment=$_SESSION['user_id'];
			$where=[
				'user_id'=>$segment,
			];

			$this->load->view('frontend/layout/header',$y);
			$this->load->view('frontend/layout/topbar');
			$this->load->view('frontend/myaccount/tambah_gedung');
			$this->load->view('frontend/layout/footer');
		} else {
			redirect('login');	
		}
	}


	public function update_password(){
		if($_SESSION['user_role']=='pemilik'){

			$oldpassword=$this->input->post('oldpassword');
			$password=$this->input->post('newpassword');
			$repassword=$this->input->post('repassword');
			$user_id=$_SESSION['user_id'];

			$title='Password';
			$table='user';

			$wold = [
				'user_password' => md5($oldpassword)
			];

			$cek = $this->Mymod->CekDataRows($table,$wold)->num_rows();

			if($cek > 0){
				if ($password==$repassword) {

					$where=[
						'user_id'=>$user_id
					];

					$data=[
						'user_password'=>md5($password),
					];
					$rd=$this->Mymod->UpdateData($table, $data, $where);
					if($rd){
						$this->session->set_flashdata('success', 'Berhasil merubah '.$title);
						redirect('myaccount');			
					}	else {
						$this->session->set_flashdata('error', 'Gagal merubah '.$title);
						redirect('myaccount');			
					}
				} else {
					$this->session->set_flashdata('error', 'Password Baru Tidak Sama');
					redirect('myaccount');			
				}
			} else {
				$this->session->set_flashdata('error', 'Password Lama salah');
				redirect('myaccount#pengaturan');			
			}
		} else {
			$this->load->view('404');
		}
	}


	public function update_user(){
		if($_SESSION['user_role']=='pemilik'){

			$user_nama=$this->input->post('nama');
			$user_email=$this->input->post('email');
			$user_tel=$this->input->post('tel');
			$user_alamat=$this->input->post('alamat');
			$user_jk=$this->input->post('jk');
			$user_id=$_SESSION['user_id'];


			$title='User';
			$table='user';

			$where=[
				'user_id'=>$user_id
			];


			if(!empty($_FILES['filefoto']['name'])){
				$config['upload_path'] = 'assets\images';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $_FILES['filefoto']['name'];
				$config['width'] = 1920;
				$config['height'] = 683;

				$this->load->library('upload',$config);
				$this->upload->initialize($config);

				if($this->upload->do_upload('filefoto')){
					$uploadData = $this->upload->data();
					$foto = $uploadData['file_name'];

					$data = [
						'user_nama'=>$user_nama,
						'user_email'=>$user_email,
						'user_tel'=>$user_tel,
						'user_alamat'=>$user_alamat,
						'user_jk'=>$user_jk,
						'user_foto'=>$foto
					];
					$UpdateData=$this->Mymod->UpdateData($table,$data,$where);
					if($UpdateData){
						$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
						redirect('myaccount');		
					}else{
						$this->session->set_flashdata('error', 'Gagal merubah data '.$title);
						redirect('myaccount');		
					}
				}else{
					$this->session->set_flashdata('error', 'Gagal ngeirim data '.$title);
					redirect('myaccount');		
				}
			}else{
				$data = [
					'user_nama'=>$user_nama,
					'user_email'=>$user_email,
					'user_tel'=>$user_tel,
					'user_alamat'=>$user_alamat,
					'user_jk'=>$user_jk
				];
				$UpdateData=$this->Mymod->UpdateData($table,$data,$where);
				if($UpdateData){
					$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
					redirect('myaccount');		
				}else{
					$this->session->set_flashdata('error', 'Gagal merubah data '.$title);
					redirect('myaccount');		
				}
			}
		}else {
			$this->load->view('404');
		}
	}


	public function update_gedung(){
		if($_SESSION['user_role']=='pemilik'){
			$title = 'Gedung';
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



			$datasx = array();
			if(!empty($_FILES['filefoto']['name'])){
				$filesCount = count($_FILES['filefoto']['name']);
				for($i = 0; $i < $filesCount; $i++){
					$_FILES['file']['name']     = $_FILES['filefoto']['name'][$i];
					$_FILES['file']['type']     = $_FILES['filefoto']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['filefoto']['tmp_name'][$i];
					$_FILES['file']['error']     = $_FILES['filefoto']['error'][$i];
					$_FILES['file']['size']     = $_FILES['filefoto']['size'][$i];

					$uploadPath = 'assets/images/';
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					$config['width'] = 700;
					$config['height'] = 700;

					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if($this->upload->do_upload('file')){
						$fileData = $this->upload->data();
						$uploadData[$i]['file_name'] = $fileData['file_name'];

						$datasx[$i] = $uploadData[$i]['file_name'];
					} 
				}

				$where = [
					'gedung_kode'=>$gedung_kode,
				];
				$data =[ 
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
				];
				$UpdateData=$this->Mymod->UpdateData('gedung',$data,$where);
				if($UpdateData){
					$arrdata = [$bobot_harga,$bobot_tamu,$bobot_parkir,$bobot_jenis,$bobot_fasi,'2'];
					$kridata = ['C1','C2','C3','C4','C5','C6'];
					for($i=0; $i <6; $i++)
					{
						$where = [
							'gedung_kode'=>$gedung_kode,
							'kriteria_kode'=> $kridata[$i],
						];

						$dataDetail =[ 
							'nilai_nilai'=>$arrdata[$i],
						];

						$this->Mymod->UpdateData('nilai',$dataDetail,$where);
					}

					if($this->upload->do_upload('file')){

						for($i = 0; $i < $filesCount; $i++){
							$dataDetail =[ 
								'gedung_kode'=>$gedung_kode,
								'fg_foto'=>$datasx[$i],
							];

							$this->Mymod->InsertData('foto_gedung',$dataDetail);


						}
					}
					$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
					redirect('myaccount');		

				}else{
					$this->session->set_flashdata('error', 'Gagal menambah data '.$title);
					redirect('myaccount');		
				}
			} else {

				$where = [
					'gedung_kode'=>$gedung_kode,
				];
				$data =[ 
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
				];
				$UpdateData=$this->Mymod->UpdateData('gedung',$data,$where);
				if($UpdateData){
					$arrdata = [$bobot_harga,$bobot_tamu,$bobot_parkir,$bobot_jenis,$bobot_fasi,'2'];
					$kridata = ['C1','C2','C3','C4','C5','C6'];
					for($i=0; $i <6; $i++)
					{
						$where = [
							'gedung_kode'=>$gedung_kode,
							'kriteria_kode'=> $kridata[$i],
						];

						$dataDetail =[ 
							'nilai_nilai'=>$arrdata[$i],
						];

						$this->Mymod->UpdateData('nilai',$dataDetail,$where);
					}
					$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
					redirect('myaccount');		

				}
			}		
		}else {
			$this->load->view('404');
		}
	}


	public function delete_gedung(){
		if($_SESSION['user_role']=='pemilik'){
			$title = 'Gedung';
			$gedung_kode=$this->input->post('gedung_kode');
			$table='gedung';

			$where =[ 
				'gedung_kode' => $gedung_kode
			];
			$this->Mymod->DeleteData($table,$where);
			$this->session->set_flashdata('success', 'Berhasil menghapus data '.$title);
			redirect('myaccount');
		}		else {
			$this->load->view('404');
		}
	}


	public function delete_fg(){
		if($_SESSION['user_role']=='pemilik'){
			$title = 'Foto Gedung';
			$fg_id=$this->input->post('fg_id');
			$table='foto_gedung';

			$where =[ 
				'fg_id' => $fg_id
			];
			$this->Mymod->DeleteData($table,$where);
			$this->session->set_flashdata('success', 'Berhasil menghapus data '.$title);
			redirect('myaccount');
		}		else {
			$this->load->view('404');
		}
	}




	public function save_gedung(){
		if($_SESSION['user_role']=='pemilik'){
			$title = 'Gedung';
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
			$pemilik_gedung = $_SESSION['user_id'];
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


			$datasx = array();
			if(!empty($_FILES['filefoto']['name'])){
				$filesCount = count($_FILES['filefoto']['name']);
				for($i = 0; $i < $filesCount; $i++){
					$_FILES['file']['name']     = $_FILES['filefoto']['name'][$i];
					$_FILES['file']['type']     = $_FILES['filefoto']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['filefoto']['tmp_name'][$i];
					$_FILES['file']['error']     = $_FILES['filefoto']['error'][$i];
					$_FILES['file']['size']     = $_FILES['filefoto']['size'][$i];

					$uploadPath = 'assets/images/';
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					$config['width'] = 700;
					$config['height'] = 700;

					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if($this->upload->do_upload('file')){
						$fileData = $this->upload->data();
						$uploadData[$i]['file_name'] = $fileData['file_name'];

						$datasx[$i] = $uploadData[$i]['file_name'];
					} else {
						$this->session->set_flashdata('error', 'Foto gagal diupload');
						redirect('myaccount/tambah-gedung');			
					}
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
					'user_id'=>$pemilik_gedung,
				];
				$InsertData=$this->Mymod->InsertData('gedung',$data);
				if($InsertData){


					$arrdata = [$bobot_harga,$bobot_tamu,$bobot_parkir,$bobot_jenis,$bobot_fasi,'2'];
					$kridata = ['C1','C2','C3','C4','C5','C6'];
					for($i=0; $i <6; $i++)
					{
						$dataDetail =[ 
							'gedung_kode'=>$gedung_kode,
							'kriteria_kode'=> $kridata[$i],
							'nilai_nilai'=>$arrdata[$i],
						];

						$this->Mymod->InsertData('nilai',$dataDetail);
					}


					for($i = 0; $i < $filesCount; $i++){
						$dataDetail =[ 
							'gedung_kode'=>$gedung_kode,
							'fg_foto'=>$datasx[$i],
						];

						$this->Mymod->InsertData('foto_gedung',$dataDetail);
					}
					$this->session->set_flashdata('success', 'Berhasil menambah data '.$title);
					redirect('myaccount/tambah-gedung');


				}else{
					$this->session->set_flashdata('error', 'Gagal menambah data '.$title);
					redirect('myaccount/tambah-gedung');		
				}
			} else {
				$this->session->set_flashdata('error', 'Gagal menambah data '.$title.' Foto belum diupload');
				redirect('myaccount/tambah-gedung');		
			}

		}else {
			$this->load->view('404');
		}
	}


	public function upload_foto(){
		if($_SESSION['user_role']=='pemilik'){
			$gedung_kode=$this->input->post('gedung_kode');

			$title = 'Foto Gedung';
			if(!empty($_FILES['filefoto']['name'])){
				$config['upload_path'] = 'assets\images';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $_FILES['filefoto']['name'];
				$config['width'] = 1920;
				$config['height'] = 683;

				$this->load->library('upload',$config);
				$this->upload->initialize($config);

				if($this->upload->do_upload('filefoto')){
					$uploadData = $this->upload->data();
					$fg_foto = $uploadData['file_name'];
				}else{
					$this->session->set_flashdata('error', 'Gagal mengupload data '.$title);
					redirect('myaccount');   
				}
			}else{
				$this->session->set_flashdata('error', 'Gagal menambah data '.$title. ' Harap Masukan foto');
				redirect('myaccount');
			}

			$data =[ 
				'gedung_kode' => $gedung_kode,
				'fg_foto' => $fg_foto,
			];
			$InsertData=$this->Mymod->InsertData('foto_gedung',$data);
			if($InsertData){
				$this->session->set_flashdata('success', 'Berhasil menambah data '.$title);
				redirect('myaccount');       
			}else{
				$this->session->set_flashdata('error', 'Gagal menambah data '.$title);
				redirect('myaccount');       
			}

		}else {
			$this->load->view('404');
		}
	}

}

?>