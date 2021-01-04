<?php

setlocale(LC_ALL, 'id-ID', 'id_ID');

defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
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

    public function index()
    {
        $tgl_awal   = $this->input->get('tgl_awal');
        $tgl_akhir  = $this->input->get('tgl_akhir');

        if (empty($tgl_awal) or empty($tgl_akhir)) {
            $transaksi      = $this->transaksi_model->index();
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

    public function cetak()
    {
        $tgl_awal   = $this->input->get('tgl_awal');
        $tgl_akhir  = $this->input->get('tgl_akhir');

        if (empty($tgl_awal) or empty($tgl_akhir)) {
            $transaksi  = $this->transaksi_model->index();
            $label      = 'Semua Data Transaksi';
        } else {
            setlocale(LC_ALL, 'id-ID', 'id_ID');

            $transaksi   = $this->transaksi_model->view_by_date($tgl_awal, $tgl_akhir);
            $tgl_awal       = strftime('%d %B %Y', strtotime($tgl_awal));
            $tgl_akhir      = strftime('%d %B %Y', strtotime($tgl_akhir));
            $label          = 'Periode Tanggal &nbsp;' . $tgl_awal . ' - ' . $tgl_akhir;
        }

        $data['label']      = $label;
        $data['transaksi']  = $transaksi;

        $label_name = 'tgl' . $tgl_awal . 'SD' . $tgl_akhir;

        $this->load->view('pemilik/print_transaksi', $data);

        $paper_size     = 'A4';
        $orientation    = 'potrait';
        $html   = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan Transaksi" . $label_name . ".pdf", array('Attachment' => 0));
    }

    public function tambah()
    {
        $data['transaksi']          = $this->transaksi_model->index();
        $data['jenis_kendaraan']    = $this->jeniskendaraan_model->index();
        $data['metode_mencuci']     = $this->metodecuci_model->index();
        $data['diskon']             = $this->diskon_model->index();
        $data['user']               = $this->user_model->index();

        $data = array(
            'invoice' => $this->transaksi_model->tambah_data()
        );

        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/transaksi_tambah', $data, array('error' => ''));
        $this->load->view('pemilik/master/footer', $data);
    }

    public function simpanData()
    {
    }

    public function jenis_kendaraan()
    {
        $id = $_GET['jenis_kendaraan'];
        $this->db->select('*');
        $this->db->from('jenis_kendaraan');
        $this->db->where('id', $id);
        $data = $this->db->get('')->result();

        foreach ($data as $t) :
            echo $t->tarif;
        endforeach;
    }

    public function metode_mencuci()
    {
        $id2 = $_GET['metode_mencuci'];
        $this->db->select('*');
        $this->db->from('metode_mencuci');
        $this->db->where('id', $id2);
        $data = $this->db->get('')->result();

        foreach ($data as $tm) :
            echo $tm->tarif_tambahan;
        endforeach;
    }

    public function diskon()
    {
        $id3 = $_GET['diskon'];
        $this->db->select('*');
        $this->db->from('diskon');
        $this->db->where('id', $id3);
        $data = $this->db->get('')->result();

        foreach ($data as $d) :
            echo $d->potongan_harga;
        endforeach;
    }

    public function subtotal()
    {
        $id     = $_GET['jenis_kendaraan'];
        $id2    = $_GET['metode_mencuci'];

        $this->db->select('*');
        $this->db->from('jenis_kendaraan');
        $this->db->where('id', $id);
        $data1 = $this->db->get('')->result();

        $this->db->select('*');
        $this->db->from('metode_mencuci');
        $this->db->where('id', $id2);
        $data2 = $this->db->get('')->result();

        foreach ($data1 as $d1) :
            foreach ($data2 as $d2) :
                //         $sub_total = $d1->tarif + $d2->tarif_tambahan;
                //         echo $sub_total;

                if (!empty($data2)) {
                    $sub_total = $d1->tarif + $d2->tarif_tambahan;
                    echo $sub_total;
                } else {
                    echo $d1->tarif;
                }

            endforeach;
        endforeach;
    }

    public function total()
    {
        $id  = $_GET['jenis_kendaraan'];
        $id2 = $_GET['metode_cuci'];
        $id3 = $_GET['diskon'];

        $this->db->select('*');
        $this->db->from('jenis_kendaraan');
        $this->db->where('id', $id);
        $data1 = $this->db->get('')->result();

        $this->db->select('*');
        $this->db->from('metode_cuci');
        $this->db->where('id', $id2);
        $data2 = $this->db->get('')->result();

        $this->db->select('*');
        $this->db->from('diskon');
        $this->db->where('id', $id3);
        $data3 = $this->db->get('')->result();

        foreach ($data1 as $jk) :
            foreach ($data2 as $mc) :
                foreach ($data3 as $d) :
                    if (!empty($id3)) {
                        if (!empty($id2)) {
                            $jenis_kendaraan    = $jk->tarif;
                            $metode             = $mc->tarif_tambahan;
                            $diskon             = $d->potongan_harga;

                            $total = ($jenis_kendaraan + $metode) - $diskon;
                            echo $total;
                        } else {
                            echo $jk->tarif;
                        }
                    } elseif ($id3 == 0) {
                        if (!empty($id2)) {
                            $total = $jk->tarif +  $mc->tarif_tambahan;
                            echo $total;
                        } else {
                            echo $jk->tarif;
                        }
                    } else {
                        $total = $jk->tarif;
                        echo $total;
                    }

                endforeach;
            endforeach;
        endforeach;
    }


    public function detail($id)
    {
        $where  = array('id' => $id);
        $data['transaksi'] = $this->transaksi_model->detail($where, 'transaksi')->result();

        $jenis_kendaraan            = $this->transaksi_model->get_jenis_kendaraan($id);
        $data['jenis_kendaraan']    = $jenis_kendaraan;

        $metode_mencuci             = $this->transaksi_model->get_metode_mencuci($id);
        $data['metode_mencuci']     = $metode_mencuci;

        $diskon                     = $this->transaksi_model->get_diskon($id);
        $data['diskon']             = $diskon;

        $user   = $this->transaksi_model->get_user($id);
        $data['user']   = $user;

        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/transaksi_detail', $data);
        $this->load->view('pemilik/master/footer', $data);
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->transaksi_model->delete($where, 'transaksi');
        $this->session->set_flashdata('warning', 'Data Berhasil di Hapus');
        redirect('TransaksiController/index');
    }
}
