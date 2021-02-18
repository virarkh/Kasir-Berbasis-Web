<?php

class dashboard_model extends CI_Model
{
    public function jumlah_pegawai()
    {
        // $query = $this->db->get('user');
        $this->db->from('user');
        $this->db->where('role_id=1');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function jumlah_owner()
    {
        // $query = $this->db->get('user');
        $this->db->from('user');
        $this->db->where('role_id=2');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function jumlah_pengeluaran()
    {
        $query = $this->db->get('pengeluaran');
        return $query->num_rows();
    }

    public function jumlah_transaksi()
    {
        $query = $this->db->get('transaksi');
        return $query->num_rows();
    }
}
