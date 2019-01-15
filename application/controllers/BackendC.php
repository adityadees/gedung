<?php

class BackendC extends CI_Controller{
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
		$y['title']='Dashboard';
	
		$maxNK = $this->Mymod->maxKepentingan()->result_array();
		$maxNKz = $this->Mymod->ViewData('user');
		

		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/index');
		$this->load->view('backend/layout/footer');
	}

	public function save_user(){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$repassword=$this->input->post('repassword');
		$nama=$this->input->post('nama');
		$email=$this->input->post('email');
		$tel=$this->input->post('tel');
		$alamat=$this->input->post('alamat');
		$jk=$this->input->post('jk');
		$role=$this->input->post('role');

		$table='user';
		$where='user_username';
		$data=$username;
		$cekuname=$this->Mymod->ViewNumRows($table,$where,$data);

		if($cekuname==1){
			$this->session->set_flashdata('error', 'Username telah dipakai, silahkan ulangi lagi');
			redirect('admin/user');	
		}else{
			if($password==$repassword){

				if($jk=='on'){
					$jk='L';
				}else {
					$jk='P';
				}
				$title='User';
				$table='user';
				$data=[
					'user_username'=>$username,
					'user_password'=>md5($password),
					'user_nama'=>$nama,
					'user_email'=>$email,
					'user_alamat'=>$alamat,
					'user_jk'=>$jk,
					'user_tel'=>$tel,
					'user_role'=>$role,
				];
				$rd=$this->Mymod->InsertData($table,$data);
				$this->session->set_flashdata('success', 'Berhasil menambah '.$title);
				redirect('admin/user');		
			}else {
				$this->session->set_flashdata('error', 'Password tidak sama, silahkan diulangi lagi');
				redirect('admin/user');		
			}
		}


	}	


	function edit_user(){
		$nama=$this->input->post('nama');
		$email=$this->input->post('email');
		$tel=$this->input->post('tel');
		$alamat=$this->input->post('alamat');
		$jk=$this->input->post('jk');
		$role=$this->input->post('role');
		$user_id=$this->input->post('user_id');
		if($jk=='on'){
			$jk='L';
		}else {
			$jk='P';
		}

		$title = 'User';

		$table='user';
		$data=[
			'user_nama'=>$nama,
			'user_email'=>$email,
			'user_alamat'=>$alamat,
			'user_jk'=>$jk,
			'user_tel'=>$tel,
			'user_role'=>$role
		];
		$where =[ 
			'user_id' => $user_id
		];		
		$this->Mymod->UpdateData($table,$data,$where);
		$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
		redirect('admin/user');		
	}	


}