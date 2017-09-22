<?php

class Gallery extends Application
{

  public function index()
  {
    $pix = $this->images->all();

    foreach($pix as $picture){
      $cells[] = $this->parser->parse('_cell', (array) $picture, true);
    }

    $this->load->library('table');

    $parms = array(
      'table_open' => '<table class="gallery">',
      'cell_start' => '<td class="oneimage">',
      'cell_alt_start' => '<td class="oneimage">'
    );
    $this->table->set_template($parms);

    $rows = $this->table->make_columns($cells, 3);
    $this->data['thetable'] = $this->table->generate($rows);

    $this->data['pagebody'] = 'gallery';
    $this->render();
  }

}
