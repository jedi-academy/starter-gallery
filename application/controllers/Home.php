<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Application
{
    function index() 
    {
        $this->data['pagebody'] = 'home';
        $this->data['title'] = 'Raven Airline';
        $this->data['fleet_count'] = $this->fleet->count();
        $this->data['flight_count'] = $this->flights->count();

        $this->render();

    }
}
