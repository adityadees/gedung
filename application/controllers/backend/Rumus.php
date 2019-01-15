<?php

class Rumus extends CI_Controller{
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
			$y['title']='Rumus';
			
			$maxNK = $this->Mymod->maxKepentingan()->result_array();
			$maxNKz = $this->Mymod->ViewData('user');
			

			$this->load->view('backend/layout/header',$y);
			$this->load->view('backend/layout/topbar');
			$this->load->view('backend/layout/sidebar');
			$this->load->view('backend/rumus/rumus');
			$this->load->view('backend/layout/footer');
		}
	}
}