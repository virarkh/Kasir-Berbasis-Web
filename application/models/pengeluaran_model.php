<?php

class pengeluaran_model extends CI_Model{

    public function index()
    {
        // $this->db->select('pengeluaran.*', 'jenis_pengeluaran.nama');
        $this->db->select('*');
        $this->db->from('pengeluaran');
        $this->db->join('jenis_pengeluaran', 'jenis_pengeluaran.id = pengeluaran.jns_pengeluaran_id');
        // $this->db->order_by($this->tanggal, 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert($data)
    {
        return $this->db->insert('pengeluaran', $data);
    }

    public function get($id)
    {
        return $this->db->where('id', $id)->get('pengeluaran')->row();
    }

    public function Update($data, $id)
    {
        return $this->db->where('id', $id)->update('pengeluaran', $data);
    }

    public function delete($where)
    {
        $this->db->where($where);
        $this->db->delete('pengeluaran');
        return TRUE;
        // return $this->db->where('id', $id)->delete('pengeluaran');
    }

    // function insert($data, $table)
    // {
    //     $this->db->insert($table, $data);
    // }

    // function edit($where, $table)
    // {
    //     return $this->db->get_where($table, $where);
    // }

    // function edit_data($where, $data, $table)
    // {
    //     $this->db->where($where);
    //     $this->db->update($table, $data);
    // }

    // public function hapus_data($where, $table)
    // {
    //     $this->db->where($where);
    //     $this->db->delete($table);
    // }
    
}