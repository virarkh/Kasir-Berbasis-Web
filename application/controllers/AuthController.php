<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url', 'form');
	}

	public function index()
	{
		$this->load->view('login.php');
	}

	// untuk login
	public function loginForm()
	{
		$username = $this->input->post('username', TRUE);
		$password = md5($this->input->post('password', TRUE));
		$login = $this->user_model->login($username, $password);
		if($login->num_rows() > 0){
			$data = $login->row_array();
			// $nama_user	= $data['nama_user'];
			$username 	= $data['username'];
			$role_id	= $data['role_id'];
			$sesdata = array(
				'username'	=> $username,
				'role_id'	=> $role_id,
				'logged_in'	=> TRUE
			);
			$this->session->set_userdata($sesdata);
			// login pemilik
			if($role_id === '1'){
				redirect('DashboardController/index');
			}else{
				redirect('KasirController/index');
			}
		}else{
			echo $this->session->set_flashdata('msg', 'Username or Password yang Anda Masukkan Salah');
			redirect('AuthController/index');
		}
	}

	// menampilkan daftar pengguna
	public function daftar()
	{
		$data['user'] = $this->user_model->index();
		$this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/daftar_pengguna', $data);
        $this->load->view('pemilik/master/footer', $data);
	}

	//view tambah user
	public function tambah()
	{
		$this->load->view('pemilik/master/header');
        $this->load->view('pemilik/master/sidebar');
        $this->load->view('pemilik/master/topbar');
        $this->load->view('pemilik/daftar_pengguna_tambah');
        $this->load->view('pemilik/master/footer');
	}

	// proses sign up
	public function registrasi()
	{
		$config = array(
			'upload_path'	=> './profil',
			'allowed_types'	=> 'jpg|jpeg|png',
			'max_size'		=> '2086'
		);

		$this->load->library('upload', $config);

		$this->upload->do_upload('foto_profil');
		$info 		= $this->upload->data();
		$nama_foto 	= $info['file_name'];

		$nama_user	= $this->input->post("nama_user");
		$username	= $this->input->post("username");
		$password	= md5($this->input->post("password"));
		$view_pass	= $this->input->post("password");
		$no_hp		= $this->input->post("no_hp");
		$email		= $this->input->post("email");
		$alamat		= $this->input->post("alamat");
		$role_id	= $this->input->post("role_id");

		$data = array(
			
			'nama_user'		=> $nama_user,
			'username' 		=> $username,
			'password'		=> $password,
			'view_password' => $view_pass,
			'foto_profil'	=> $nama_foto,
			'no_hp'			=> $no_hp,
			'email'			=> $email,
			'alamat'		=> $alamat,
			'role_id'       => $role_id
		);

		$this->user_model->sign_in($data);
		redirect('AuthController/daftar');
	}

	// view edit
	public function edit($id)
	{
		$where			= array('id' => $id);
		$data['user']	= $this->user_model->edit($where, 'user')->result();
		$this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/daftar_pengguna_edit', $data);
        $this->load->view('pemilik/master/footer', $data);
	}

	// proses edit
	public function edit_data()
	{
		$id		= $this->input->post('id');

		$config = array(
			'upload_path'	=> './profil',
			'allowed_types'	=> 'jpg|jpeg|png',
			'max_size'		=> '2086'
		);

		$this->load->library('upload', $config);

		$this->upload->do_upload('foto_profil');
		$info 		= $this->upload->data();
		$nama_foto 	= $info['file_name'];

		$nama_user	= $this->input->post("nama_user");
		$username	= $this->input->post("username");
		$password	= md5($this->input->post("password"));
		$view_pass	= $this->input->post("password");
		$no_hp		= $this->input->post("no_hp");
		$email		= $this->input->post("email");
		$alamat		= $this->input->post("alamat");
		$role_id	= $this->input->post("role_id");

		$data = array(
			'nama_user'		=> $nama_user,
			'username' 		=> $username,
			'password'		=> $password,
			'view_password' => $view_pass,
			'foto_profil'	=> $nama_foto,
			'no_hp'			=> $no_hp,
			'email'			=> $email,
			'alamat'		=> $alamat,
			'role_id'       => $role_id
		);

		$where = array(
			'id' => $id
		);

		$this->user_model->edit_data($where, $data, 'user');
		redirect('AuthController/daftar');
	}

	public function hapus($id)
	{
        $where = array('id' => $id);
        $this->user_model->hapus_data($where, 'user');
        redirect('AuthController/daftar');
	}
	
	public function detail($id)
	{
		$where			= array('id' => $id);
		$data['user']	= $this->user_model->detail_profil($where, 'user')->result();

		$this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/daftar_pengguna_detail', $data);
        $this->load->view('pemilik/master/footer', $data);
	}



}
