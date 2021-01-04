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

    public function index()
    {
        $data['metode_mencuci'] = $this->metodecuci_model->index();
        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/metode_cuci', $data);
        $this->load->view('pemilik/master/footer', $data);
    }

    public function tambah()
    {
        $this->load->view('pemilik/master/header');
        $this->load->view('pemilik/master/sidebar');
        $this->load->view('pemilik/master/topbar');
        $this->load->view('pemilik/metode_cuci_tambah');
        $this->load->view('pemilik/master/footer');
    }

    public function tambah_data()
    {
        $nama_metode    = $this->input->post('nama_metode');
        $tarif_tambahan = $this->input->post('tarif_tambahan');

        $data = array(
            'nama_metode'    => $nama_metode,
            'tarif_tambahan' => $tarif_tambahan
        );

        $this->session->set_flashdata('success', 'Data Berhasil di Tambah');

        $this->metodecuci_model->tambah_data($data, 'metode_mencuci');
        redirect('MetodeController/index');
    }

    public function edit($id)
    {
        $where                  = array('id' => $id);
        $data['metode_mencuci'] = $this->metodecuci_model->edit($where, 'metode_mencuci')->result();
        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/metode_cuci_edit', $data);
        $this->load->view('pemilik/master/footer', $data);
    }

    public function edit_data()
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

        $this->metodecuci_model->edit_data($where, $data, 'metode_mencuci');
        redirect('MetodeController/index');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->metodecuci_model->hapus_data($where, 'metode_mencuci');

        $this->session->set_flashdata('warning', 'Data Berhasil di Hapus');

        redirect('MetodeController/index');
    }
}
