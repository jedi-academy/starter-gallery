<?php
class Images extends CI_Model {
	// constructor (a good practice)
	function __construct()
	{
		parent::__construct();
	}
	// return all images by desc post date order
	function all()
	{
		$this->db->order_by("id", "desc");
		$query = $this->db->get('images');
		return $query->result_array();
	}
	// return just the 3 newest images.
	function newest()
	{
		$this->db->order_by("id", "desc");
		$this->db->limit(3);
		$query = $this->db->get('images');
		return $query->result_array();
	}
}