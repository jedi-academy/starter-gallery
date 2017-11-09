<?php

use PHPUnit\Framework\TestCase;
class BusinessRulesTest extends TestCase
{
    private $CI;
    const DAY = "2017-01-01";
    const SECONDS_IN_MINUTE = 60;

    public function setUp()
    {
        $this->CI = &get_instance(); 
    }
    /**
     * @dataProvider budgetLimitProvider
     */
    public function testBudgetLimit($bugetLimit, $expected)
    {
        $fleet = $this->CI->fleet->all();
        $total = 0;

        foreach ($fleet as $plane)
        {
            $total += $plane->price;
        }

        $this->assertEquals($expected, $total <= $bugetLimit);
    }

    /**
     * @dataProvider departureTimeLimitProvider
     */
    public function testDepartureTimeLimit($departureTimeLimit, $expected)
    {
        $timeLimit = strtotime(self::DAY . $departureTimeLimit); 
        $flights = $this->CI->flights->all();
        foreach ($flights as $flight) 
        {
            $departureTime = strtotime(self::DAY . $flight->departure_time);
            $this->assertEquals($expected, $departureTime >= $timeLimit);
        }
    }

    /**
     * @dataProvider arrivalTimeLimitProvider
     */
    public function testArrivalTimeLimit($arrivalTimeLimit, $expected)
    {
        $timeLimit = strtotime(self::DAY . $arrivalTimeLimit); 
        $flights = $this->CI->flights->all();
        foreach ($flights as $flight) 
        {
            $arrivalTime = strtotime(self::DAY . $flight->arrival_time);
            $this->assertEquals($expected, $arrivalTime <= $timeLimit);
        }
    }

    /**
     * @dataProvider flyIntervalLimitProvider
     */
    public function testFlyIntervalLimit($intervalLimit, $expected)
    {
        $flights = $this->CI->flights->all();
        usort($flights, "cmp_fleet");
        for ($i = 1; $i < sizeof($flights); ++$i)
        {
            $current = $flights[$i];
            $previous = $flights[$i - 1];
            if ($current->fleet_id == $previous->fleet_id)
            {
               $departureTime = strtotime(self::DAY . $current->departure_time);
               $previousArrivalTime = strtotime(self::DAY . $previous->arrival_time);
               $interval = $departureTime - $previousArrivalTime;
               $this->assertEquals($expected, $interval >= $intervalLimit * self::SECONDS_IN_MINUTE);
            }
        } 
    }
    
    /**
     * Data provider for testing budget limit
     */
    public function budgetLimitProvider()
    {
        $data = json_decode(file_get_contents("data/business_rules/budget_limit.json"),true);
        $testData = array();
        $testData[$data['case']] = array_slice($data, 1);
        return $testData;
    }

    /**
     * Data provider for departure time limit 
     */
    public function departureTimeLimitProvider()
    {
        $data = json_decode(file_get_contents("data/business_rules/departure_time_limit.json"),true);
        $testData = array();
        $testData[$data['case']] = array_slice($data, 1);
        return $testData;
    }

    /**
     * Data provider for arrival time limit 
     */
    public function arrivalTimeLimitProvider()
    {
        $data = json_decode(file_get_contents("data/business_rules/arrival_time_limit.json"),true);
        $testData = array();
        $testData[$data['case']] = array_slice($data, 1);
        return $testData;
    }
    
    /**
     * Data provider for fly interval limit 
     */
    public function flyIntervalLimitProvider()
    {
        $data = json_decode(file_get_contents("data/business_rules/fly_interval_limit.json"),true);
        $testData = array();
        $testData[$data['case']] = array_slice($data, 1);
        return $testData;
    }
}

/* A function for usort the flights */
function cmp_fleet($a, $b)
{
    $cmpFleetId = strcmp($a->fleet_id, $b->fleet_id);

    if ($cmpFleetId == 0)
    {
        return strcmp($a->departure_time, $b->departure_time);
    } 
    return $cmpFleetId;
}
