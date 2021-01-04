<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisPengeluaranController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('jenispengeluaran_model');
        $this->load->helper('url');

        if ($this->session->userdata('logged_in') != TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Anda Harus Login Terlebih Dahulu!</div>');
            redirect('AuthController');
        }
    }

    public function index()
    {
        $data['jenis_pengeluaran'] = $this->jenispengeluaran_model->index();
        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/jenis_pengeluaran', $data);
        $this->load->view('pemilik/master/footer', $data);
    }

    public function tambah()
    {
        $this->load->view('pemilik/master/header');
        $this->load->view('pemilik/master/sidebar');
        $this->load->view('pemilik/master/topbar');
        $this->load->view('pemilik/jenis_pengeluaran_tambah');
        $this->load->view('pemilik/master/footer');
    }

    public function tambah_data()
    {
        $nama_pengeluaran   = $this->input->post('nama_pengeluaran');

        $data = array(
            'nama_pengeluaran'  => $nama_pengeluaran
        );

        $this->session->set_flashdata('success', 'Data Berhasil di Tambah');

        $this->jenispengeluaran_model->tambah_data($data, 'jenis_pengeluaran');
        redirect('JenisPengeluaranController/index');
    }

    public function edit($id)
    {
        $where          = array('id' => $id);
        $data['jenis_pengeluaran'] = $this->jenispengeluaran_model->edit($where, 'jenis_pengeluaran')->result();
        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/jenis_pengeluaran_edit', $data);
        $this->load->view('pemilik/master/footer', $data);
    }

    public function edit_data()
    {
        $id                 = $this->input->post('id');
        $nama_pengeluaran   = $this->input->post('nama_pengeluaran');

        $data = array(
            'nama_pengeluaran'  => $nama_pengeluaran
        );

        $where = array(
            'id' => $id
        );

        $this->session->set_flashdata('success', 'Data Berhasil di Ubah');

        $this->jenispengeluaran_model->edit_data($where, $data, 'jenis_pengeluaran');
        redirect('JenisPengeluaranController/index');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->jenispengeluaran_model->hapus_data($where, 'jenis_pengeluaran');

        $this->session->set_flashdata('warning', 'Data Berhasil di Hapus');

        redirect('JenisPengeluaranController/index');
    }
}
