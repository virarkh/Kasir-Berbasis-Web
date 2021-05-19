<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuppliersController extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('suppliers_model');
    $this->load->helper('url');

    if ($this->session->userdata('logged_in') != TRUE) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Anda Harus Login Terlebih Dahulu!</div>');
      redirect('AuthController');
    }
  }

  public function indexSup() // index Supplier
  {
    $data['suppliers'] = $this->suppliers_model->indexModelSup();
    $this->load->view('pemilik/master/header', $data);
    $this->load->view('pemilik/master/sidebar', $data);
    $this->load->view('pemilik/master/topbar', $data);
    $this->load->view('pemilik/suppliers', $data);
    $this->load->view('pemilik/master/footer', $data);
  }

  public function addSup() // form tambah supplier
  {
    $this->load->view('pemilik/master/header');
    $this->load->view('pemilik/master/sidebar');
    $this->load->view('pemilik/master/topbar');
    $this->load->view('pemilik/suppliers_tambah');
    $this->load->view('pemilik/master/footer');
  }

  public function addDataSup() // proses tambah supplier
  {
    $nama_suppliers   = $this->input->post('nama_suppliers');

    $data = array(
      'nama_suppliers'  => $nama_suppliers
    );

    $this->session->set_flashdata('success', 'Data Berhasil di Tambah');

    $this->suppliers_model->addModelSup($data, 'suppliers');
    redirect('SuppliersController/indexSup');
  }

  public function editSup($id) // form edit supplier
  {
    $where          = array('id' => $id);
    $data['suppliers'] = $this->suppliers_model->editModelSup($where, 'suppliers')->result();
    $this->load->view('pemilik/master/header', $data);
    $this->load->view('pemilik/master/sidebar', $data);
    $this->load->view('pemilik/master/topbar', $data);
    $this->load->view('pemilik/suppliers_edit', $data);
    $this->load->view('pemilik/master/footer', $data);
  }

  public function editDataSup() // proses edit supplier
  {
    $id             = $this->input->post('id');
    $nama_suppliers = $this->input->post('nama_suppliers');

    $data = array(
      'nama_suppliers'  => $nama_suppliers
    );

    $where = array(
      'id' => $id
    );

    $this->session->set_flashdata('success', 'Data Berhasil di Ubah');

    $this->suppliers_model->saveModelSup($where, $data, 'suppliers');
    redirect('SuppliersController/indexSup');
  }

  public function delSup($id) // proses hapus supplier
  {
    $where = array('id' => $id);
    $this->suppliers_model->delModelSup($where, 'suppliers');

    $error = $this->db->error();
    if ($error['code'] != 0) {
      $this->session->set_flashdata('warning', 'Data Tidak Dapat di Hapus');
    } else {
      $this->session->set_flashdata('success', 'Data Berhasil di Hapus');
    }

    redirect('SuppliersController/indexSup');
  }
}
