<?php

class metodecuci_model extends CI_Model
{

	function indexMM() // index metode
	{
		return $this->db->get('metode_mencuci')->result();
	}

	function addModelMM($data, $table) // insert metode
	{
		$this->db->insert($table, $data);
	}

	function editModelMM($where, $table) // get form edit 
	{
		return $this->db->get_where($table, $where);
	}

	function saveModelMM($where, $data, $table) // proses edit
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function delModelMM($where, $table) // delete metode
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
