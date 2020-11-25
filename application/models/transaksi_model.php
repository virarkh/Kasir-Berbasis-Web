<?php 

class transaksi_model extends CI_Model
{
    public function index(){
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('diskon', 'diskon.id=transaksi.diskon_id');
        $this->db->join('jenis_kendaraan', 'jenis_kendaraan.id=transaksi.jenis_id');
        $this->db->join('metode_mencuci', 'metode_mencuci.id=transaksi.metode_id');
        $query = $this->db->get();
        return $query->result();
    }

    
 
}