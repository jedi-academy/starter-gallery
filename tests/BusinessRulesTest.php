<?php

use PHPUnit\Framework\TestCase;
class BusinessRulesTest extends TestCase
{
    private $CI;
    const DAY = "2017-01-01";

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
            $total += $plane['price'];
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
        foreach ($flights as $flight) {
            $departureTime = strtotime(self::DAY . $flight['departure_time']);
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
        foreach ($flights as $flight) {
            $arrivalTime = strtotime(self::DAY . $flight['arrival_time']);
            $this->assertEquals($expected, $arrivalTime <= $timeLimit);
        }
    }
    
    /**
     * Data provider for testing budget limit
     */
    public function budgetLimitProvider()
    {
        $data = json_decode(file_get_contents("data/business_rule_budget_limit.json"),true);
        $testData = array();
        $testData[$data['case']] = array_slice($data, 1);
        return $testData;
    }

    /**
     * Data provider for departure time limit 
     */
    public function departureTimeLimitProvider()
    {
        $data = json_decode(file_get_contents("data/business_rule_departure_time_limit.json"),true);
        $testData = array();
        $testData[$data['case']] = array_slice($data, 1);
        return $testData;
    }

    /**
     * Data provider for arrival time limit 
     */
    public function arrivalTimeLimitProvider()
    {
        $data = json_decode(file_get_contents("data/business_rule_arrival_time_limit.json"),true);
        $testData = array();
        $testData[$data['case']] = array_slice($data, 1);
        return $testData;
    }
}
