<?php

setlocale(LC_ALL, 'id-ID', 'id_ID');

defined('BASEPATH') or exit('No direct script access allowed');

class PengeluaranController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('pengeluaran_model');
		// $this->load->model('jenispengeluaran_model');
		$this->load->model('suppliers_model');
		$this->load->model('user_model');
		$this->load->model('detail_model');
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('dompdf_gen');

		if ($this->session->userdata('logged_in') != TRUE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Anda Harus Login Terlebih Dahulu!</div>');
			redirect('AuthController');
		}
	}

	public function indexPengeluaran() // index pengeluaran
	{
		$tgl_awal   = $this->input->get('tgl_awal');
		$tgl_akhir  = $this->input->get('tgl_akhir');

		if (empty($tgl_awal) or empty($tgl_akhir)) {
			$pengeluaran    = $this->pengeluaran_model->indexPengeluaran();
			$url_cetak      = 'PengeluaranController/cetak';
			$label          = 'Semua Data Pengeluaran';
		} else {
			$pengeluaran    = $this->pengeluaran_model->view_by_date($tgl_awal, $tgl_akhir);
			$url_cetak      = 'PengeluaranController/cetak?tgl_awal=' . $tgl_awal . '&tgl_akhir=' . $tgl_akhir;
			$tgl_awal       = strftime('%e %B %Y', strtotime($tgl_awal));
			$tgl_akhir      = strftime('%e %B %Y', strtotime($tgl_akhir));
			$label          = 'Periode Tanggal &nbsp;' . $tgl_awal . ' - ' . $tgl_akhir;
		}

		$data['pengeluaran']  = $pengeluaran;
		$data['url_cetak']  	= base_url('index.php/' . $url_cetak);
		$data['label']      	= $label;

		$this->load->view('pemilik/master/header', $data);
		$this->load->view('pemilik/master/sidebar', $data);
		$this->load->view('pemilik/master/topbar', $data);
		$this->load->view('pemilik/pengeluaran', $data);
		$this->load->view('pemilik/master/footer', $data);
	}

	public function cetak() // menampilkan laporan pdf
	{
		$tgl_awal   = $this->input->get('tgl_awal');
		$tgl_akhir  = $this->input->get('tgl_akhir');

		if (empty($tgl_awal) or empty($tgl_akhir)) {
			$detail_pengeluaran = $this->pengeluaran_model->indexCetak();
			$label      				= 'Semua Data Pengeluaran';
		} else {
			$detail_pengeluaran	= $this->pengeluaran_model->view_by_date($tgl_awal, $tgl_akhir);
			$tgl_awal   				= strftime('%e %B %Y', strtotime($tgl_awal));
			$tgl_akhir  				= strftime('%e %B %Y', strtotime($tgl_akhir));
			$label      				= 'Periode Tanggal ' . $tgl_awal . ' - ' . $tgl_akhir;
		}

		$data['label']          		= $label;
		$data['detail_pengeluaran'] = $detail_pengeluaran;

		$label_name = ' tgl ' . $tgl_awal . ' SD ' . $tgl_akhir;

		$this->load->view('pemilik/print_pengeluaran', $data);

		$paper_size     = 'A4';
		$orientation    = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan Pengeluaran" . $label_name . ".pdf", array('Attachment' => 0));
	}

	public function addPengeluaran() // form tambah pengeluaran
	{
		$data['suppliers']  = $this->suppliers_model->indexModelSup();
		$data['user']       = $this->user_model->index();

		$this->load->view('pemilik/master/header', $data);
		$this->load->view('pemilik/master/sidebar', $data);
		$this->load->view('pemilik/master/topbar', $data);
		$this->load->view('pemilik/pengeluaran_tambah', $data, array('error' => ''));
		$this->load->view('pemilik/master/footer', $data);
	}

	public function addDataPengeluaran() // proses tambah pengeluaran
	{
		$config = array(
			'upload_path'   => './assets/nota',
			'allowed_types' => 'jpg|jpeg|png',
			'max_size'			=> '2048', // ukuran 2 MB
			'file_name'			=> 'nota-' . substr(md5(rand()), 0, 5)
		);

		$this->load->library('upload', $config);

		$this->upload->do_upload('foto');
		$info       = $this->upload->data();
		$bukti_nota = $info['file_name'];

		$tanggal        = $this->input->post('tanggal');
		$kode           = $this->input->post('kode');
		$nama_suppliers	= $this->input->post('nama_suppliers');
		$biaya          = $this->input->post('biaya');
		// $detail             = $this->input->post('detail');
		$user_id        = $this->input->post('user_id');

		$data = array(
			'id'						=> '',
			'tanggal'       => $tanggal,
			'kode'          => $kode,
			'id_suppliers'	=> $nama_suppliers,
			'biaya'         => $biaya,
			// 'detail'             => $detail,
			'foto'          => $bukti_nota,
			'user_id'       => $user_id
		);

		// $this->session->set_flashdata('success', 'Data Berhasil di Tambah');

		$this->pengeluaran_model->addModelPengeluaran($data);
		redirect('DetailController/itemPengeluaran');
	}

	public function delPengeluaran($id) // hapus pengeluaran
	{
		$where = array('id' => $id);
		$this->pengeluaran_model->delModelPengeluaran($where, 'pengeluaran');

		$error = $this->db->error();
		if ($error['code'] != 0) {
			$this->session->set_flashdata('warning', 'Data Tidak Dapat di Hapus');
		} else {
			$this->session->set_flashdata('success', 'Data Berhasil di Hapus');
		}

		redirect('PengeluaranController/indexPengeluaran');
	}

	public function detailPengeluaran($id) // form detail pengeluaran
	{
		$data['detail_pengeluaran']	= $this->pengeluaran_model->detailModelRinci($id)->result();
		$data['pengeluaran']				= $this->pengeluaran_model->detailModelPengeluaran($id)->result();

		$this->load->view('pemilik/master/header', $data);
		$this->load->view('pemilik/master/sidebar', $data);
		$this->load->view('pemilik/master/topbar', $data);
		$this->load->view('pemilik/pengeluaran_detail', $data);
		$this->load->view('pemilik/master/footer', $data);
	}

	// public function editPengeluaran($id) // form edit CANCEL
	// {
	// 	$where = array('id' => $id);
	// 	$data['suppliers']  				= $this->suppliers_model->indexSup();
	// 	$data['user']               = $this->user_model->index();
	// 	$data['pengeluaran']        = $this->pengeluaran_model->editModelPengeluaran($where, 'pengeluaran')->result();
	// 	$this->load->view('pemilik/master/header', $data);
	// 	$this->load->view('pemilik/master/sidebar', $data);
	// 	$this->load->view('pemilik/master/topbar', $data);
	// 	$this->load->view('pemilik/pengeluaran_edit', $data);
	// 	$this->load->view('pemilik/master/footer', $data);
	// }

	// public function editDataPengeluaran() // proses edit CANCEL
	// {
	// 	$id = $this->input->post('id');

	// 	$config = array(
	// 		'upload_path'    => './assets/nota',
	// 		'allowed_types'    => 'jpg|jpeg|png',
	// 		'max_size'        => '10000'
	// 	);

	// 	$this->load->library('upload', $config);

	// 	$this->upload->do_upload('foto');
	// 	$info       = $this->upload->data();
	// 	$bukti_nota = $info['file_name'];

	// 	$tanggal            = $this->input->post('tanggal');
	// 	$kode               = $this->input->post('kode');
	// 	$biaya              = $this->input->post('biaya');
	// 	$detail             = $this->input->post('detail');
	// 	$nama_suppliers		  = $this->input->post('nama_suppliers');
	// 	$user_id            = $this->input->post('user_id');

	// 	$data = array(
	// 		'tanggal'               => $tanggal,
	// 		'kode'                  => $kode,
	// 		'biaya'                 => $biaya,
	// 		'detail'                => $detail,
	// 		'id_suppliers'  			  => $nama_suppliers,
	// 		'foto'                  => $bukti_nota,
	// 		'user_id'               => $user_id
	// 	);

	// 	$where = array(
	// 		'id' => $id
	// 	);

	// 	$this->session->set_flashdata('success', 'Data Berhasil di Ubah');

	// 	$this->pengeluaran_model->saveModelPengeluaran($where, $data, 'pengeluaran');
	// 	redirect('PengeluaranController/indexPengeluaran');
	// }
}
