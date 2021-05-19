<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{

	public function index()
	{
		$this->db->select('user.*, role.nama');
		$this->db->from('user');
		$this->db->join('role', 'role.id = user.role_id');
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get();
		return $result->result();
	}

	public function get($id = null)
	{
		$this->db->select('user.*, role.nama');
		$this->db->from('user');
		$this->db->join('role', 'role.id = user.role_id');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function sign_in($data)
	{
		return $this->db->insert("user", $data);
	}

	public function edit($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	function edit_data($where, $data, $table)
	{
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
		return $this->db->get_where($table, $where);
	}

	public function get_user_id($id)
	{
		$this->db->select('*');
		$this->db->from('user u');
		$this->db->join('role r', 'u.role_id = r.id');
		$this->db->where('u.id', $id);
		return $this->db->get();
	}
}
