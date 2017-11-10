<?php
class Fleets extends CSV_Model 
{
    /**
     * Constructor
     */ 
    public function __construct()
    {
        parent::__construct(APPPATH . '../data/fleets.csv', 'id');
    }

    /** 
     * provide form validation rules
     */
    public function rules()
    {
        $config = array(
            ['field' => 'id', 'label' => 'Fleet Id', 'rules' => 'required|alpha_numeric_spaces|max_length[64]'],
            ['field' => 'plane_id', 'label' => 'Plane Id', 'rules' => 'required|alpha_numeric_spaces|max_length[64]'],
            ['field' => 'manufacturer', 'label' => 'Manufacturer', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
            ['field' => 'model', 'label' => 'Model', 'rules' => 'max_length[64]'],
            ['field' => 'price', 'label' => 'Price', 'rules' => 'numeric'],
            ['field' => 'seats', 'label' => 'Seats', 'rules' => 'integer'],
            ['field' => 'reach', 'label' => 'Reach', 'rules' => 'numeric'],
            ['field' => 'cruise', 'label' => 'Cruise', 'rules' => 'numeric'],
            ['field' => 'takeoff', 'label' => 'Takeoff', 'rules' => 'numeric'],
            ['field' => 'hourly', 'label' => 'Hourly', 'rules' => 'numeric'],
        );
        return $config;
    }
}
