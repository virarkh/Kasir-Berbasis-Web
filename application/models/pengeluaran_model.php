<?php

class pengeluaran_model extends CI_Model
{

    public function index()
    {
        $this->db->select('pengeluaran.*, jenis_pengeluaran.nama_pengeluaran, user.nama_user');
        $this->db->from('pengeluaran');
        $this->db->join('jenis_pengeluaran', 'jenis_pengeluaran.id = pengeluaran.jns_pengeluaran_id');
        $this->db->join('user', 'user.id = pengeluaran.user_id');
        // $this->db->order_by($this->tanggal, 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function view_by_date($tgl_awal, $tgl_akhir)
    {
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);

        $this->db->select('pengeluaran.*, jenis_pengeluaran.nama_pengeluaran, user.nama_user');
        $this->db->from('pengeluaran');
        $this->db->join('jenis_pengeluaran', 'jenis_pengeluaran.id = pengeluaran.jns_pengeluaran_id');
        $this->db->join('user', 'user.id = pengeluaran.user_id');
        $this->db->where('DATE(tanggal) BETWEEN' . $tgl_awal . 'AND' . $tgl_akhir);
        $query = $this->db->get();
        return $query->result();
        // return $this->db->get('pengeluaran')->result();
    }

    // public function view_by_date($date)
    // {
    //     $this->db->where('DATE(tanggal)', $date);

    //     $this->db->select('pengeluaran.*, jenis_pengeluaran.nama_pengeluaran, user.nama_user');
    //     $this->db->from('pengeluaran');
    //     $this->db->join('jenis_pengeluaran', 'jenis_pengeluaran.id = pengeluaran.jns_pengeluaran_id');
    //     $this->db->join('user', 'user.id = pengeluaran.user_id');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    // public function view_by_month($date)
    // {
    //     $this->db->where('MONTH(tanggal)', $date);
    //     $this->db->where('YEAR(tanggal)', $date);

    //     $this->db->select('pengeluaran.*, jenis_pengeluaran.nama_pengeluaran, user.nama_user');
    //     $this->db->from('pengeluaran');
    //     $this->db->join('jenis_pengeluaran', 'jenis_pengeluaran.id = pengeluaran.jns_pengeluaran_id');
    //     $this->db->join('user', 'user.id = pengeluaran.user_id');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    // public function view_by_year($date)
    // {
    //     $this->db->where('YEAR(tanggal)', $date);

    //     $this->db->select('pengeluaran.*, jenis_pengeluaran.nama_pengeluaran, user.nama_user');
    //     $this->db->from('pengeluaran');
    //     $this->db->join('jenis_pengeluaran', 'jenis_pengeluaran.id = pengeluaran.jns_pengeluaran_id');
    //     $this->db->join('user', 'user.id = pengeluaran.user_id');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    // public function option_tahun()
    // {
    //     $this->db->where('YEAR(tanggal) AS Tahun');

    //     $this->db->select('pengeluaran.*, jenis_pengeluaran.nama_pengeluaran, user.nama_user');
    //     $this->db->from('pengeluaran');
    //     $this->db->join('jenis_pengeluaran', 'jenis_pengeluaran.id = pengeluaran.jns_pengeluaran_id');
    //     $this->db->join('user', 'user.id = pengeluaran.user_id');
    //     $this->db->order_by('YEAR(tanggal)');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    public function insert($data)
    {
        return $this->db->insert('pengeluaran', $data);
    }

    public function edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function Update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        // return $this->db->where('id', $id)->delete('pengeluaran');
    }

    public function get_jns_pengeluaran($id)
    {
        $this->db->select('*');
        $this->db->from('pengeluaran p');
        $this->db->join('jenis_pengeluaran jp', 'p.jns_pengeluaran_id=jp.id');
        $this->db->where('p.id', $id);
        return $this->db->get();
    }

    public function get_user($id)
    {
        $this->db->select('*');
        $this->db->from('pengeluaran p');
        $this->db->join('user u', 'p.user_id=u.id');
        $this->db->where('p.id', $id);
        return $this->db->get();
    }

    public function detail($where, $table)
    {

        return $this->db->get_where($table, $where);
    }
}
