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
        $this->data['title'] = 'Raven Air Fleet';
        $this->data['pagebody'] = 'flights';
        
        // Building the list of flights to pass to our view
        $flights = $this->flights->all();
        
        // pass on the data to present, as the "fligh_table" view parameter
        $this->data['flight_table'] = $flights;
        
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
        $this->data['pagebody'] = 'flightdetails';

        // pass on the data to present, adding the flight details' fields
        $this->data = array_merge($this->data, (array) $flight);
        
        $this->render();
        
    }
}
