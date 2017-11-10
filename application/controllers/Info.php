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
        $airplanes = $this->fleets->toArray();
        echo json_encode($airplanes); 
    }

    /**
    * Show fleet infomation as json formate
    */
    function show_fleet($id) {
        $plane = $this->fleets->get($id);     
        echo json_encode($plane);
    }

    /**
    * convert flight infomation to json formate
    */
    function flights()
    {
        $flights = $this->flights->toArray();
        echo json_encode($flights);
    }

    /**
    * Show flight infomation as json formate
    */
    function show_flight($id) {
        $flight = $this->flights->get($id);
        echo json_encode($flight);
    }

}

