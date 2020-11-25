<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	

	public function index()
	{
		$this->load->view('pemilik/master/header');
        $this->load->view('pemilik/master/sidebar');
		$this->load->view('pemilik/master/topbar');
		$this->load->view('pemilik/dashboard');
        $this->load->view('pemilik/master/footer');
		
	}
}