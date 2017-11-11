<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flights extends CSV_Model
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(APPPATH . '../data/flights.csv', 'id');
    }

    // TODO: add validation rules here !!!
}
