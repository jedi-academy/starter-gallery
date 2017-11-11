<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Airports extends CSV_Model
{            
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(APPPATH . '../data/airports.csv', 'id');
    }
}
