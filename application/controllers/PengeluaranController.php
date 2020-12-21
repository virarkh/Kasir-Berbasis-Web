<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengeluaranController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('pengeluaran_model');
        $this->load->model('jenispengeluaran_model');
        $this->load->model('user_model');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->library('session');

        if($this->session->userdata('logged_in') != TRUE){
            $notif = "<div class='alert-warning'>Anda harus login dulu</div>";
            $this->session->set_flashdata('notif', $notif);
            redirect('AuthController');
        }
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
        $data['jenis_pengeluaran']  = $this->jenispengeluaran_model->index();
        $data['user']               = $this->user_model->index();

        // $user           = $this->pengeluaran_model->get_user();
        // $data['user']   = $user;

        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/pengeluaran_tambah', $data, array('error'=>''));
        $this->load->view('pemilik/master/footer', $data);
    }

    public function simpanData()
    {
        $config = array(
            'upload_path'	=> './assets/nota',
			'allowed_types'	=> 'jpg|jpeg|png',
			'max_size'		=> '2086'
        );

        $this->load->library('upload', $config);

        $this->upload->do_upload('foto');
        $info       = $this->upload->data();
        $bukti_nota = $info['file_name'];
        
        $tanggal            = $this->input->post('tanggal');
        $nama_pengeluaran   = $this->input->post('nama_pengeluaran');
        $biaya              = $this->input->post('biaya');
        $detail             = $this->input->post('detail');
        $user_id            = $this->input->post('user_id');
        // $user_id            = $this->session->userdata('user_id');


        $data = array(
            'tanggal'            => $tanggal, 
            'jns_pengeluaran_id' => $nama_pengeluaran,
            'biaya'              => $biaya,
            'detail'             => $detail,
            'foto'               => $bukti_nota,
            'user_id'            => $user_id
        );

        $this->pengeluaran_model->insert($data);
        redirect('PengeluaranController/index');
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data['jenis_pengeluaran']  = $this->jenispengeluaran_model->index();
        $data['user']               = $this->user_model->index();
        $data['pengeluaran']        = $this->pengeluaran_model->edit($where, 'pengeluaran')->result();
        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/pengeluaran_edit', $data);
        $this->load->view('pemilik/master/footer', $data);
    }

    public function edit_data()
    {
        $id = $this->input->post('id');

        $config = array(
			'upload_path'	=> './assets/nota',
			'allowed_types'	=> 'jpg|jpeg|png',
			'max_size'		=> '2086'
		);

        $this->load->library('upload', $config);

        $this->upload->do_upload('foto');
        $info       = $this->upload->data();
        $bukti_nota = $info['file_name'];

        $tanggal            = $this->input->post('tanggal');
        $biaya              = $this->input->post('biaya');
        $detail             = $this->input->post('detail');
        $nama_pengeluaran   = $this->input->post('nama_pengeluaran');
        $user_id            = $this->input->post('user_id');
        
        $data = array(
            'tanggal'               => $tanggal,
            'biaya'                 => $biaya,
            'detail'                => $detail,
            'jns_pengeluaran_id'    => $nama_pengeluaran,
            'foto'                  => $bukti_nota,
            'user_id'               => $user_id
        );

        $where = array(
            'id' =>$id
        );

        // $this->pengeluaran_model->edit_data($where, $data, 'pengeluaran');
        $this->pengeluaran_model->update($where, $data, 'pengeluaran');
        redirect('PengeluaranController/index');
    }
    
    public function delete($id)
    {
        $where = array('id' => $id);
        $this->pengeluaran_model->delete($where, 'pengeluaran');
        redirect('PengeluaranController/index');
    }

    public function detail($id)
    {
        $where                      = array('id' => $id);
        $data['pengeluaran']        = $this->pengeluaran_model->detail($where, 'pengeluaran')->result();
        
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

