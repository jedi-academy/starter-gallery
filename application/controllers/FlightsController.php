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
    * connect flight view and load all of flights information for model
    */

    function index()
    {
        // This is the view we want shown
        $this->data['title'] = 'Raven Air Flights';
        $this->data['pagebody'] = 'flights';
        
        // Building the list of flights to pass to our view
        $flights = $this->flights->all();
        
        
        $this->load->library('table');
        $this->table->set_heading('Flight ID', 'Fleet',	'Departure Airport', 'Departure Time', 'Arrival Airport', 'Arrival Time');
        
        
        foreach($flights as $flight) 
        {
            $link_data = array(
                'display' => $flight['id'],
                'title' => "Fleet ID: "
                            . $flight['fleet_id']
                            . "&#013;Departure Airport: "
                            . $flight['departure_airport_id']
                            . "&#013;Departure Time: "
                            . $flight['departure_time']
                            . "&#013;Arrival Airport: "
                            . $flight['arrival_airport_id']
                            . "&#013;Arrival Time: "
                            . $flight['arrival_time'],
                'url' => '/flights/'. $flight['id']
            );
           
            $link = $this->parser->parse('template/_mouseover', $link_data, true);
            $this->table->add_row($link, $flight['fleet_id'], $flight['departure_airport_id'], $flight['departure_time'], $flight['arrival_airport_id'], $flight['arrival_time']);
        }
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="table">'
        );
        $this->table->set_template($template);
        $this->data['thetable'] = $this->table->generate();
        
        $this->data['jsonbutton'] = '<a class="btn btn-default" href="/info/flights" target="_blank"> Show JSON </a>';
        
        $this->render();
        
        
        
       
        
    }

    /**
    * when click one of the flight, the detail information will shows up.
    */
    function show_flights($id) 
    {
        // Geting the particular flight's details to pass to our view
        $flight = $this->flights->getFlight($id);
        
        //This is the view we want shown
        $this->data['title'] = 'Raven Air Flight: ' . $flight['id'];
        $this->data['pagebody'] = 'flights';

        $this->load->library('table');  
        
       foreach($flight as $key=>$value) 
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
        $this->data['jsonbutton'] = '<a class="btn btn-default" href="/info/flights/' . $id . '" target="_blank"> Show JSON </a>';
        $this->render();
        
    }
}
