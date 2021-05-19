<?php

class diskon_model extends CI_Model
{
	function indexDiskon() // index diskon
	{
		return $this->db->get('diskon')->result();
	}

	function addModelDiskon($data, $table) //proses add diskon
	{
		$this->db->insert($table, $data);
	}

	function editModelDiskon($where, $table) // get edit diskon
	{
		return $this->db->get_where($table, $where);
	}

	function saveModelDiskon($where, $data, $table) //proses edit
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function delModelDiskon($where, $table) //delete diskon
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
