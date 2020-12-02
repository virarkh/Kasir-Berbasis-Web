<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model('auth_model');
	// 	$this->load->library('form_validation');
	// 	$this->load->library('session');
	// }

	public function index()
	{
		$this->load->view('login.php');
	}

	// public function loginForm()
	// {
	// 	$username = $this->input->post('username');
	// 	$password = $this->input->post('password');

	// 	$where = array(
	// 		'username'	=> $username,
	// 		'password'	=> md5($password)
	// 	);

	// 	$cek = $this->user_model->cek_login("user", $where)->num_rows();
	// 	if($cek > 0){
	// 		$data_session = array(
	// 			''
	// 		)
	// 	}

	// 	$this->form_validation->set_rules('username', 'username', 'required');
	// 	$this->form_validation->set_rules('password', 'password', 'required');

	// 	if($this->form_validation->run() == FALSE)
	// 	{
	// 		$errors = $this->form_validation->error_array();
	// 		$this->session->set_flashdata('errors', $errors);
	// 		$this->session->set_flashdata('input', $this->input->post());
	// 		redirect('login');
	// 	}else{
	// 		$username = htmlspecialchars($this->input->post('username'));
	// 		$password = htmlspecialchars($this->input->post('password'));
	// 		$cek_login = $this->auth_model->cek_login($username);
			
	// 		if($cek_login == FALSE)
	// 		{
	// 			$this->session->set_flashdata('error_login', 'Email yang Anda Masukkan Tidak Terdaftar');
	// 			redirect('login');
	// 		}else{
	// 			if(password_verify($password, $cek_login->password)){
	// 				$this->session->set_userdata('id', $cek_login->id);
	// 				$this->
	// 			}
	// 		}


	// 	}

	// }

}
