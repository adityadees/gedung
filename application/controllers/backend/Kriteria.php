<?php
class Kriteria extends CI_Controller{
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
		if($_SESSION['user_role']=='admin'){

			$y['title']='Kriteria';
			$x['kriteria'] = $this->Mymod->ViewData('kriteria');
			$this->load->view('backend/layout/header',$y);
			$this->load->view('backend/layout/topbar');
			$this->load->view('backend/layout/sidebar');
			$this->load->view('backend/kriteria/kriteria',$x);
			$this->load->view('backend/layout/footer');
		}
	}

	public function sub_kriteria()
	{
		if($_SESSION['user_role']=='admin'){

			$jtable=[
				'kriteria' => 'kriteria_kode',
				'sub_kriteria' => 'kriteria_kode'
			];

			$y['title']='Kriteria';
			$x['kriteria'] = $this->Mymod->ViewData('kriteria');
			$x['sub'] = $this->Mymod->getJoin($jtable)->result_array();
			$this->load->view('backend/layout/header',$y);
			$this->load->view('backend/layout/topbar');
			$this->load->view('backend/layout/sidebar');
			$this->load->view('backend/kriteria/sub_kriteria',$x);
			$this->load->view('backend/layout/footer');
		}
	}


	public function save_subkrit()
	{
		if($_SESSION['user_role']=='admin'){

			$kriteria_kode = $this->input->post('kriteria_kode');
			$sk_klasifikasi = $this->input->post('sk_klasifikasi');
			$sk_range = $this->input->post('sk_range');
			$sk_nilai = $this->input->post('sk_nilai');

			$title = "Sub-Kriteria";
			$data =[ 
				'kriteria_kode' => $kriteria_kode,
				'sk_klasifikasi' => $sk_klasifikasi,
				'sk_range' => $sk_range,
				'sk_nilai' => $sk_nilai,
			];

			$InsertData=$this->Mymod->InsertData('sub_kriteria',$data);
			if($InsertData){
				$this->session->set_flashdata('success', 'Berhasil menambah data '.$title);
				redirect('admin/kriteria/sub');		
			}else{
				$this->session->set_flashdata('error', 'Gagal menambah data '.$title);
				redirect('admin/kriteria/sub');		
			}
		}
	}

	public function edit_subkrit()
	{
		if($_SESSION['user_role']=='admin'){

			$sk_id = $this->input->post('sk_id');
			$kriteria_kode = $this->input->post('kriteria_kode');
			$sk_klasifikasi = $this->input->post('sk_klasifikasi');
			$sk_range = $this->input->post('sk_range');
			$sk_nilai = $this->input->post('sk_nilai');

			$title = "Sub-Kriteria";

			$where =[ 
				'sk_id' => $sk_id
			];

			$data =[ 
				'kriteria_kode' => $kriteria_kode,
				'sk_klasifikasi' => $sk_klasifikasi,
				'sk_range' => $sk_range,
				'sk_nilai' => $sk_nilai,
			];

			$UpdateData=$this->Mymod->UpdateData('sub_kriteria',$data,$where);
			if($UpdateData){
				$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
				redirect('admin/kriteria/sub');		
			}else{
				$this->session->set_flashdata('error', 'Gagal merubah data '.$title);
				redirect('admin/kriteria/sub');		
			}
		}
	}


	public function edit_kriteria(){
		if($_SESSION['user_role']=='admin'){
			$kriteria_nama=$this->input->post('kriteria_nama');
			$kriteria_attribute=$this->input->post('kriteria_attribute');
			$kriteria_kode=$this->input->post('kriteria_kode');
			$title = 'Kriteria';
			$table='kriteria';
			$data=[
				'kriteria_nama'=>$kriteria_nama,	
				'kriteria_attribute'=>$kriteria_attribute
			];
			$where =[ 
				'kriteria_kode' => $kriteria_kode
			];
			$this->Mymod->UpdateData($table,$data,$where);
			$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
			redirect('admin/kriteria');		
		}

	}
}

?>