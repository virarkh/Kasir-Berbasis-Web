<?php

class jeniskendaraan_model extends CI_Model
{

    function indexJK()
    {
        return $this->db->get('jenis_kendaraan')->result();
    }

    function addModelJK($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function editModelJK($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function saveModelJK($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delModelJK($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
