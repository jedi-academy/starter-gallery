<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flights extends CI_Model
{
	var $data = array(
        '1'	 => array(
            'id' => 'RI2343',
            'fleet_id' => 'REWQ2432',
            'departure_airport_id'=> 'XQU',
            'departure_time' =>'09:30',
            'arrival_airport_id'=> 'YAA',
            'arrival_time' =>'10:30'
        ),
        '2'	 => array(
            'id' => 'RI3847',
            'fleet_id' => 'REVC4332',
            'departure_airport_id'=> 'YAL',
            'departure_time' =>'10:30',
            'arrival_airport_id'=> 'YAZ',
            'arrival_time' =>'13:30'
        ),
        '3'	 => array(
            'id' => 'RI4385',
            'fleet_id' => 'REWQ5342',
            'departure_airport_id'=> 'YVR',
            'departure_time' =>'13:30',
            'arrival_airport_id'=> 'YBD',
            'arrival_time' =>'17:30'
        ),
        '4'	 => array(
            'id' => 'RI7432',
            'fleet_id' => 'REOM3239',
            'departure_airport_id'=> 'YVR',
            'departure_time' =>'15:30',
            'arrival_airport_id'=> 'YBL',
            'arrival_time' =>'19:30'
        ),
	);
	// Constructor
	public function __construct()
	{
		parent::__construct();
		// inject each "record" key into the record itself, for ease of presentation
		foreach ($this->data as $key => $record)
		{
			$record['key'] = $key;
			$this->data[$key] = $record;
		}
	}
	// retrieve a single quote, null if not found
	public function get($which)
	{
		return !isset($this->data[$which]) ? null : $this->data[$which];
	}
	// retrieve all of the quotes
	public function all()
	{
		return $this->data;
	}

    public function count()
    {
        return count($this->data);
    }
}
