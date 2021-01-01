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
            $this->session->set_flashdata('notif', 'Anda harus login dulu');
            redirect('AuthController');
        }
    }

    public function index()
    {
        $data['jenis_kendaraan'] = $this->jeniskendaraan_model->index();
        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/jenis_kendaraan', $data);
        $this->load->view('pemilik/master/footer', $data);
    }

    public function tambah()
    {
        $this->load->view('pemilik/master/header');
        $this->load->view('pemilik/master/sidebar');
        $this->load->view('pemilik/master/topbar');
        $this->load->view('pemilik/jenis_kendaraan_tambah');
        $this->load->view('pemilik/master/footer');
    }

    public function tambah_data()
    {
        $nama_kendaraan   = $this->input->post('nama_kendaraan');
        $tarif            = $this->input->post('tarif');

        $data = array(
            'nama_kendaraan'  => $nama_kendaraan,
            'tarif'           => $tarif
        );

        $this->session->set_flashdata('success', 'Data Berhasil di Tambah');

        $this->jeniskendaraan_model->tambah_data($data, 'jenis_kendaraan');
        redirect('JenisKendaraanController/index');
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data['jenis_kendaraan'] = $this->jeniskendaraan_model->edit($where, 'jenis_kendaraan')->result();
        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/jenis_kendaraan_edit', $data);
        $this->load->view('pemilik/master/footer', $data);
    }


    public function edit_data()
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

        $this->jeniskendaraan_model->edit_data($where, $data, 'jenis_kendaraan');
        redirect('JenisKendaraanController/index');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->jeniskendaraan_model->hapus_data($where, 'jenis_kendaraan');

        $this->session->set_flashdata('warning', 'Data Berhasil di Hapus');

        redirect('JenisKendaraanController/index');
    }
}
