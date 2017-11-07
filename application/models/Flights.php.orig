<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flights extends CI_Model
{
    private static $uid = 0;
    var $data = array(
    '1'	 => array(
        'id' => 'RI183',
        'fleet_id' => 'baron',
        'departure_airport_id'=> 'YXS',
        'departure_time' =>'09:30',
        'arrival_airport_id'=> 'YPR',
        'arrival_time' =>'10:30'
    ),
    '2'	 => array(
        'id' => 'RI189',
        'fleet_id' => 'baron',
        'departure_airport_id'=> 'YPR',
        'departure_time' =>'13:30',
        'arrival_airport_id'=> 'YDQ',
        'arrival_time' =>'15:00'
    ),
    '3'	 => array(
        'id' => 'RI196',
        'fleet_id' => 'baron',
        'departure_airport_id'=> 'YDQ',
        'departure_time' =>'16:15',
        'arrival_airport_id'=> 'YXS',
        'arrival_time' =>'17:30'
    ),
    '4'	 => array(
        'id' => 'RI248',
        'fleet_id' => 'mustang',
        'departure_airport_id'=> 'YXS',
        'departure_time' =>'11:00',
        'arrival_airport_id'=> 'YDQ',
        'arrival_time' =>'12:15'
    ),
    '5'	 => array(
        'id' => 'RI257',
        'fleet_id' => 'mustang',
        'departure_airport_id'=> 'YDQ',
        'departure_time' =>'13:00',
        'arrival_airport_id'=> 'YVR',
        'arrival_time' =>'15:00'
    ),
    '6'	 => array(
        'id' => 'RI289',
        'fleet_id' => 'mustang',
        'departure_airport_id'=> 'YVR',
        'departure_time' =>'17:30',
        'arrival_airport_id'=> 'YXS',
        'arrival_time' =>'18:55'
    ),
    '7'	 => array(
        'id' => 'RI315',
        'fleet_id' => 'pc12ng',
        'departure_airport_id'=> 'YXS',
        'departure_time' =>'08:00',
        'arrival_airport_id'=> 'YVR',
        'arrival_time' =>'09:25'
    ),
    '8'	 => array(
        'id' => 'RI329',
        'fleet_id' => 'pc12ng',
        'departure_airport_id'=> 'YVR',
        'departure_time' =>'11:30',
        'arrival_airport_id'=> 'YPR',
        'arrival_time' =>'12:45'
    ),
    '9'	 => array(
        'id' => 'RI333',
        'fleet_id' => 'pc12ng',
        'departure_airport_id'=> 'YPR',
        'departure_time' =>'13:30',
        'arrival_airport_id'=> 'YDQ',
        'arrival_time' =>'15:00'
    ),
    '10' => array(
        'id' => 'RI392',
        'fleet_id' => 'pc12ng',
        'departure_airport_id'=> 'YDQ',
        'departure_time' =>'19:30',
        'arrival_airport_id'=> 'YXS',
        'arrival_time' =>'20:45'
    ),
    '11' => array(
        'id' => 'RI408',
        'fleet_id' => 'REOM3239',
        'departure_airport_id'=> 'YXS',
        'departure_time' =>'14:00',
        'arrival_airport_id'=> 'YPR',
        'arrival_time' =>'15:00'
    ),
    '12' => array(
        'id' => 'RI473',
        'fleet_id' => 'REOM3239',
        'departure_airport_id'=> 'YPR',
        'departure_time' =>'20:30',
        'arrival_airport_id'=> 'YXS',
        'arrival_time' =>'21:30'
    )
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
    public function getFlight($id) {
       foreach($this->data  as $flight) {
            if ($flight['id'] == $id) {
                return $flight;
            }            
        }
        return null;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //***WORK IN PROGRESS***///
    private function flightBuilder($origin, $dest, $fleet, $startTime) {

        $flight = array(
            'id' => 'RICUST' . $uid,
            'fleet_id' => $fleet['id'],
            'departure_airport_id'=> $origin,
            'departure_time' =>'09:30',
            'arrival_airport_id'=> $dest,
            'arrival_time' =>'10:30'
        );
        $uid++; 
        
        
    }
}
