<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FleetController extends Application 
{
    /**
    *The FleetController controller is used to load Fleet view, get table data from 
    *Fleet model, and display the Fleet page
    */
    function __construct()
    {
        parent::__construct();
    }

    /**
    * connect fleet view and load all of fleet infomation for model
    */
    function index() 
    {
        $role = $this->session->userdata('userrole');
        $this->data['title'] = 'Raven Air Fleet ('. $role . ')';
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
        $this->data['jsonbutton'] = '<a class="btn btn-default" href="/info/fleet" target="_blank"> Show JSON </a>';
        $this->render();
    }

    /**
    * when click one of the fleet, the detail infomation will shows up.
    */
    function show_fleet($id) 
    {
        $plane = $this->fleet->getPlane($id);
        
        $this->data['title'] = 'Raven Air Fleet: ' . $plane['id'];
        $this->data['pagebody'] = 'fleet';

        $this->load->library('table');
        
        foreach($plane as $key=>$value) 
        {  
            $key = str_replace("_"," ",$key);
            if ($key != 'key'){ // Avoid adding the key name 'key' as a row...
                $this->table->add_row(ucwords($key), $value);
            }
        }
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="table">'
        );
        $this->table->set_template($template);
        $this->data['thetable'] = $this->table->generate();
        $this->data['jsonbutton'] = '<a class="btn btn-default" href="/info/fleet/' . $id . '" target="_blank"> Show JSON </a>';
        $this->render();

    }
}
