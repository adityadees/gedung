<?php
class Gedung extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Mymod');
	}

	public function index()
	{
		$y['title']='Gedung';
		$x['gedung'] = $this->Mymod->ViewData('gedung');
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/gedung/gedung',$x);
		$this->load->view('frontend/layout/footer');
	}

	public function detail()
	{
		$y['title']='Gedung';

		$segment=$this->uri->segment(3);
		$where=[
			'gedung_kode'=>$segment,
		];
		$wheref = [
			'gedung_kode' => $segment
		];

		$x['gedung'] = $this->Mymod->ViewDetail('gedung',$where);
		$x['foto'] = $this->Mymod->ViewDataWhere('foto_gedung',$wheref);
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/gedung/detail_gedung',$x);
		$this->load->view('frontend/layout/footer');
	}

}

?>