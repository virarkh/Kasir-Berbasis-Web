<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengeluaranController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('pengeluaran_model');
        $this->load->model('jenispengeluaran_model');
        $this->load->helper(array('url', 'form'));
    }
	
	public function index()
	{
        $data['pengeluaran'] = $this->pengeluaran_model->index();
        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/pengeluaran', $data);
        $this->load->view('pemilik/master/footer', $data);
    }
    
    public function tambahData()
    {
        $data['jenis_pengeluaran'] = $this->jenispengeluaran_model->index();
        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/pengeluaran_tambah', $data, array('error'=>''));
        $this->load->view('pemilik/master/footer', $data);
    }

    public function simpanData()
    {
        
        $tanggal            = $this->input->post('tanggal');
        $nama_pengeluaran   = $this->input->post('nama_pengeluaran');
        $biaya              = $this->input->post('biaya');
        $detail             = $this->input->post('detail');
        // $foto       = $this->input->post('foto');


        $data = array(
            'tanggal'            => $tanggal, 
            'jns_pengeluaran_id' => $nama_pengeluaran,
            'biaya'              => $biaya,
            'detail'             => $detail,
            // 'foto'      => $foto
        );

        $this->pengeluaran_model->insert($data);
        redirect('PengeluaranController/index');
    }

    public function edit($id)
    {
        // $where = array('id'=>$id);
        $data['jenis_pengeluaran']  = $this->jenispengeluaran_model->index();
        $data['pengeluaran'] = $this->pengeluaran_model->get($id);
        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/pengeluaran_edit', $data);
        $this->load->view('pemilik/master/footer', $data);
    }

    public function edit_data()
    {
        $id = $this->input->post('id');
        $tanggal = $this->input->post('tanggal');
        $biaya = $this->input->post('biaya');
        $detail = $this->input->post('detail');
        $nama_pengeluaran = $this->input->post('nama_pengeluaran');
        
        $data = array(
            'tanggal' => $tanggal,
            'biaya' => $biaya,
            'detail' => $detail,
            'jns_pengeluaran_id' => $nama_pengeluaran
        );

        // $where = array(
        //     'id' =>$id
        // );

        // $this->pengeluaran_model->edit_data($where, $data, 'pengeluaran');
        $this->pengeluaran_model->update($data, $id);
        redirect('PengeluaranController/index');
    }
    
    public function delete($id)
    {
        // $where = array('id'=>$id);
        // $this->pengeluaran_model->hapus_data($where, 'pengeluaran');
        $this->pengeluaran_model->delete($id);
        redirect('PengeluaranController/index');
    }

    public function detail()
    {
        $this->load->view('pemilik/master/header');
        $this->load->view('pemilik/master/sidebar');
        $this->load->view('pemilik/master/topbar');
        $this->load->view('pemilik/pengeluaran_detail');
        $this->load->view('pemilik/master/footer');
    }


}

