<?php
use PHPUnit\Framework\TestCase;

class ExportCsvTest extends TestCase
{
    private $CI;
    public function setUp()
    {
        $this->CI=&get_instance();
    }

    public function testEchoAirportCsv()
    {
        $modelNames=array(
            "airports","fleets","flights"
        );


        echo "\n";
        foreach ($modelNames as $model)
        {
            echo $model . ":\n";
            $first = $this->CI->$model->first();

            foreach ($first as $key => $value)
                echo $key . ",";
            echo "\n";
            
            $objects = $this->CI->$model->all();
            foreach ($objects as $object) 
            {
                foreach ($object as $key => $value)
                {
                    echo "\"" .  $value . "\"" . ",";
                }
                echo "\n";
            }
            echo "\n";
        }
        $this->assertTrue(true, 3>2);
    }
} 
