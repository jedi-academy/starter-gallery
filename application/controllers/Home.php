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
        $role = $this->session->userdata('userrole');
        $this->data['title'] = 'Raven Airline ('. ($role == '' ? ROLE_GUEST : $role) . ')';
        $this->data['fleet_count'] = $this->fleets->size();
        $this->data['flight_count'] = $this->flights->size();
        $this->data['airport_count'] = $this->airports->size();
        
        $airports = $this->airports->toArray();
        $airport_list = '';
        $counter = 0;
        foreach($airports as $port) 
        {  if($port['id'] == "YXS")
           $airport_list = $airport_list . '<b>'.$port['id'] . 
                " - Base Airport" .'</b><br>';
            else 
                $airport_list = $airport_list . $port['id'] . 
                    " - Destination " .$counter.'<br>';
            $counter++;
        }
         $this->data['airport_list'] = $airport_list;
        
        $this->render();
    }
    
    function show_404(){
        $this->load->view("/errors/cli/error_404");
    }
}
