<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends  Application
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/
	 * 	- or -
	 * 		http://example.com/welcome/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function view($page = 'home')
	{
		$this->load->view('template/header');
		$this->load->view('pages/'.$page);
		$this->load->view('template/footer');
	}

}

?>