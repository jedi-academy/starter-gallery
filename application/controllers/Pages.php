<?php
/*
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Application {
    function __construct()
    {
        parent::__construct();
    }

    function view($page='home'){
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $this->data['title'] = $page;
        $this->data['pagebody'] =$page; 
        $this->render();
    }

    function fleet() {
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

    function flights(){
        $this->data['title'] = 'Raven Air Fleet';
        $this->data['pagebody'] = 'flights';
        $flights = $this->flights->all();
        $this->load->library('table');

        $this->table->set_heading('Flight ID', 'Fleet', 'Departure Airport', 'Departure time', 'Arrival Airport', 'Arrivaltime');
        foreach($flights as $flight) 
        {
            $link_data = array(
                'display' => $flight['id'],
                'url' => '/flights/'. $flight['id']
            );
            $flight_link = $this->parser->parse('template/_link', $link_data, true);
            $this->table->add_row(
                $flight_link,
                $flight['fleet_id'],
                $flight['departure_airport_id'], 
                $flight['departure_time'],
                $flight['arrival_airport_id'],
                $flight['arrival_time']);
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
    
    function show_flights($id) {
        $flight = $this->flights->getFlight($id);
        
        $this->data['title'] = 'Raven Air Flight: ' . $flight['id'];
        $this->data['pagebody'] = 'flights';

        $this->load->library('table');
        
        foreach($flight as $key=>$value) 
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
 */
