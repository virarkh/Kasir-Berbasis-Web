<?php

class detail_model extends CI_Model
{
  public function all_detail() // proses indexDetail
  {
    $this->db->select('detail_pengeluaran.*, pengeluaran.kode');
    $this->db->from('detail_pengeluaran');
    $this->db->join('pengeluaran', 'detail_pengeluaran.id_pengeluaran=pengeluaran.id');
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function get_detail() // index pengeluaran berdasarkan id
  {
    $sql = "SELECT detail_pengeluaran.*, pengeluaran.kode FROM pengeluaran JOIN detail_pengeluaran ON detail_pengeluaran.id_pengeluaran = pengeluaran.id WHERE pengeluaran.id IN (SELECT MAX(pengeluaran.id) FROM pengeluaran) order by detail_pengeluaran.id DESC";
    $query = $this->db->query($sql);
    // $query = $this->db->get();
    return $query->result();
  }

  public function get_pengeluaran() // mengambil id terakhir di tabel pengeluaran 
  {
    $this->db->select('pengeluaran.*');
    $this->db->from('pengeluaran');
    $this->db->order_by('id', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->result();
  }

  public function addModelItem($data) // proses add item
  {
    return $this->db->insert('detail_pengeluaran', $data);
  }

  public function delModelItem($where, $table) // proses delete berdasarkan id pengeluaran terakhir
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

  public function delModelAll($where, $table) // proses delete Grand
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

  public function editModelDetail($where, $table) // get edit item grand
  {
    return $this->db->get_where($table, $where);
  }

  public function saveModelDetail($where, $data, $table) // proses edit item grand
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }
}
