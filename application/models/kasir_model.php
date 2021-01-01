<?php

class kasir_model extends CI_Model
{
    public function index()
    {
        // $this->db->select('transaksi.*, jenis_kendaraan.*, diskon.*, metode_mencuci.*, user.*');
        $this->db->select('t.*, jk.nama_kendaraan, jk.tarif, mm.tarif_tambahan, mm.nama_metode, d.nama_diskon, d.potongan_harga, u.nama_user, u.username');
        $this->db->from('transaksi t');
        $this->db->join('diskon d', 'd.id=t.diskon_id');
        $this->db->join('jenis_kendaraan jk', 'jk.id=t.jenis_id');
        $this->db->join('metode_mencuci mm', 'mm.id=t.metode_id');
        $this->db->join('user u', 'u.id=t.user_id');
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function view_by_date($tgl_awal, $tgl_akhir)
    {
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);

        $this->db->select('transaksi.*, jenis_kendaraan.*, diskon.*, metode_mencuci.*, user.*');
        $this->db->from('transaksi');
        $this->db->join('diskon', 'diskon.id=transaksi.diskon_id');
        $this->db->join('jenis_kendaraan', 'jenis_kendaraan.id=transaksi.jenis_id');
        $this->db->join('metode_mencuci', 'metode_mencuci.id=transaksi.metode_id');
        $this->db->join('user', 'user.id=transaksi.user_id');
        $this->db->where('DATE(tanggal) BETWEEN' . $tgl_awal . 'AND' . $tgl_akhir);
        $this->db->order_by('tanggal', 'ASC');
        $query = $this->db->get();
        return $query->result();
        // return $this->db->get('pengeluaran')->result();
    }

    public function tambah_data()
    {
        $sql = "SELECT MAX(MID(invoice,9,4)) AS invoice_no FROM transaksi WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int)$row->invoice_no) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $invoice = "CS" . date('ymd') . $no;
        return $invoice;
    }

    public function get_jns_kendaraan($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi t');
        $this->db->join('jenis_kendaraan jk', 't.jenis_id=jk.id');
        $this->db->where('t.id', $id);
        return $this->db->get();
    }

    public function get_met_cuci($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi t');
        $this->db->join('metode_mencuci mm', 't.metode_id=mm.id');
        $this->db->where('t.id', $id);
        return $this->db->get();
    }

    public function get_diskon($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi t');
        $this->db->join('diskon d', 't.diskon_id=d.id');
        $this->db->where('t.id', $id);
        return $this->db->get();
    }

    public function get_user($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi t');
        $this->db->join('user u', 't.user_id=u.id');
        $this->db->where('t.id', $id);
        return $this->db->get();
    }

    public function detail($where, $table)
    {

        return $this->db->get_where($table, $where);
    }
}
