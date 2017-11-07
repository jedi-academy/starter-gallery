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
            $objects = $this->CI->$model->all();
            $first = $objects[1];
            //var_dump($first);
            echo "\n";
            foreach ($first as $key => $value)
            {
                echo $key . ","; 
            }
            echo "\n";

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
