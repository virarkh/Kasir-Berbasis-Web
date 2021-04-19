<?php

class jenispengeluaran_model extends CI_Model
{

	function indexJP()
	{
		return $this->db->get('jenis_pengeluaran')->result();
	}

	function addModelJP($data, $table)
	{
		$this->db->insert($table, $data);
	}

	function editModelJP($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	function saveModelJP($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function delModelJP($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
