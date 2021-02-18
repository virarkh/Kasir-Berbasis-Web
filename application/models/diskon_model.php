<?php

class diskon_model extends CI_Model
{
    function indexDiskon()
    {
        return $this->db->get('diskon')->result();
    }

    function addModelDiskon($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function editModelDiskon($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function saveModelDiskon($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delModelDiskon($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
