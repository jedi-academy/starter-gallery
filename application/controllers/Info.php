<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends  Application
{

    function __construct()
    {
        parent::__construct();
    }

    function fleet()
    {
        $airplanes = $this->fleet->all();
        echo json_encode($airplanes); 
    }

    function show_fleet($id) {
        $plane = $this->fleet->getPlane($id);     
        echo json_encode($plane);
    }

    function flights()
    {
        $flights = $this->flights->all();
        echo json_encode($flights);
    }
    function show_flight($id) {
        $flight = $this->flights->getFlight($id);
        echo json_encode($flight);
    }

}

