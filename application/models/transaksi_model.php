<?php 

class transaksi_model extends CI_Model
{

    public function index(){
        $this->db->select('transaksi.*, jenis_kendaraan.nama_kendaraan, diskon.nama_diskon, metode_mencuci.nama_metode, user.nama_user');
        $this->db->from('transaksi');
        $this->db->join('diskon', 'diskon.id=transaksi.diskon_id');
        $this->db->join('jenis_kendaraan', 'jenis_kendaraan.id=transaksi.jenis_id');
        $this->db->join('metode_mencuci', 'metode_mencuci.id=transaksi.metode_id');
        $this->db->join('user', 'user.id=transaksi.user_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function simpanData($data){
        return $this->db->insert('transaksi', $data);
    }

}