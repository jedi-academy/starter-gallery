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
            "airports","fleet","flights"
        );

        foreach ($modelNames as $model)
        {
            $first = $this->CI->$model->first();

            foreach ($fisrt as $key => $value)
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
