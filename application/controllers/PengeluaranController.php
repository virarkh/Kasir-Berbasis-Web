<?php

setlocale(LC_ALL, 'id-ID', 'id_ID');

defined('BASEPATH') or exit('No direct script access allowed');

class PengeluaranController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('pengeluaran_model');
        $this->load->model('jenispengeluaran_model');
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

    public function indexPengeluaran()
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
        $data['url_cetak']  = base_url('index.php/' . $url_cetak);
        $data['label']      = $label;

        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/pengeluaran', $data);
        $this->load->view('pemilik/master/footer', $data);
    }

    public function cetak()
    {
        $tgl_awal   = $this->input->get('tgl_awal');
        $tgl_akhir  = $this->input->get('tgl_akhir');

        if (empty($tgl_awal) or empty($tgl_akhir)) {
            $pengeluaran    = $this->pengeluaran_model->indexPengeluaran();
            $label          = 'Semua Data Pengeluaran';
        } else {
            $pengeluaran    = $this->pengeluaran_model->view_by_date($tgl_awal, $tgl_akhir);
            $tgl_awal       = strftime('%e %B %Y', strtotime($tgl_awal));
            $tgl_akhir      = strftime('%e %B %Y', strtotime($tgl_akhir));
            $label          = 'Periode Tanggal &nbsp;' . $tgl_awal . ' - ' . $tgl_akhir;
        }

        $data['label']          = $label;
        $data['pengeluaran']    = $pengeluaran;

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

    public function addPengeluaran()
    {
        $data['jenis_pengeluaran']  = $this->jenispengeluaran_model->indexJP();
        $data['user']               = $this->user_model->index();

        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/pengeluaran_tambah', $data, array('error' => ''));
        $this->load->view('pemilik/master/footer', $data);
    }

    public function addDataPengeluaran()
    {
        $config = array(
            'upload_path'    => './assets/nota',
            'allowed_types'    => 'jpg|jpeg|png',
            'max_size'        => '10000'
        );

        $this->load->library('upload', $config);

        $this->upload->do_upload('foto');
        $info       = $this->upload->data();
        $bukti_nota = $info['file_name'];

        $tanggal            = $this->input->post('tanggal');
        $kode               = $this->input->post('kode');
        $nama_pengeluaran   = $this->input->post('nama_pengeluaran');
        $biaya              = $this->input->post('biaya');
        $detail             = $this->input->post('detail');
        $user_id            = $this->input->post('user_id');

        $data = array(
            'tanggal'            => $tanggal,
            'kode'               => $kode,
            'jns_pengeluaran_id' => $nama_pengeluaran,
            'biaya'              => $biaya,
            'detail'             => $detail,
            'foto'               => $bukti_nota,
            'user_id'            => $user_id
        );

        $this->session->set_flashdata('success', 'Data Berhasil di Tambah');

        $this->pengeluaran_model->addModelPengeluaran($data);
        redirect('PengeluaranController/indexPengeluaran');
    }

    public function editPengeluaran($id)
    {
        $where = array('id' => $id);
        $data['jenis_pengeluaran']  = $this->jenispengeluaran_model->indexJP();
        $data['user']               = $this->user_model->index();
        $data['pengeluaran']        = $this->pengeluaran_model->editModelPengeluaran($where, 'pengeluaran')->result();
        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/pengeluaran_edit', $data);
        $this->load->view('pemilik/master/footer', $data);
    }

    public function editDataPengeluaran()
    {
        $id = $this->input->post('id');

        $config = array(
            'upload_path'    => './assets/nota',
            'allowed_types'    => 'jpg|jpeg|png',
            'max_size'        => '10000'
        );

        $this->load->library('upload', $config);

        $this->upload->do_upload('foto');
        $info       = $this->upload->data();
        $bukti_nota = $info['file_name'];

        $tanggal            = $this->input->post('tanggal');
        $kode               = $this->input->post('kode');
        $biaya              = $this->input->post('biaya');
        $detail             = $this->input->post('detail');
        $nama_pengeluaran   = $this->input->post('nama_pengeluaran');
        $user_id            = $this->input->post('user_id');

        $data = array(
            'tanggal'               => $tanggal,
            'kode'                  => $kode,
            'biaya'                 => $biaya,
            'detail'                => $detail,
            'jns_pengeluaran_id'    => $nama_pengeluaran,
            'foto'                  => $bukti_nota,
            'user_id'               => $user_id
        );

        $where = array(
            'id' => $id
        );

        $this->session->set_flashdata('success', 'Data Berhasil di Ubah');

        $this->pengeluaran_model->saveModelPengeluaran($where, $data, 'pengeluaran');
        redirect('PengeluaranController/indexPengeluaran');
    }

    public function delPengeluaran($id)
    {
        $where = array('id' => $id);
        $this->pengeluaran_model->delModelPengeluaran($where, 'pengeluaran');

        $this->session->set_flashdata('warning', 'Data Berhasil di Hapus');

        redirect('PengeluaranController/indexPengeluaran');
    }

    public function detailPengeluaran($id)
    {
        $where                      = array('id' => $id);
        $data['pengeluaran']        = $this->pengeluaran_model->detailModelPengeluaran($where, 'pengeluaran')->result();

        $jns_pengeluaran            = $this->pengeluaran_model->get_jns_pengeluaran($id);
        $data['jns_pengeluaran']    = $jns_pengeluaran;

        $user                       = $this->pengeluaran_model->get_user($id);
        $data['user']               = $user;

        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/pengeluaran_detail', $data);
        $this->load->view('pemilik/master/footer', $data);
    }
}
