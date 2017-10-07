<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Application {
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->data['title'] = 'About Raven Airline';
        $this->data['pagebody'] = 'about'; 
        $this->render();
    }
}
