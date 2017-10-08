<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FlightsController extends Application 
{
    /**
    *The FlightsController controller is used to load Flights view, get table data from 
    *Flights model, and display the Flights page
    */

    function __construct()
    {
        parent::__construct();
    }

    /**
    * connect flight view and load all of flughts infomation for model
    */

    function index()
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

    /**
    * when click one of the flight, the detail infomation will shows up.
    */
    function show_flights($id) 
    {
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
