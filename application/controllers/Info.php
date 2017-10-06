<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends  Application
{

	function __construct()
	{
		parent::__construct();
	}

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

		
		if($page == 'home'){
			
			$this->data['pagebody'] = 'home';
			
					// build the list of authors, to pass on to our view
					$source = $this->quotes->all();
			
					// pass on the data to present, as the "authors" view parameter
					$this->data['table'] = $source;
			
					$this->render();
			
		}else {
			$this->data['pagebody'] = $page;
			$key = $page;
			$source = $this->quotes->get($key);
			$this->data['table'] = $source;
			$this->data = array_merge($this->data, (array) $source);
			$this->render();

		}
		
	}

}

?>