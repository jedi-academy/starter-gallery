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
        $airports = $this->CI->airports->all();
        $first = $airports[1];
        //var_dump($first);
        echo "\n";
        foreach ($first as $key => $value)
        {
            echo $key . ","; 
        }
        echo "\n";


        foreach ($airports as $airport) 
        {
            foreach ($airport as $key => $value)
            {
                echo "\"" .  $value . "\"" . ",";
            }
            echo "\n";
        }
        $this->assertTrue(true, 3>2);
    }
} 
