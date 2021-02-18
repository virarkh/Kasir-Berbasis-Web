<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
	}

	public function index()
	{
		$data['owner'] 			= $this->dashboard_model->jumlah_owner();
		$data['pegawai'] 		= $this->dashboard_model->jumlah_pegawai();
		$data['pengeluaran'] 	= $this->dashboard_model->jumlah_pengeluaran();
		$data['transaksi']		= $this->dashboard_model->jumlah_transaksi();

		$this->load->view('pemilik/master/header', $data);
		$this->load->view('pemilik/master/sidebar', $data);
		$this->load->view('pemilik/master/topbar', $data);
		$this->load->view('pemilik/dashboard', $data);
		$this->load->view('pemilik/master/footer', $data);
	}
}
