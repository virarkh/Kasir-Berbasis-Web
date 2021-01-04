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
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('login.php');
		} else {
			$email = $this->input->post('email', TRUE);
			$password = md5($this->input->post('password', TRUE));
			// $login = $this->user_model->login($username, $password);

			$where = array(
				'email'	=> $email,
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
				$email		= $data['email'];
				$foto_profil = $data['foto_profil'];

				$data_session = array(
					'id'		=> $id,
					'nama_user'	=> $nama_user,
					'username' 	=> $username,
					'role_id'	=> $role_id,
					'user_id'	=> $user_id,
					'email'		=> $email,
					'foto_profil' => $foto_profil,
					'logged_in'	=> TRUE
				);

				$this->session->set_userdata($data_session);

				//  set message
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" >Selamat! Anda Berhasil Login</div>');
				// $this->session->set_flashdata('sukses', 'Selamat Anda Berhasil Login');

				// login pemilik
				if ($role_id === '1') {
					redirect('DashboardController/index');
				} else {
					redirect('KasirController/index');
				}
			} else {
				// $this->session->set_flashdata('msg', 'Username / Password yang Anda Masukkan Salah');
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Username / Password yang Anda Masukkan Salah</div>');
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
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Anda Harus Login Terlebih Dahulu!</div>');
			// $this->session->set_flashdata('notif', 'Anda harus login dulu');
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
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Anda Harus Login Terlebih Dahulu!</div>');
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
		if ($this->session->userdata('logged_in') != TRUE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Anda Harus Login Terlebih Dahulu!</div>');
			redirect('AuthController');
		}

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
		// $password 	= $this->input->post("password");
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
		if ($this->session->userdata('logged_in') != TRUE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Anda Harus Login Terlebih Dahulu!</div>');
			redirect('AuthController');
		}

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
		if ($this->session->userdata('logged_in') != TRUE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Anda Harus Login Terlebih Dahulu!</div>');
			redirect('AuthController');
		}

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
		// $password 	= $this->input->post("password");
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
		if ($this->session->userdata('logged_in') != TRUE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Anda Harus Login Terlebih Dahulu!</div>');
			redirect('AuthController');
		}

		$where = array('id' => $id);
		$this->user_model->hapus_data($where, 'user');
		// $id = $this->input->get('foto');
		// $this->user_model->hapus_data($id);

		$this->session->set_flashdata('warning', 'Data Berhasil di Hapus');

		redirect('AuthController/daftar');
	}

	public function detail($id)
	{
		if ($this->session->userdata('logged_in') != TRUE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Anda Harus Login Terlebih Dahulu!</div>');
			redirect('AuthController');
		}

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

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol'	=> 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'tumbuhsehat7@gmail.com',
			'smtp_pass' => 'tumbuhsehat789',
			'smtp_port' => 465,
			'mailtype' 	=> 'html',
			'charset' 	=> 'utf-8',
			'newline' 	=> "\r\n"
		];

		$this->load->library('email', $config);
		// $this->load->initialize($config);

		$this->email->from('tumbuhsehat7@gmail.com', 'Rokhmah Vira Santi');
		$this->email->to($this->input->post('email'));

		if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Klik link berikut untuk mengganti password Anda : <a href="' . base_url() . 'AuthController/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}


		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function resetpassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Reset Password Gagal! Token Salah</div>');
				redirect('AuthController');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Reset Password Gagal! Email Salah</div>');
			redirect('AuthController');
		}
	}

	public function lupa_pass()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == false) {
			$this->load->view('forgot_pass');
		} else {
			$email = $this->input->post('email');

			$user = $this->db->get_where('user', ['email' => $email])->row_array();

			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" >Cek Email Anda!</div>');
				redirect('AuthController/lupa_pass');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Email tidak terdaftar</div>');
				redirect('AuthController/lupa_pass');
			}
		}
	}

	public function changePassword()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('AuthController');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[5]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('changePass');
		} else {
			// $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$password 	= md5($this->input->post('password1'));
			$view_password 	= $this->input->post('password1');
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->set('view_password', $view_password);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" >Berhasil!</div>');
			redirect('AuthController');
		}
	}
}
