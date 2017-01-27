<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{
	//Index Page for this controller.
	public function index()
	{

		//get newest images from model
		$pix = $this->images->newest();

		//build array of formatted cells
		foreach($pix as $picture) 
			$cells[] = $this->parser->parse('_cell', (array) $picture, true);

		$this->load->library('table');

		//prime table class
		$parms = array(
			'table_open' => '<table class="gallery">',
			'cell_start' => '<td class="oneimage">',
			'cell_alt_start' => '<td class="oneimage">'
		);

		$this->table->set_template($parms);

		$rows = $this->table->make_columns($cells, 3);
		$this->data['thetable'] = $this->table->generate($rows);


		$this->data['pagebody'] = 'Welcome';
		$this->render();
	}
}
