<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{

	public function index()
	{
		$this->db->select('user.*, role.nama');
		$this->db->from('user');
		$this->db->join('role', 'role.id = user.role_id');
		$result = $this->db->get();
		return $result->result();
	}

	public function login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}


	// public function login($username, $password)
	// {

	// MODEL SUKSES

	//     $this->db->select('*');
	//     $this->db->from('user');
	//     $this->db->join('role', 'role.id = user.role_id');
	//     $this->db->where('username', $username);
	//     $this->db->where('password', $password);
	//     $result = $this->db->get();
	//     return $result;
	// }

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

	// public function hapus_data($id)
	// {
	//     $row = $this->db->where('id', $id)->get('foto_profil')->row();
	//     unlink('./assets/profil/' . $row->foto_profil);
	//     $this->db->where('id', $id);
	//     $this->db->delete($this->table);
	//     return true;
	// }

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
