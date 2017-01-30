<?php
class Images extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	//return all images, descending order by post date
	function all() {
		$this->db->order_by("id", "desc");
		$query = $this->db->get("images");
		return $query->result_array();
	}

	//return just the 3 newest images
	function newest() {
		$this->db->order_by("id", "desc");
		$this->db->limit(3);
		$query = $this->db->get('images');
		return $query->result_array();
	}
}