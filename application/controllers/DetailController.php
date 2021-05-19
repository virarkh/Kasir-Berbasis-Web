<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailController extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('detail_model');
    $this->load->model('pengeluaran_model');
    $this->load->helper('url');

    if ($this->session->userdata('logged_in') != TRUE) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Anda Harus Login Terlebih Dahulu!</div>');
      redirect('AuthController');
    }
  }

  public function indexDetail() // index item pengeluaran
  {
    $data['detail_pengeluaran']   = $this->detail_model->all_detail();

    $this->load->view('pemilik/master/header', $data);
    $this->load->view('pemilik/master/sidebar', $data);
    $this->load->view('pemilik/master/topbar', $data);
    $this->load->view('pemilik/item', $data);
    $this->load->view('pemilik/master/footer', $data);
  }

  public function itemPengeluaran() // index item pengeluaran berdasarkan id
  {
    $data['pengeluaran']        = $this->detail_model->get_pengeluaran();
    $data['detail_pengeluaran'] = $this->detail_model->get_detail();

    $this->load->view('pemilik/master/header', $data);
    $this->load->view('pemilik/master/sidebar', $data);
    $this->load->view('pemilik/master/topbar', $data);
    $this->load->view('pemilik/pengeluaran_item', $data);
    $this->load->view('pemilik/master/footer', $data);
  }

  public function addItem() // proses tambah item pengeluaran berdasarkan id
  {
    $data = [
      'id_pengeluaran'  => $this->input->post('id_pengeluaran'),
      'item'            => $this->input->post('item'),
      'harga'           => $this->input->post('harga')
    ];

    $this->session->set_flashdata('success', 'Data Berhasil di Tambah');

    $this->detail_model->addModelItem($data);
    redirect('DetailController/itemPengeluaran', $data);
  }

  public function editItem($id) // form edit item pengeluaran
  {
    $where    = array('id' => $id);
    $data['detail_pengeluaran'] = $this->detail_model->editModelDetail($where, 'detail_pengeluaran')->result();

    $this->load->view('pemilik/master/header', $data);
    $this->load->view('pemilik/master/sidebar', $data);
    $this->load->view('pemilik/master/topbar', $data);
    $this->load->view('pemilik/item_edit', $data);
    $this->load->view('pemilik/master/footer', $data);
  }

  public function editDataItem() // proses edit item pengeluaran
  {
    $id             = $this->input->post('id');
    $id_pengeluaran = $this->input->post('id_pengeluaran');
    $item           = $this->input->post('item');
    $harga          = $this->input->post('harga');

    $data = array(
      'id_pengeluaran'  => $id_pengeluaran,
      'item'            => $item,
      'harga'           => $harga
    );

    $where = array(
      'id'  => $id
    );

    $this->session->set_flashdata('success', 'Data Berhasil di Ubah');

    $this->detail_model->saveModelDetail($where, $data, 'detail_pengeluaran');
    redirect('DetailController/indexDetail');
  }

  public function delItem($id) // proses delete berdasarkan id 
  {
    $where = array('id' => $id);
    $this->detail_model->delModelItem($where, 'detail_pengeluaran');
    $error = $this->db->error();
    if ($error['code'] != 0) {
      $this->session->set_flashdata('warning', 'Data Tidak Dapat di Hapus');
    } else {
      $this->session->set_flashdata('success', 'Data Berhasil di Hapus');
    }
    redirect('DetailController/itemPengeluaran');
  }

  public function delAll($id) // proses delete semua 
  {
    $where = array('id' => $id);
    $this->detail_model->delModelAll($where, 'detail_pengeluaran');
    $error = $this->db->error();
    if ($error['code'] != 0) {
      $this->session->set_flashdata('warning', 'Data Tidak Dapat di Hapus');
    } else {
      $this->session->set_flashdata('success', 'Data Berhasil di Hapus');
    }
    redirect('DetailController/indexDetail');
  }
}
