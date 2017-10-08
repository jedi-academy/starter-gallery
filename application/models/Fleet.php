<?php
class Fleet extends CI_Model
{
    
    var $data = array
        (
            '1' => array(
                'id' => 'REWQ2432',
                'plane_id' => 'avanti',    
                "manufacturer" => "Piaggo",
                "model" => "Avanti II",
                "price" => "7195",
                "seats" => "8",
                "reach" => "2797",
                "cruise" => "589",
                "takeoff" => "994",
                "hourly" => "977"
            ),
            '2' => array
            (
                'id' => 'REVC4332',
                'plane_id' => 'baron',
                "manufacturer" => "Beechcraft",
                "model" => "Baron",
                "price" => "1350",
                "seats" => "4",
                "reach" => "1948",
                "cruise" => "373",
                "takeoff" => "701",
                "hourly" => "340"
            ),
            '3' => array
            (
                'id' => 'REBD6332',
                'plane_id' => 'pc12ng',
                "manufacturer" => "Pilatus",
                "model" => "PC-12 NG",
                "price" => "3300",
                "seats" => "9",
                "reach" => "4147",
                "cruise" => "500",
                "takeoff" => "450",
                "hourly" => "727"
            ),
            '4' => array
            (
                'id' => 'REOM3239',
                'plane_id' => 'caravan',
                "manufacturer" => "Cessna",
                "model" => "Grand Caravan EX",
                "price" => "2300",
                "seats" => "14",
                "reach" => "1689",
                "cruise" => "340",
                "takeoff" => "660",
                "hourly" => "389"
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
    public function getPlane($id) {
       foreach($this->data  as $fleet) {
            if ($fleet['id'] == $id) {
                return $fleet;
            }
            
        }
        return null;
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
