<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{

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
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('login.php');
		} else {
			$username = $this->input->post('username', TRUE);
			$password = md5($this->input->post('password', TRUE));
			// $login = $this->user_model->login($username, $password);

			$where = array(
				'username'	=> $username,
				'password'	=> $password,
			);

			$cek = $this->user_model->login('user', $where);
			if ($cek->num_rows() > 0) {
				$data = $cek->row_array();
				$id			= $data['id'];
				$nama_user	= $data['nama_user'];
				$username 	= $data['username'];
				$role_id	= $data['role_id'];
				$user_id	= $data['user_id'];

				$data_session = array(
					'id'		=> $id,
					'nama_user'	=> $nama_user,
					'username' 	=> $username,
					'role_id'	=> $role_id,
					'user_id'	=> $user_id,
					'logged_in'	=> TRUE
				);

				$this->session->set_userdata($data_session);

				//  set message
				$this->session->set_flashdata('sukses', 'Selamat Anda Berhasil Login');
				// login pemilik
				if ($role_id === '1') {
					redirect('DashboardController/index');
				} else {
					redirect('KasirController/index');
				}
			} else {
				echo $this->session->set_flashdata('msg', 'Username / Password yang Anda Masukkan Salah');
				redirect('AuthController/index');
			}
		}
	}

	public function logout()
	{
		// $this->session->sess_destroy();
		// redirect('AuthController/index');

		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('AuthController/index');
	}

	// menampilkan daftar pengguna
	public function daftar()
	{

		if ($this->session->userdata('logged_in') != TRUE) {
			$notif = "<div class='alert-warning'>Anda harus login dulu</div>";
			$this->session->set_flashdata('notif', $notif);
			redirect('AuthController');
		}

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

		if ($this->session->userdata('logged_in') != TRUE) {
			$notif = "<div class='alert-warning'>Anda harus login dulu</div>";
			$this->session->set_flashdata('notif', $notif);
			redirect('AuthController');
		}

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
			'upload_path'	=> './assets/profil',
			'allowed_types'	=> 'jpg|jpeg|png',
			'max_size'		=> '2086',
			'max_width'		=> '1024',
			'max_height'	=> '768'
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

		$this->session->set_flashdata('success', 'Data Berhasil di Tambah');

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
			'upload_path'	=> './assets/profil',
			'allowed_types'	=> 'jpg|jpeg|png',
			'max_size'		=> '2086',
			'max_width'		=> '1024',
			'max_height'	=> '768'
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

		$this->session->set_flashdata('success', 'Data Berhasil di Ubah');

		$this->user_model->edit_data($where, $data, 'user');
		redirect('AuthController/daftar');
	}

	public function hapus($id)
	// public function hapus()
	{
		$where = array('id' => $id);
		$this->user_model->hapus_data($where, 'user');
		// $id = $this->input->get('foto');
		// $this->user_model->hapus_data($id);

		$this->session->set_flashdata('warning', 'Data Berhasil di Hapus');

		redirect('AuthController/daftar');
	}

	public function detail($id)
	{
		$where				= array('id' => $id);
		$data['user']		= $this->user_model->detail_profil($where, 'user')->result();
		// $data['role']	= $this->user_model->role($where, 'role')->result();

		// $user = $this->user_model->get_user_id($id);
		// $data['user'] = $user;

		$role 				= $this->user_model->get_user_id($id);
		$data['role']		= $role;

		$this->load->view('pemilik/master/header', $data);
		$this->load->view('pemilik/master/sidebar', $data);
		$this->load->view('pemilik/master/topbar', $data);
		$this->load->view('pemilik/daftar_pengguna_detail', $data);
		$this->load->view('pemilik/master/footer', $data);
	}
}
