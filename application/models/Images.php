<?php

class Images extends CI_Model {
	//constructor
	function _construct()
	{
		parent::__construct();
	}
	
	//returns all images
	function all() {
		$this->db->order_by("id", "desc");
		$query = $this->db->get('images');
		return $query->result_array();
	}
	
	//return 3 newest images
	function newest() {
		$this->db->order_by("id", "desc");
		$this->db->limit(3);
		$query = $this->db->get('images');
		return $query->result_array();
	}
}