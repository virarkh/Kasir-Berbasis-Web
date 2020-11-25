<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DiskonController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('diskon_model');
        $this->load->helper('url');
    }

	public function index()
	{
        // $this->load->view('pemilik/master/index');
        $data['diskon'] = $this->diskon_model->index()->result();
        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/diskon', $data);
        $this->load->view('pemilik/master/footer', $data);
    }

    public function tambah()
    {
        $this->load->view('pemilik/master/header');
        $this->load->view('pemilik/master/sidebar');
        $this->load->view('pemilik/master/topbar');
        $this->load->view('pemilik/diskon_tambah');
        $this->load->view('pemilik/master/footer');
    }

    public function tambah_data()
    {
        $nama_diskon    = $this->input->post('nama_diskon');
        $potongan_harga = $this->input->post('potongan_harga');

        $data = array(
            'nama_diskon'       => $nama_diskon,
            'potongan_harga'    => $potongan_harga
        );
        $this->diskon_model->tambah_data($data, 'diskon');
        redirect('DiskonController/index');
    }

    public function edit($id){
        $where          = array('id' => $id);
        $data['diskon'] = $this->diskon_model->edit($where, 'diskon')->result();
        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/diskon_edit', $data);
        $this->load->view('pemilik/master/footer', $data);
    }

    public function edit_data(){
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

        $this->diskon_model->edit_data($where, $data, 'diskon');
        redirect('DiskonController/index');
    }

    public function hapus($id){
        $where = array('id' => $id);
        $this->diskon_model->hapus_data($where, 'diskon');
        redirect('DiskonController/index');
    }
    

}