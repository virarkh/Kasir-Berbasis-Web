<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DiskonController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('diskon_model');
        $this->load->helper('url');
        $this->load->library('session');

        if ($this->session->userdata('logged_in') != TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Anda Harus Login Terlebih Dahulu!</div>');
            redirect('AuthController');
        }
    }

    public function indexDiskon()
    {
        $data['diskon'] = $this->diskon_model->indexDiskon();
        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/diskon', $data);
        $this->load->view('pemilik/master/footer', $data);
    }

    public function addDiskon()
    {
        $this->load->view('pemilik/master/header');
        $this->load->view('pemilik/master/sidebar');
        $this->load->view('pemilik/master/topbar');
        $this->load->view('pemilik/diskon_tambah');
        $this->load->view('pemilik/master/footer');
    }

    public function addDataDiskon()
    {
        $nama_diskon    = $this->input->post('nama_diskon');
        $potongan_harga = $this->input->post('potongan_harga');

        $data = array(
            'nama_diskon'       => $nama_diskon,
            'potongan_harga'    => $potongan_harga
        );
        $this->session->set_flashdata('success', 'Data Berhasil di Tambah');

        $this->diskon_model->addModelDiskon($data, 'diskon');
        redirect('DiskonController/indexDiskon');
    }

    public function editDiskon($id)
    {
        $where          = array('id' => $id);
        $data['diskon'] = $this->diskon_model->editModelDiskon($where, 'diskon')->result();
        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/diskon_edit', $data);
        $this->load->view('pemilik/master/footer', $data);
    }

    public function editDataDiskon()
    {
        $id             = $this->input->post('id');
        $nama_diskon    = $this->input->post('nama_diskon');
        $potongan_harga = $this->input->post('potongan_harga');

        $data = array(
            'nama_diskon'       => $nama_diskon,
            'potongan_harga'    => $potongan_harga
        );

        $where      = array(
            'id'    => $id
        );

        $this->session->set_flashdata('success', 'Data Berhasil di Ubah');

        $this->diskon_model->saveModelDiskon($where, $data, 'diskon');
        redirect('DiskonController/indexDiskon');
    }

    public function delDiskon($id)
    {
        $where = array('id' => $id);
        $this->diskon_model->delModelDiskon($where, 'diskon');

        $this->session->set_flashdata('warning', 'Data Berhasil di Hapus');

        redirect('DiskonController/indexDiskon');
    }
}
