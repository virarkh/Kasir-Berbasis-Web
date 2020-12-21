<?php

class diskon_model extends CI_Model{
    function index(){
        return $this->db->get('diskon')->result();
    }

    function tambah_data($data, $table){
        $this->db->insert($table, $data);
    }

    function edit($where, $table){
        return $this->db->get_where($table, $where);
    }

    function edit_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}