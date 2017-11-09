<?php
class Fleet extends CI_Model
{
    
    var $data = array
        (
            '1' => array(
                "id" => "pc12ng",
                "plane_id" => "Pilatus",
                "model" => "PC-12 NG",
                "price" => "3300",
                "seats" => "9",
                "reach" => "4147",
                "cruise" => "500",
                "takeoff" => "450",
                "hourly" => "727"
            ),
            '2' => array
            (
                "id" => "mustang",
                "plane_id" => "Cessna",
                "model" => "Citation Mustang",
                "price" => "2770",
                "seats" => "4",
                "reach" => "2130",
                "cruise" => "630",
                "takeoff" => "950",
                "hourly" => "1015"
            ),
            '3' => array
            (
                "id" => "baron",
                "plane_id" => "Beechcraft",
                "model" => "Baron",
                "price" => "1350",
                "seats" => "4",
                "reach" => "1948",
                "cruise" => "373",
                "takeoff" => "701",
                "hourly" => "340"
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
