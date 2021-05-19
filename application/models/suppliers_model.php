<?php

class suppliers_model extends CI_Model
{

  function indexModelSup() // menampilkan daftar supplier
  {
    return $this->db->get('suppliers')->result();
  }

  function addModelSup($data, $table) // proses tambah supplier
  {
    $this->db->insert($table, $data);
  }

  function editModelSup($where, $table) // mengambil data supplier yang di edit
  {
    return $this->db->get_where($table, $where);
  }

  function saveModelSup($where, $data, $table) // menyimpan data supplier
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }

  function delModelSup($where, $table) // hapus supplier
  {
    $this->db->where($where);
    $this->db->delete($table);
  }
}
