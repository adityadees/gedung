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

	public function pembayaran(){
		$y['title']='Pembayaran';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/form/pembayaran');
		$this->load->view('frontend/layout/footer');
	}

	public function cart()
	{
		if(isset($_SESSION['logged_in_user'])){
			$ses_user=$_SESSION['user_id'];
			$join='user';
			$where=[
				't1.user_id'=>$ses_user,
			];

			$jtable=[
				'keranjang' => 'produk_kode',
				'produk' => 'produk_kode'
			];
			$getcart = $this->Mymod->GetDataJoin($jtable,$where);

			$x['getCartData']=$getcart->result_array();
		}
		$y['title']='Cart';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/myaccount/cart',$x);
		$this->load->view('frontend/layout/footer');

	}



	public function checkout()
	{
		if(isset($_SESSION['logged_in_user'])){
			$ses_user=$_SESSION['user_id'];
			$join='user';
			$where=[
				't1.user_id'=>$ses_user,
			];

			$jtable=[
				'keranjang' => 'produk_kode',
				'produk' => 'produk_kode'
			];
			$getcart = $this->Mymod->GetDataJoin($jtable,$where);
			$getRekening = $this->Mymod->ViewData('rekening');

			$whreuser=[
				'user_id'=>$_SESSION['user_id'],
			];
			$getUser = $this->Mymod->CekDataRows('user',$whreuser);

			$x['getCartData']=$getcart->result_array();
			$x['rekening']=$getRekening;
			$x['user']=$getUser->row_array();
		}
		$y['title']='Cart';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/myaccount/checkout',$x);
		$this->load->view('frontend/layout/footer');

	}

	public function produk_detail()
	{

		$kode=$this->uri->segment(3);
		$table='produk';
		$where='produk_kode';
		$data=$kode;
		$prod = $this->Mymod->ViewDetail($table,$where,$data);
		$proed = $this->Mymod->ViewData('produk');
		$x['prd_detail'] = $prod;
		$xx['produk'] = $proed;
		$y['title']='Produk';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/produk/produk_detail',$x);
		$this->load->view('frontend/layout/footer',$xx);
	}
	public function subkat()
	{

		$kode=$this->uri->segment(3);

		$table='produk';
		$where='produk_kode';
		$data=$kode;
		$best = $this->Mymod->best_seller()->result_array();
		$nprds = $this->Mymod->joinsubkat($kode)->result_array();
		$proed = $this->Mymod->ViewData('produk');
		$x['nprd'] = $nprds;
		$x['best'] = $best;
		$xx['produk'] = $proed;
		$y['title']='Produk';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/produk/subkat',$x);
		$this->load->view('frontend/layout/footer',$xx);
	}
	public function bykat()
	{

		$kode=$this->uri->segment(3);

		$table='produk';
		$where='produk_kode';
		$data=$kode;
		$best = $this->Mymod->best_seller()->result_array();
		$nprds = $this->Mymod->joinkat($kode)->result_array();
		$proed = $this->Mymod->ViewData('produk');
		$x['nprd'] = $nprds;
		$x['best'] = $best;
		$xx['produk'] = $proed;
		$y['title']='Produk';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/produk/kat',$x);
		$this->load->view('frontend/layout/footer',$xx);
	}

	public function list()
	{

		$kode=$this->uri->segment(3);

		$table='produk';
		$where='produk_kode';
		$data=$kode;
		$best = $this->Mymod->best_seller()->result_array();
		$nprds = $this->Mymod->joinlist($kode)->result_array();
		$proed = $this->Mymod->ViewData('produk');
		$x['nprd'] = $nprds;
		$x['best'] = $best;
		$xx['produk'] = $proed;
		$y['title']='Produk';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/produk/list',$x);
		$this->load->view('frontend/layout/footer',$xx);
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


	public function produk(){
		$prod = $this->Mymod->ViewData('produk');
		$best = $this->Mymod->best_seller()->result_array();
		$kat = $this->Mymod->ViewData('kategori');
		$x['produk'] = $prod;
		$x['best'] = $best;
		$x['kategori'] = $kat;
		$xx['produk'] = $prod;
		$y['kategori'] = $kat;
		$y['title']='Produk';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/produk/produk',$x);
		$this->load->view('frontend/layout/footer',$xx);	
	}

	public function contactus(){
		$y['title']='Contact Us';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/contact/contactus');
		$this->load->view('frontend/layout/footer');		
	}

	public function aboutus(){
		$y['title']='Contact Us';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/contact/aboutus');
		$this->load->view('frontend/layout/footer');		
	}

	public function amyaccount(){
		$y['title']='My Account';
		if(isset($_SESSION['logged_in_user'])){
			$data=$_SESSION['user_id'];
			$table='user';
			$where='user_id';
			$user = $this->Mymod->ViewDetail($table,$where,$data);
			$x['user'] = $user;


			$bbtabel=[
				'pemesanan' => 'pemesanan_kode',
				'pembayaran' => 'pemesanan_kode'
			];
			$wpesan=[
				't1.user_id '=>$data,
				't2.pembayaran_status'=>'belumbayar',
				't2.pembayaran_method'=>'transfer',
			];

			$bdikirim=[
				't1.user_id '=>$data,
				't1.pemesanan_status'=>'waiting',
			];
			$pselesai=[
				't1.user_id '=>$data,
				't1.pemesanan_status'=>'selesai',
			];


			$x['selesai'] = $this->Mymod->GetDataJoin($bbtabel,$pselesai);
			$x['belumbayar'] = $this->Mymod->GetDataJoin($bbtabel,$wpesan);
			$x['belumdikirim'] =  $this->Mymod->GetDataJoin($bbtabel,$bdikirim);


			$this->load->view('frontend/layout/header',$y);
			$this->load->view('frontend/myaccount/myaccount',$x);
			$this->load->view('frontend/layout/footer');	
		}
	}
	public function myprofil(){
		$y['title']='My Accoyunt';
		if(isset($_SESSION['logged_in_user'])){
			$data=$_SESSION['user_id'];
			$table='user';
			$where='user_id';
			$user = $this->Mymod->ViewDetail($table,$where,$data);
			$x['user'] = $user;
			$this->load->view('frontend/layout/header',$y);
			$this->load->view('frontend/myaccount/myprofil',$x);
			$this->load->view('frontend/layout/footer');	
		}
	}

	public function addtocart(){

		$produk_kode=$this->input->post('produk_kode');
		$qty=$this->input->post('qty');
		$user_id=$_SESSION['user_id'];


		$title='Keranjang';
		$table='keranjang';

		$where=[
			'produk_kode'=>$produk_kode,
			'user_id'=>$user_id,
		];

		$cekproduk=$this->Mymod->CekDataRows($table,$where);
		if($cekproduk->num_rows()>0){
			$getprod=$cekproduk->row_array();
			$keranjang_id=$getprod['keranjang_id'];
			$keranjang_qty=$getprod['keranjang_qty'];

			$where=[
				'keranjang_id'=>$keranjang_id
			];

			$newqty=$qty+$keranjang_qty;
			$data=array(
				'keranjang_qty'=>$newqty,
			);
			$rd=$this->Mymod->UpdateData($table, $data, $where);
			$this->session->set_flashdata('cartsuccess', 'Berhasil merubah '.$title);
			redirect($_SERVER['HTTP_REFERER']);	


		}else {
			$data=array(
				'produk_kode'=>$produk_kode,
				'user_id'=>$user_id,
				'keranjang_qty'=>$qty,
			);
			$rd=$this->Mymod->InsertData($table,$data);
			$this->session->set_flashdata('cartsuccess', 'Berhasil menambah '.$title);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function delete_cart(){
		$keranjang_id=$this->input->post('keranjang_id');
		$title = 'Keranjang';
		$table='keranjang';
		$where = array(
			'keranjang_id' => $keranjang_id
		);

		$this->Mymod->DeleteData($table,$where);
		$this->session->set_flashdata('success', 'Berhasil menghapus data '.$title);
		header("Location: {$_SERVER['HTTP_REFERER']}");
		exit;
	}

	public function batal_pemesanan(){
		$pemesanan_kode=$this->input->post('pemesanan_kode');
		$title = 'Pemesanan';
		$table='pemesanan';
		$where =[ 
			'pemesanan_kode' => $pemesanan_kode
		];

		$this->Mymod->DeleteData($table,$where);
		$this->session->set_flashdata('success', 'Berhasil menghapus data '.$title);
		header("Location: {$_SERVER['HTTP_REFERER']}");
		exit;	
	}

	public function update_cart(){

	}

	public function save_checkout(){
		$pemesanan_ongkir=$this->input->post('pemesanan_ongkir');
		$pemesanan_total=$this->input->post('pemesanan_total');
		$pemesanan_subtotal=$this->input->post('pemesanan_subtotal');
		$rekening=$this->input->post('rekening');
		$user_id=$this->input->post('user_id');
		$cid=$this->input->post('cid');
		$ps_nama=$this->input->post('ps_nama');
		$ps_email=$this->input->post('ps_email');
		$ps_tel=$this->input->post('ps_tel');
		$ps_alamat=$this->input->post('ps_alamat');
		$user_nama=$this->input->post('user_nama');
		$user_email=$this->input->post('user_email');
		$user_tel=$this->input->post('user_tel');
		$user_alamat=$this->input->post('user_alamat');
		$produk_kode=$this->input->post('produk_kode');
		$prd_kd=$this->input->post('prd_kd');
		$pdp_qty=$this->input->post('pdp_qty');
		$pdp_bonus=$this->input->post('pdp_bonus');
		$pdp_harga=$this->input->post('pdp_harga');
		$pdp_diskon=$this->input->post('pdp_diskon');
		$pdp_subtotal=$this->input->post('pdp_subtotal');
		$pemesanan_kode=$this->input->post('pemesanan_kode');
		$pembayaran_method=$this->input->post('pembayaran_method');
		$infoakun=$this->input->post('infoakun');




		$data=[
			'pemesanan_kode'=>$pemesanan_kode,
			'user_id'=>$user_id,
			'pemesanan_subtotal'=>$pemesanan_subtotal,
			'pemesanan_ongkir'=>$pemesanan_ongkir,
			'pemesanan_total'=>$pemesanan_total,
		];
		$rd=$this->Mymod->insertData('pemesanan',$data);

		if($rd){
			if($pembayaran_method=='ditempat'){
				$data=[
					'pemesanan_kode'=>$pemesanan_kode,
					'pembayaran_method'=>$pembayaran_method,
				];
			}else {
				$data=[
					'pemesanan_kode'=>$pemesanan_kode,
					'pembayaran_method'=>$pembayaran_method,
					'pembayaran_status'=>'belumbayar',
				];
			}

			$rs=$this->Mymod->insertData('pembayaran',$data);
			if($rs){
				for($count = 0; $count < sizeof($cid); $count++){
					$data=[
						'pemesanan_kode'=>$pemesanan_kode,
						'produk_kode'=>$prd_kd[$count],
						'pdp_qty'=>$pdp_qty[$count],
						'pdp_bonus'=>$pdp_bonus[$count],
						'pdp_harga'=>$pdp_harga[$count],
						'pdp_diskon'=>$pdp_diskon[$count],
						'pdp_subtotal'=>$pdp_subtotal[$count],
					];
					$this->Mymod->insertData('pemesanan_detailp',$data);
				}

				if($infoakun=='sesuai'){
					$data=[
						'pemesanan_kode'=>$pemesanan_kode,
						'ps_nama'=>$user_nama,
						'ps_email'=>$user_email,
						'ps_tel'=>$user_tel,
						'ps_alamat'=>$user_alamat,
					];
				}else {
					$data=[
						'pemesanan_kode'=>$pemesanan_kode,
						'ps_nama'=>$ps_nama,
						'ps_email'=>$ps_email,
						'ps_tel'=>$ps_tel,
						'ps_alamat'=>$ps_alamat,
					];	
				}


				$this->Mymod->insertData('pemesanan_ship',$data);

				$table='keranjang';
				$user_id=$_SESSION['user_id'];
				$where = [
					'user_id' => $user_id
				];
				$this->Mymod->DeleteData($table,$where);
				$this->session->set_flashdata('success', 'Berhasil memesan');
				redirect('checkout');
			}
			else {
				$this->session->set_flashdata('success', 'Gagal memesan');
				redirect('checkout');
			}
		} else {
			$this->session->set_flashdata('success', 'Gagal memesan');
			redirect('checkout');
		}


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
	

	function upbukti(){
		$pembayaran_nama=$this->input->post('pembayaran_nama');
		$pemesanan_kode=$this->input->post('pemesanan_kode');
		$table='pembayaran';

		$where = [
			'pemesanan_kode' => $pemesanan_kode
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
				$pembayaran_bukti = $uploadData['file_name'];

				$data = [
					'pembayaran_nama' => $pembayaran_nama,
					'pembayaran_bukti' => $pembayaran_bukti,
					'pembayaran_status' => 'pending',
				];
				$UpdateData=$this->Mymod->UpdateData($table,$data,$where);
				if($UpdateData){
					$this->session->set_flashdata('success', 'Berhasil ngeirim data '.$title);
					redirect('upload/pembayaran');		
				}else{
					$this->session->set_flashdata('error', 'Gagal ngeirim data '.$title);
					redirect('upload/pembayaran');		
				}
			}else{
				$this->session->set_flashdata('error', 'Gagal ngeirim data '.$title);
				redirect('upload/pembayaran');		
			}
		}else{
			$this->session->set_flashdata('error', 'Gagal ngeirim data '.$title);
			redirect('upload/pembayaran');		
		}
	}
}