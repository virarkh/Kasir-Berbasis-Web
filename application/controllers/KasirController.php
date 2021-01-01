<?php
defined('BASEPATH') or exit('No direct script access allowed');

setlocale(LC_ALL, 'id-ID', 'id_ID');

class KasirController extends CI_Controller
{

        function __construct()
        {
                parent::__construct();
                $this->load->model('kasir_model');
                $this->load->model('jeniskendaraan_model');
                $this->load->model('metodecuci_model');
                $this->load->model('diskon_model');
                $this->load->model('user_model');
                $this->load->helper('url', 'form');
                $this->load->library('form_validation');
                $this->load->library('session');
                $this->load->library('dompdf_gen');

                if ($this->session->userdata('logged_in') != TRUE) {
                        $this->session->set_flashdata('notif', 'Anda harus login dulu');
                        redirect('AuthController');
                }
        }

        public function index()
        {

                $tgl_awal   = $this->input->get('tgl_awal');
                $tgl_akhir  = $this->input->get('tgl_akhir');

                if (empty($tgl_awal) or empty($tgl_akhir)) {
                        $transaksi      = $this->kasir_model->index();
                        // $url_cetak      = 'TransaksiController/cetak';
                        $label          = 'Semua Data Pengeluaran';
                } else {

                        $transaksi      = $this->kasir_model->view_by_date($tgl_awal, $tgl_akhir);
                        // $url_cetak      = 'TransaksiController/cetak?tgl_awal=' . $tgl_awal . '&tgl_akhir=' . $tgl_akhir;
                        $tgl_awal       = strftime('%d %B %Y', strtotime($tgl_awal));
                        $tgl_akhir      = strftime('%d %B %Y', strtotime($tgl_akhir));
                        $label          = 'Periode Tanggal &nbsp;' . $tgl_awal . ' - ' . $tgl_akhir;
                }

                $data['transaksi']  = $transaksi;
                // $data['url_cetak']  = base_url('index.php/' . $url_cetak);
                $data['label']      = $label;


                $this->load->view('kasir/master/header', $data);
                $this->load->view('kasir/master/topbar', $data);
                $this->load->view('kasir/index', $data);
                // $this->load->view('kasir/kasir_tambah', $data);
                // $this->load->view('kasir/kasir_detail', $data);
                $this->load->view('kasir/master/footer', $data);

                // $data['transaksi'] = $this->transaksi_model->index();
                // $this->load->view('kasir/master/header', $data);
                // $this->load->view('kasir/master/topbar', $data);
                // $this->load->view('kasir/index', $data);
                // $this->load->view('kasir/tambahdata', $data);
                // $this->load->view('kasir/master/footer', $data);
        }

        public function tambah()
        {
                $data['transaksi']          = $this->kasir_model->index();
                $data['jenis_kendaraan']    = $this->jeniskendaraan_model->index();
                $data['metode_mencuci']     = $this->metodecuci_model->index();
                $data['diskon']             = $this->diskon_model->index();
                $data['user']               = $this->user_model->index();

                $data = array(
                        'invoice' => $this->kasir_model->tambah_data()
                );

                $this->load->view('kasir/master/header', $data);
                // $this->load->view('kasir/master/sidebar', $data);
                $this->load->view('kasir/master/topbar', $data);
                $this->load->view('kasir/kasir_tambah', $data, array('error' => ''));
                $this->load->view('kasir/master/footer', $data);
        }

        public function detail($id)
        {
                $where  = array('id' => $id);
                $data['transaksi'] = $this->kasir_model->detail($where, 'transaksi')->result();

                $jenis_kendaraan = $this->kasir_model->get_jns_kendaraan($id);
                $data['jenis_kendaraan'] = $jenis_kendaraan;

                $metode_mencuci = $this->kasir_model->get_met_cuci($id);
                $data['metode_mencuci'] = $metode_mencuci;

                $diskon = $this->kasir_model->get_diskon($id);
                $data['diskon'] = $diskon;

                $user = $this->kasir_model->get_user($id);
                $data['user'] = $user;

                $this->load->view('kasir/master/header', $data);
                // $this->load->view('kasir/master/sidebar', $data);
                $this->load->view('kasir/master/topbar', $data);
                $this->load->view('kasir/kasir_detail', $data);
                $this->load->view('kasir/master/footer', $data);
        }
}
