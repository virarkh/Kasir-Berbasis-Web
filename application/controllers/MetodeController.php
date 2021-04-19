<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MetodeController extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('metodecuci_model');
		$this->load->helper('url');

		if ($this->session->userdata('logged_in') != TRUE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Anda Harus Login Terlebih Dahulu!</div>');
			redirect('AuthController');
		}
	}

	public function indexMM()
	{
		$data['metode_mencuci'] = $this->metodecuci_model->indexMM();
		$this->load->view('pemilik/master/header', $data);
		$this->load->view('pemilik/master/sidebar', $data);
		$this->load->view('pemilik/master/topbar', $data);
		$this->load->view('pemilik/metode_cuci', $data);
		$this->load->view('pemilik/master/footer', $data);
	}

	public function addMM()
	{
		$this->load->view('pemilik/master/header');
		$this->load->view('pemilik/master/sidebar');
		$this->load->view('pemilik/master/topbar');
		$this->load->view('pemilik/metode_cuci_tambah');
		$this->load->view('pemilik/master/footer');
	}

	public function addDataMM()
	{
		$nama_metode    = $this->input->post('nama_metode');
		$tarif_tambahan = $this->input->post('tarif_tambahan');

		$data = array(
			'nama_metode'    => $nama_metode,
			'tarif_tambahan' => $tarif_tambahan
		);

		$this->session->set_flashdata('success', 'Data Berhasil di Tambah');

		$this->metodecuci_model->addModelMM($data, 'metode_mencuci');
		redirect('MetodeController/indexMM');
	}

	public function editMM($id)
	{
		$where                  = array('id' => $id);
		$data['metode_mencuci'] = $this->metodecuci_model->editModelMM($where, 'metode_mencuci')->result();
		$this->load->view('pemilik/master/header', $data);
		$this->load->view('pemilik/master/sidebar', $data);
		$this->load->view('pemilik/master/topbar', $data);
		$this->load->view('pemilik/metode_cuci_edit', $data);
		$this->load->view('pemilik/master/footer', $data);
	}

	public function editDataMM()
	{
		$id             = $this->input->post('id');
		$nama_metode    = $this->input->post('nama_metode');
		$tarif_tambahan = $this->input->post('tarif_tambahan');

		$data = array(
			'nama_metode'       => $nama_metode,
			'tarif_tambahan'    => $tarif_tambahan
		);

		$where = array(
			'id'    => $id
		);

		$this->session->set_flashdata('success', 'Data Berhasil di Ubah');

		$this->metodecuci_model->saveModelMM($where, $data, 'metode_mencuci');
		redirect('MetodeController/indexMM');
	}

	public function delMM($id)
	{
		$where = array('id' => $id);
		$this->metodecuci_model->delModelMM($where, 'metode_mencuci');

		$this->session->set_flashdata('warning', 'Data Berhasil di Hapus');

		redirect('MetodeController/indexMM');
	}
}
