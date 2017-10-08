<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Airports extends CI_Model
{            
    var $data = array(
    '1'	 => array(
        "id" => "YXS",
        "community" => "Prince George",
        "airport" => "Prince George Airport",
        "region" => "7",
        "coordinates" => "53\u00b053\u203203\u2033N122\u00b040\u203239\u2033W",
        "runway" => "3490",
        "airline" => "raven"
    ),
    '2'	 => array(
        'id' => 'YPR',
        "community" => "Prince Rupert",
        "airport" => "Prince Rupert Airport",
        "region" => "6",
        "coordinates" => "54\u00b017\u203210\u2033N130\u00b026\u203241\u2033W",
        "runway" => "1829",
        "airline" => "kite"
    ),
    '3'	 => array(
        'id' => 'YDQ',
        "community" => "Dawson Creek",
        "airport" => "Dawson Creek Airport",
        "region" => "9",
        "coordinates" => "55\u00b044\u203232\u2033N120\u00b010\u203259\u2033W",
        "runway" => "1524",
        "airline" => "eagle"
    ),
    '4'	 => array(
        'id' => 'YVR',
        "community" => "Vancouver",
        "airport" => "Vancouver International Airport",
        "region" => "2",
        "coordinates" => "49\u00b011\u203241\u2033N123\u00b011\u203202\u2033W",
        "runway" => "3505",
        "airline" => "pelican"
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
    
    // retrieve all of the quotes
    public function all()
    {
            return $this->data;
    }

    public function count()
    {
        return count($this->data);
    }
    public function getAirport($id) {
       foreach($this->data  as $airport) {
            if ($airport['id'] == $id) {
                return $airport;
            }            
        }
        return null;
    }
}
