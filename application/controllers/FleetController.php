<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FleetController extends Application {

    function __construct()
    {
        parent::__construct();
    }

    function index() {
        $this->data['title'] = 'Raven Air Fleet';
        $this->data['pagebody'] = 'fleet';
        $airplanes = $this->fleet->all();
        $this->load->library('table');

        $this->table->set_heading('Fleet ID', 'Plane ID');
        foreach($airplanes as $airplane) 
        {
            $link_data = array(
                'display' => $airplane['id'],
                'url' => '/fleet/'. $airplane['id']
            );
            $link = $this->parser->parse('template/_link', $link_data, true);
            $this->table->add_row($link, $airplane['plane_id']);
        }
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="table">'
        );
        $this->table->set_template($template);
        $this->data['thetable'] = $this->table->generate();
        $this->render();
    }

    function show_fleet($id) {
        $plane = $this->fleet->getPlane($id);
        
        $this->data['title'] = 'Raven Air Fleet: ' . $plane['id'];
        $this->data['pagebody'] = 'fleet';

        $this->load->library('table');
        
        foreach($plane as $key=>$value) 
        {  
            if ($key != 'key'){ // Avoid adding the key name 'key' as a row...
                $this->table->add_row($key, $value);
            }
        }
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="table">'
        );
        $this->table->set_template($template);
        $this->data['thetable'] = $this->table->generate();
        $this->render();

    }
}
