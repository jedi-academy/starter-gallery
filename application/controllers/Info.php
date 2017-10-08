<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends  Application
{

    function __construct()
    {
        parent::__construct();
    }

    /**
    * convert fleet infomation to json formate
    */
    function fleet()
    {
        $airplanes = $this->fleet->all();
        echo json_encode($airplanes); 
    }

    /**
    * Show fleet infomation as json formate
    */
    function show_fleet($id) {
        $plane = $this->fleet->getPlane($id);     
        echo json_encode($plane);
    }

    /**
    * convert flight infomation to json formate
    */
    function flights()
    {
        $flights = $this->flights->all();
        echo json_encode($flights);
    }

    /**
    * Show flight infomation as json formate
    */
    function show_flight($id) {
        $flight = $this->flights->getFlight($id);
        echo json_encode($flight);
    }

}

