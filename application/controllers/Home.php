<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Application
{
    function __construct()
    {
        parent::__construct();
    }

    
    /**
    *The home controller is used to load home view
    *and display the home page
    */
    function index() 
    {
        $this->data['pagebody'] = 'home';
        $this->data['title'] = 'Raven Airline';
        $this->data['fleet_count'] = $this->fleet->count();
        $this->data['flight_count'] = $this->flights->count();

        $this->render();

    }
}
