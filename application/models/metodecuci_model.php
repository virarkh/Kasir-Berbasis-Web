<?php

class metodecuci_model extends CI_Model
{

	function indexMM()
	{
		return $this->db->get('metode_mencuci')->result();
	}

	function addModelMM($data, $table)
	{
		$this->db->insert($table, $data);
	}

	function editModelMM($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	function saveModelMM($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function delModelMM($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
