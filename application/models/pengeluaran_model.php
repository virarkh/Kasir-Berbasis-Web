<?php

class pengeluaran_model extends CI_Model
{
  public function indexPengeluaran() // index pengeluaran
  {
    $this->db->select('pengeluaran.*, suppliers.nama_suppliers, user.nama_user');
    $this->db->from('pengeluaran');
    $this->db->join('suppliers', 'suppliers.id = pengeluaran.id_suppliers');
    $this->db->join('user', 'user.id = pengeluaran.user_id');
    $this->db->order_by('tanggal', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function indexCetak() //proses cetak laporan
  {
    $this->db->select('detail_pengeluaran.*, pengeluaran.*, suppliers.*, user.*');
    $this->db->from('detail_pengeluaran');
    $this->db->join('pengeluaran', 'pengeluaran.id = detail_pengeluaran.id_pengeluaran');
    $this->db->join('suppliers', 'suppliers.id=pengeluaran.id_suppliers');
    $this->db->join('user', 'user.id=pengeluaran.user_id');
    $this->db->order_by('tanggal');
    $query = $this->db->get();
    return $query->result();
  }

  public function view_by_date($tgl_awal, $tgl_akhir) // proses filter tanggal
  {
    $tgl_awal = $this->db->escape($tgl_awal);
    $tgl_akhir = $this->db->escape($tgl_akhir);

    $this->db->select('detail_pengeluaran.*, pengeluaran.*, suppliers.*, user.*');
    $this->db->from('detail_pengeluaran');
    $this->db->join('pengeluaran', 'pengeluaran.id = detail_pengeluaran.id_pengeluaran');
    $this->db->join('suppliers', 'suppliers.id=pengeluaran.id_suppliers');
    $this->db->join('user', 'user.id=pengeluaran.user_id');
    $this->db->where('DATE(tanggal) BETWEEN' . $tgl_awal . 'AND' . $tgl_akhir);
    $this->db->order_by('tanggal');
    $query = $this->db->get();
    return $query->result();
  }

  public function addModelPengeluaran($data) // insert pengeluaran
  {
    return $this->db->insert('pengeluaran', $data);

    // $this->db->insert('pengeluaran', $data);
    // $id = $this->db->insert_id();
    // redirect('DetailPengeluaran/itemPengeluaran/' . $id);
  }

  public function delModelPengeluaran($where, $table) // delete pengeluaran
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

  public function detailModelPengeluaran($id = 0) // detail tabel pengeluaran 
  {
    $this->db->select('pengeluaran.*, suppliers.nama_suppliers, user.nama_user');
    $this->db->from('pengeluaran');
    $this->db->join('suppliers', 'suppliers.id=pengeluaran.id_suppliers');
    $this->db->join('user', 'user.id=pengeluaran.user_id');
    if ($id != null) {
      $this->db->where('pengeluaran.id', $id);
    }
    return $this->db->get();
  }

  public function detailModelRinci($id) // detail tabel detail_pengeluaran
  {
    $this->db->select('detail_pengeluaran.*, pengeluaran.*');
    $this->db->from('detail_pengeluaran');
    $this->db->join('pengeluaran', 'pengeluaran.id=detail_pengeluaran.id_pengeluaran');
    $this->db->where('id_pengeluaran', $id);
    return $this->db->get();
  }

  public function get_suppliers($id) // get daftar supplier
  {
    $this->db->select('*');
    $this->db->from('pengeluaran p');
    $this->db->join('suppliers s', 'p.id_suppliers=s.id');
    $this->db->where('p.id', $id);
    return $this->db->get();
  }

  public function get_user($id) // get daftar user
  {
    $this->db->select('*');
    $this->db->from('pengeluaran p');
    $this->db->join('user u', 'p.user_id=u.id');
    $this->db->where('p.id', $id);
    return $this->db->get();
  }

  public function editModelPengeluaran($where, $table) // X->CANCEL
  {
    return $this->db->get_where($table, $where);
  }

  public function saveModelPengeluaran($where, $data, $table) // X->CANCEL
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }

  public function get_detail($id) // X->CANCEL
  {
    $this->db->select('detail_pengeluaran.*, pengeluaran.*');
    $this->db->from('detail_pengeluaran dp');
    $this->db->join('pengeluaran p', 'p.id=dp.id_pengeluaran');
    $this->db->where('id_pengeluaran', $id);
    return $this->db->get();
  }

  public function detail($id) // X->CANCEL
  {
    $this->db->select('pengeluaran.*, suppliers.nama_suppliers, user.nama_user');
    $this->db->from('pengeluaran');
    $this->db->join('suppliers', 'suppliers.id=pengeluaran.id_suppliers');
    $this->db->join('user', 'user.id=pengeluaran.user_id');
    $this->db->where('pengeluaran.id', $id);
    $this->db->order_by('pengeluaran.id', 'DESC');
    $this->db->limit(1);
    return $this->db->get();
  }

  public function get_id($key = null, $value = null) // X->CANCEL
  {
    return $this->db->get_where('pengeluaran', array($key => $value))->row();
  }
}
