<?php

setlocale(LC_ALL, 'id-ID', 'id_ID');

defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('transaksi_model');
		$this->load->model('jeniskendaraan_model');
		$this->load->model('metodecuci_model');
		$this->load->model('diskon_model');
		$this->load->model('user_model');
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('dompdf_gen');

		if ($this->session->userdata('logged_in') != TRUE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Anda Harus Login Terlebih Dahulu!</div>');
			redirect('AuthController');
		}
	}

	public function indexTransaksi() // index transaksi
	{
		$tgl_awal   = $this->input->get('tgl_awal');
		$tgl_akhir  = $this->input->get('tgl_akhir');

		if (empty($tgl_awal) or empty($tgl_akhir)) {
			$transaksi      = $this->transaksi_model->indexTransaksi();
			$url_cetak      = 'TransaksiController/cetak';
			$label          = 'Semua Data Pengeluaran';
		} else {
			$transaksi      = $this->transaksi_model->view_by_date($tgl_awal, $tgl_akhir);
			$url_cetak      = 'TransaksiController/cetak?tgl_awal=' . $tgl_awal . '&tgl_akhir=' . $tgl_akhir;
			$tgl_awal       = strftime('%d %B %Y', strtotime($tgl_awal));
			$tgl_akhir      = strftime('%d %B %Y', strtotime($tgl_akhir));
			$label          = 'Periode Tanggal &nbsp;' . $tgl_awal . ' - ' . $tgl_akhir;
		}

		$data['transaksi']  = $transaksi;
		$data['url_cetak']  = base_url('index.php/' . $url_cetak);
		$data['label']      = $label;

		$this->load->view('pemilik/master/header', $data);
		$this->load->view('pemilik/master/sidebar', $data);
		$this->load->view('pemilik/master/topbar', $data);
		$this->load->view('pemilik/transaksi', $data);
		$this->load->view('pemilik/master/footer', $data);
	}

	public function cetak() // menampilkan file pdf
	{
		$tgl_awal   = $this->input->get('tgl_awal');
		$tgl_akhir  = $this->input->get('tgl_akhir');

		if (empty($tgl_awal) or empty($tgl_akhir)) {
			$transaksi  = $this->transaksi_model->indexTransaksi();
			$label      = 'Semua Data Transaksi';
			$label_name = 'Semua Data';
		} else {
			setlocale(LC_ALL, 'id-ID', 'id_ID');

			$transaksi  = $this->transaksi_model->view_by_date($tgl_awal, $tgl_akhir);
			$tgl_awal   = strftime('%d %B %Y', strtotime($tgl_awal));
			$tgl_akhir  = strftime('%d %B %Y', strtotime($tgl_akhir));
			$label      = 'Periode Tanggal &nbsp;' . $tgl_awal . ' - ' . $tgl_akhir;
			$label_name = $tgl_awal . ' - ' . $tgl_akhir;
		}

		$data['label']      = $label;
		$data['transaksi']  = $transaksi;

		$this->load->view('pemilik/print_transaksi', $data);

		$paper_size     = 'A4';
		$orientation    = 'potrait';
		$html   = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan Transaksi " . $label_name . ".pdf", array('Attachment' => 0));
	}

	public function addTransaksi() // form menambah transaksi
	{
		$data['transaksi']          = $this->transaksi_model->indexTransaksi();
		$data['jenis_kendaraan']    = $this->jeniskendaraan_model->indexJK();
		$data['metode_mencuci']     = $this->metodecuci_model->indexMM();
		$data['diskon']             = $this->diskon_model->indexDiskon();
		$data['user']               = $this->user_model->index();
		$data['invoice']            = $this->transaksi_model->invoice();

		$this->load->view('pemilik/master/header', $data);
		$this->load->view('pemilik/master/sidebar', $data);
		$this->load->view('pemilik/master/topbar', $data);
		$this->load->view('pemilik/transaksi_tambah', $data);
		$this->load->view('pemilik/master/footer', $data);
	}

	public function addDataTransaksi() // proses menambah transaksi
	{
		$data =  [
			'tanggal'           => $this->input->post('tanggal'),
			'invoice '          => $this->input->post('invoice'),
			'user_id'           => $this->input->post('user_id'),
			'nama_customer '    => $this->input->post('nama_customer'),
			'jenis_id'          => $this->input->post('jenis_id'),
			'metode_id'         => $this->input->post('metode_id'),
			'sub_total'         => $this->input->post('sub_total'),
			'diskon_id'         => $this->input->post('diskon_id'),
			'total'             => $this->input->post('total'),
		];

		$this->session->set_flashdata('success', 'Data Berhasil di Tambah');

		$this->transaksi_model->addModelTransaksi($data);
		redirect('TransaksiController/indexTransaksi');
	}

	public function jenis_kendaraan() // mengambil daftar jenis kendaraan di form tambah
	{
		$id = $_GET['jenis_kendaraan'];
		$this->db->select('*');
		$this->db->from('jenis_kendaraan');
		$this->db->where('id', $id);
		$jenis_kendaraan = $this->db->get('')->result();

		foreach ($jenis_kendaraan as $jk) :
			echo $jk->tarif;
		endforeach;
	}

	public function metode_mencuci() // mengambil daftar metode di form tambah
	{
		$id2 = $_GET['metode_mencuci'];
		$this->db->select('*');
		$this->db->from('metode_mencuci');
		$this->db->where('id', $id2);
		$metode_mencuci = $this->db->get('')->result();

		foreach ($metode_mencuci as $mm) :
			echo $mm->tarif_tambahan;
		endforeach;
	}

	public function diskon() // mengambil daftar diskon do form tambah
	{
		$id3 	= $_GET['diskon'];
		$this->db->select('*');
		$this->db->from('diskon');
		$this->db->where('id', $id3);
		$diskon = $this->db->get('')->result();

		foreach ($diskon as $d) :
			echo $d->potongan_harga;
		endforeach;
	}

	public function subtotal() // menghitung subtotal di form tambah
	{
		$id     = $_GET['jenis_kendaraan'];
		$id2    = $_GET['metode_mencuci'];
		// $id3    = $_GET['diskon'];

		$this->db->select('*');
		$this->db->from('jenis_kendaraan');
		$this->db->where('id', $id);
		$jenis_kendaraan = $this->db->get('')->result();

		$this->db->select('*');
		$this->db->from('metode_mencuci');
		$this->db->where('id', $id2);
		$metode_mencuci = $this->db->get('')->result();

		foreach ($jenis_kendaraan as $jk) :
			foreach ($metode_mencuci as $mm) :
				if (!empty($id2)) {
					// if (!empty($id3)) {
					$subtotal = $jk->tarif + $mm->tarif_tambahan;
					echo $subtotal;
					// }
				} else {
					echo $jk->tarif;
				}
			endforeach;
		endforeach;
	}

	public function total() // menghitung total di form tambah
	{
		$id     = $_GET['jenis_kendaraan'];
		$id2    = $_GET['metode_mencuci'];
		$id3    = $_GET['diskon'];

		$this->db->select('*');
		$this->db->from('jenis_kendaraan');
		$this->db->where('id', $id);
		$jenis_kendaraan = $this->db->get('')->result();

		$this->db->select('*');
		$this->db->from('metode_mencuci');
		$this->db->where('id', $id2);
		$metode_mencuci = $this->db->get('')->result();

		$this->db->select('*');
		$this->db->from('diskon');
		$this->db->where('id', $id3);
		$diskon = $this->db->get('')->result();

		foreach ($jenis_kendaraan as $jk) :
			foreach ($metode_mencuci as $mm) :
				foreach ($diskon as $d) :
					if (!empty($id2)) {
						if (!empty($id3)) {
							$total = (($jk->tarif + $mm->tarif_tambahan) - $d->potongan_harga);
							echo $total;
						}
					} else {
						echo $jk->tarif;
					}
				endforeach;
			endforeach;
		endforeach;
	}

	public function detailTransaksi($id) // menampilkan detail transaksi
	{
		$where  = array('id' => $id);
		$data['transaksi'] = $this->transaksi_model->detailModelTransaksi($where, 'transaksi')->result();

		$jenis_kendaraan            = $this->transaksi_model->get_jenis_kendaraan($id);
		$data['jenis_kendaraan']    = $jenis_kendaraan;

		$metode_mencuci             = $this->transaksi_model->get_metode_mencuci($id);
		$data['metode_mencuci']     = $metode_mencuci;

		$diskon                     = $this->transaksi_model->get_diskon($id);
		$data['diskon']             = $diskon;

		$user   				= $this->transaksi_model->get_user($id);
		$data['user']   = $user;

		$this->load->view('pemilik/master/header', $data);
		$this->load->view('pemilik/master/sidebar', $data);
		$this->load->view('pemilik/master/topbar', $data);
		$this->load->view('pemilik/transaksi_detail', $data);
		$this->load->view('pemilik/master/footer', $data);
	}

	public function delTransaksi($id) // menghapus transaksi
	{
		$where = array('id' => $id);
		$this->transaksi_model->delModelTransaksi($where, 'transaksi');
		$error = $this->db->error();
		if ($error['code'] != 0) {
			$this->session->set_flashdata('warning', 'Data Tidak Dapat di Hapus');
		} else {
			$this->session->set_flashdata('success', 'Data Berhasil di Hapus');
		}
		redirect('TransaksiController/indexTransaksi');
	}
}
