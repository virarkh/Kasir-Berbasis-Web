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

	public function indexMM() // index metode
	{
		$data['metode_mencuci'] = $this->metodecuci_model->indexMM();
		$this->load->view('pemilik/master/header', $data);
		$this->load->view('pemilik/master/sidebar', $data);
		$this->load->view('pemilik/master/topbar', $data);
		$this->load->view('pemilik/metode_cuci', $data);
		$this->load->view('pemilik/master/footer', $data);
	}

	public function addMM() // form tambah metode
	{
		$this->load->view('pemilik/master/header');
		$this->load->view('pemilik/master/sidebar');
		$this->load->view('pemilik/master/topbar');
		$this->load->view('pemilik/metode_cuci_tambah');
		$this->load->view('pemilik/master/footer');
	}

	public function addDataMM() // proses tambah metode
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

	public function editMM($id) //form edit metode
	{
		$where                  = array('id' => $id);
		$data['metode_mencuci'] = $this->metodecuci_model->editModelMM($where, 'metode_mencuci')->result();
		$this->load->view('pemilik/master/header', $data);
		$this->load->view('pemilik/master/sidebar', $data);
		$this->load->view('pemilik/master/topbar', $data);
		$this->load->view('pemilik/metode_cuci_edit', $data);
		$this->load->view('pemilik/master/footer', $data);
	}

	public function editDataMM() // proses edit metode
	{
		$id             = $this->input->post('id');
		$nama_metode    = $this->input->post('nama_metode');
		$tarif_tambahan = $this->input->post('tarif_tambahan');

		$data = array(
			'nama_metode'    => $nama_metode,
			'tarif_tambahan' => $tarif_tambahan
		);

		$where = array(
			'id' => $id
		);

		$this->session->set_flashdata('success', 'Data Berhasil di Ubah');

		$this->metodecuci_model->saveModelMM($where, $data, 'metode_mencuci');
		redirect('MetodeController/indexMM');
	}

	public function delMM($id) // proses delete metode
	{
		$where = array('id' => $id);
		$this->metodecuci_model->delModelMM($where, 'metode_mencuci');

		$error = $this->db->error();
		if ($error['code'] != 0) {
			$this->session->set_flashdata('warning', 'Data Tidak Dapat di Hapus');
		} else {
			$this->session->set_flashdata('success', 'Data Berhasil di Hapus');
		}

		redirect('MetodeController/indexMM');
	}
}
