<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {

    public function index()
    {
        $this->db->select('user.*, role.nama');
        $this->db->from('user');
        $this->db->join('role', 'role.id = user.role_id');
        $result = $this->db->get();
        return $result->result();
    }


    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('role', 'role.id = user.role_id');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $result = $this->db->get();
        return $result;
    }

    public function sign_in($data)
    {
        return $this->db->insert("user", $data);
    }

    public function edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function edit_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function detail_profil($where, $table)
    {
        // $this->db->select('user.*, role.nama');
        // $this->db->from('user');
        // $this->db->join('role', 'role.id = user.role_id');
        // $result = $this->db->get_where($table, $where);
        // return $result;

        return $this->db->get_where($table, $where);

        // $this->db->where('id', $id);
        // $query = $this->db->get('user');
        // return $query->row_array();
    }


}