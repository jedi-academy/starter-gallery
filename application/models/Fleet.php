<?php
class Fleet extends CI_Model
{
    var $data = array
        (
            '1' => array(
                'id' => 'REWQ2432',
                'plane_id' => 'avanti'
            ),
            '2' => array
            (
                'id' => 'REVC4332',
                'plane_id' => 'baron'
            ),
            '3' => array
            (
                'id' => 'REBD6332',
                'plane_id' => 'pc12ng'
            ),
            '4' => array
            (
                'id' => 'REOM3239',
                'plane_id' => 'caravan'
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

}
