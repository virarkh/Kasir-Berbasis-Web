<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');
        $this->load->model('jeniskendaraan_model');
        $this->load->model('metodecuci_model');
        $this->load->model('diskon_model');
        $this->load->helper('url');
    }

	public function index()
	{
        $data['transaksi'] = $this->transaksi_model->index();
		$this->load->view('pemilik/master/header', $data );
        $this->load->view('pemilik/master/sidebar', $data );
        $this->load->view('pemilik/master/topbar', $data );
        $this->load->view('pemilik/transaksi', $data);
        $this->load->view('pemilik/master/footer', $data );
    }
    
    public function tambah()
    {
        $this->load->view('pemilik/master/header');
        $this->load->view('pemilik/master/sidebar');
        $this->load->view('pemilik/master/topbar');
        $this->load->view('pemilik/transaksi_tambah');
        $this->load->view('pemilik/master/footer');
    }

    public function detail()
    {
        $this->load->view('pemilik/master/header');
        $this->load->view('pemilik/master/sidebar');
        $this->load->view('pemilik/master/topbar');
        $this->load->view('pemilik/transaksi_detail');
        $this->load->view('pemilik/master/footer');
    }

}