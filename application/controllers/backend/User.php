<?php
class User extends CI_Controller{
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
			$y['title']='User';
			$x['user'] = $this->Mymod->ViewData('user');
			$this->load->view('backend/layout/header',$y);
			$this->load->view('backend/layout/topbar');
			$this->load->view('backend/layout/sidebar');
			$this->load->view('backend/user/user',$x);
			$this->load->view('backend/layout/footer');
		}
	}

	public function save_user(){
		if($_SESSION['user_role']=='admin'){
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$repassword=$this->input->post('repassword');
			$nama=$this->input->post('nama');
			$email=$this->input->post('email');
			$tel=$this->input->post('tel');
			$alamat=$this->input->post('alamat');
			$role=$this->input->post('role');
			$jk=$this->input->post('jk');




			if($jk=='on'){
				$jk='L';
			}else {
				$jk='P';
			}

			$table='user';
			$where='user_username';
			$data=$username;
			$cekuname=$this->Mymod->ViewNumRows($table,$where,$data);

			if($cekuname==1){
				$this->session->set_flashdata('error', 'Username telah dipakai, silahkan ulangi lagi');
				redirect('admin/user'); 
			}else{
				if($password==$repassword){

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
							$user_foto = $uploadData['file_name'];
						}else{
							$user_foto='';
						}
					}else{
						$user_foto='';
					}

					$data =[ 
						'user_username' => $username,
						'user_password' => md5($password),
						'user_nama' => $nama,
						'user_tel' => $tel,
						'user_alamat' => $alamat,
						'user_jk' => $jk,
						'user_email' => $email,
						'user_role' => $role,
						'user_foto' => $user_foto
					];
					$InsertData=$this->Mymod->InsertData($table,$data);
					if($InsertData){
						$this->session->set_flashdata('success', 'Berhasil menambah data '.$title);
						redirect('admin/user');       
					}else{
						$this->session->set_flashdata('error', 'Gagal menambah data '.$title);
						redirect('admin/user');       
					}

					$title='User';
					$table='user';
					$data=[
						'user_username' => $username,
						'user_password' => $password,
						'user_nama' => $nama,
						'user_tel' => $tel,
						'user_alamat' => $alamat,
						'user_jk' => $jk,
						'user_email' => $user_email,
						'user_role' => $role,
						'user_foto' => $user_foto

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
	}


	public function update_user(){
		if($_SESSION['user_role']=='admin'){
			$user_nama=$this->input->post('nama');
			$user_email=$this->input->post('email');
			$user_tel=$this->input->post('tel');
			$user_alamat=$this->input->post('alamat');
			$user_jk=$this->input->post('jk');
			$user_id=$this->input->post('user_id');
			$role=$this->input->post('role');


			if($user_jk=='on'){
				$user_jk='L';
			}else {
				$user_jk='P';
			}

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
						'user_role'=>$role,
						'user_jk'=>$user_jk,
						'user_foto'=>$foto
					];
					$UpdateData=$this->Mymod->UpdateData($table,$data,$where);
					if($UpdateData){
						$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
						redirect('admin/user');		
					}else{
						$this->session->set_flashdata('error', 'Gagal merubah data '.$title);
						redirect('admin/user');		
					}
				}else{
					$this->session->set_flashdata('error', 'Gagal ngeirim data '.$title);
					redirect('admin/user');		
				}
			}else{
				$data = [
					'user_nama'=>$user_nama,
					'user_email'=>$user_email,
					'user_tel'=>$user_tel,
					'user_alamat'=>$user_alamat,
					'user_jk'=>$user_jk,
					'user_role'=>$role
				];
				$UpdateData=$this->Mymod->UpdateData($table,$data,$where);
				if($UpdateData){
					$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
					redirect('admin/user');		
				}else{
					$this->session->set_flashdata('error', 'Gagal merubah data '.$title);
					redirect('admin/user');		
				}
			}
		}
	}

	public function delete_user(){
		if($_SESSION['user_role']=='admin'){
			$title = 'User';
			$user_id=$this->input->post('user_id');
			$table='user';

			$where =[ 
				'user_id' => $user_id
			];
			$this->Mymod->DeleteData($table,$where);
			$this->session->set_flashdata('success', 'Berhasil menghapus data '.$title);
			redirect('admin/user');
		}		
	}
}

?>