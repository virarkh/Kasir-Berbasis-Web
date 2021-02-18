<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisKendaraanController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('jeniskendaraan_model');
        $this->load->helper('url');

        if ($this->session->userdata('logged_in') != TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Anda Harus Login Terlebih Dahulu!</div>');
            redirect('AuthController');
        }
    }

    public function indexJK()
    {
        $data['jenis_kendaraan'] = $this->jeniskendaraan_model->indexJK();
        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/jenis_kendaraan', $data);
        $this->load->view('pemilik/master/footer', $data);
    }

    public function addJK()
    {
        $this->load->view('pemilik/master/header');
        $this->load->view('pemilik/master/sidebar');
        $this->load->view('pemilik/master/topbar');
        $this->load->view('pemilik/jenis_kendaraan_tambah');
        $this->load->view('pemilik/master/footer');
    }

    public function addDataJK()
    {
        $nama_kendaraan   = $this->input->post('nama_kendaraan');
        $tarif            = $this->input->post('tarif');

        $data = array(
            'nama_kendaraan'  => $nama_kendaraan,
            'tarif'           => $tarif
        );

        $this->session->set_flashdata('success', 'Data Berhasil di Tambah');

        $this->jeniskendaraan_model->addModelJK($data, 'jenis_kendaraan');
        redirect('JenisKendaraanController/indexJK');
    }

    public function editJK($id)
    {
        $where = array('id' => $id);
        $data['jenis_kendaraan'] = $this->jeniskendaraan_model->editModelJK($where, 'jenis_kendaraan')->result();
        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/jenis_kendaraan_edit', $data);
        $this->load->view('pemilik/master/footer', $data);
    }


    public function editDataJK()
    {
        $id              = $this->input->post('id');
        $nama_kendaraan  = $this->input->post('nama_kendaraan');
        $tarif           = $this->input->post('tarif');

        $data = array(
            'nama_kendaraan'  => $nama_kendaraan,
            'tarif'           => $tarif
        );

        $where      = array(
            'id'    => $id
        );

        $this->session->set_flashdata('success', 'Data Berhasil di Ubah');

        $this->jeniskendaraan_model->saveModelJK($where, $data, 'jenis_kendaraan');
        redirect('JenisKendaraanController/indexJK');
    }

    public function delJK($id)
    {
        $where = array('id' => $id);
        $this->jeniskendaraan_model->delModelJK($where, 'jenis_kendaraan');

        $this->session->set_flashdata('warning', 'Data Berhasil di Hapus');

        redirect('JenisKendaraanController/indexJK');
    }
}
