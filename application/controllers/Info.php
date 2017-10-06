<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends  Application
{

    function __construct()
    {
        parent::__construct();
    }

    function fleet()
    {
        $this->data['title'] = 'Raven Air Fleet';
        $this->data['pagebody'] = 'fleet';
        $airplanes = $this->fleet->all();

        $this->load->library('table');

        $this->table->set_heading('Fleet ID', 'Plane ID');
        foreach($airplanes as $airplane) 
        {
            $link_data = array(
                'display' => $airplane['id'],
                'url' => '/info/fleet/'. $airplane['id']
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
        echo $id;
    }

    function flights()
    {
        $this->data['title'] = 'Raven Air Fleet';
        $this->data['pagebody'] = 'flights';
        $flights = $this->flights->all();

        $this->load->library('table');

        $this->table->set_heading('Flight ID', 'Fleet', 'Departure Airport', 'Departure time', 'Arrival Airport', 'Arrivaltime');
        foreach($flights as $flight) 
        {
            $link_data = array(
                'display' => $flight['id'],
                'url' => '/info/flight/'. $flight['id']
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

    function show_flight($id) {
        echo $id;
    }

}

