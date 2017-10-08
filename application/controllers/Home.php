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
        $this->data['airport_count'] = $this->airports->count();
        
        $airports = $this->airports->all();
        $airport_list = '';
        foreach($airports as $port) 
        {   
           $airport_list = $airport_list . $port['id'] . '<br>';
        }
         $this->data['airport_list'] = $airport_list;
        

        $this->render();

    }
}
