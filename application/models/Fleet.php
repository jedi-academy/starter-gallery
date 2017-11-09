<?php
class Fleet extends CSV_Model 
{
    

    /*
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

     */
    // Constructor
    public function __construct()
    {
        /*
        parent::__construct();
        // inject each "record" key into the record itself, for ease of presentation
        foreach ($this->data as $key => $record)
        {
            $record['key'] = $key;
            $this->data[$key] = $record;
        }
         */
        parent::__construct(APPPATH . '../data/fleet.csv', 'id');
    }

   /* public function add($fleet)
    {
        
       array_push($this->data, $fleet);
        // inject each "record" key into the record itself, for ease of presentation
        foreach ($this->data as $key => $record)
        {
            $record['key'] = $key;
            $this->data[$key] = $record;
        }
    }
    */
    /*
    public function update($fleet)
    {
        $found = 0;
        foreach($this->data  as $datafleet) {
            if ($datafleet['id'] == $fleet['id']) {
                $datafleet = $fleet;
                $found = 1;
            }
        }
        if (found == 0) {
            add($fleet);
        }
    }
    */
    // provide form validation rules
    public function rules()
    {
        $config = array(
            ['field' => 'id', 'label' => 'Fleet Id', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
            ['field' => 'plane_id', 'label' => 'Plane Id', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
            ['field' => 'model', 'label' => 'Model', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
            ['field' => 'price', 'label' => 'Price', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
            ['field' => 'seats', 'label' => 'Seats', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
            ['field' => 'reach', 'label' => 'Reach', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
            ['field' => 'cruise', 'label' => 'Cruise', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
            ['field' => 'takeoff', 'label' => 'Takeoff', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
            ['field' => 'hourly', 'label' => 'Hourly', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
        );
        return $config;
    }
    
    
    
    
    

    /*
    // retrieve a single quote, null if not found
    public function get($which)
    {
        return !isset($this->data[$which]) ? null : $this->data[$which];
    }
     */
    
    
    public function getFleet($id) {
       foreach($this->allAsArray()  as $fleet) {
            if ($fleet['id'] == $id) {
                return $fleet;
            }
        }
        return null;
    }
    
    
    
    // retrieve all of the quotes
    
    public function allAsArray()
    {
        $fleetArray = array();
        foreach ($this->all() as $plane)
           $fleetArray[$plane->id] = (array)$plane;
        return $fleetArray;
    }
    


    /**
     * This function is not needed, use size() instead
     */
    public function count()
    {
        //return count($this->data);
        return $this->size();
    }

}
