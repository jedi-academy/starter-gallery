<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Application
{
    /**
    *The About controller is used to load about view
    *and display the about page
    */
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $role = $this->session->userdata('userrole');
        $this->data['title'] = 'About Raven Airline ('. $role . ')';
        $this->data['pagebody'] = 'about'; 
        $this->render();
    }
}
