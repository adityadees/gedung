<?php

class FrontendC extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Mymod');
	}

	public function index()
	{
		$jumlah_data = $this->Mymod->ViewDataRows('gedung');
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 6;
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

		$x['gedung'] = $this->Mymod->pagging('gedung',$config['per_page'],$from);
		$y['title']='Home';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/slider/slider');
		$this->load->view('frontend/index',$x);
		$this->load->view('frontend/layout/footer');

	}



	public function register(){
		$y['title']='Register';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/myaccount/register');
		$this->load->view('frontend/layout/footer');
	}

	public function login(){
		$y['title']='Login';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/myaccount/login');
		$this->load->view('frontend/layout/footer');
	}


	public function update_user(){

		$user_nama=$this->input->post('user_nama');
		$user_email=$this->input->post('user_email');
		$user_tel=$this->input->post('user_tel');
		$user_alamat=$this->input->post('user_alamat');
		$user_id=$_SESSION['user_id'];

		$title='User';
		$table='user';

		$where=[
			'user_id'=>$user_id
		];

		$data=[
			'user_nama'=>$user_nama,
			'user_email'=>$user_email,
			'user_tel'=>$user_tel,
			'user_alamat'=>$user_alamat
		];
		$rd=$this->Mymod->UpdateData($table, $data, $where);
		if($rd){
			$this->session->set_flashdata('success', 'Berhasil merubah '.$title);
			redirect('myaccount');			
		}	else {
			$this->session->set_flashdata('error', 'Gagal merubah '.$title);
			redirect('myaccount');			
		}
	}
	

}