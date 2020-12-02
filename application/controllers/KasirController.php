<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KasirController extends CI_Controller {



	public function index()
	{
        $this->load->view('kasir/master/header');
        $this->load->view('kasir/master/topbar');
        $this->load->view('kasir/index');
        $this->load->view('kasir/tambahdata');
        $this->load->view('kasir/master/footer');

	}
}