<?php

use PHPUnit\Framework\TestCase;
class BusinessRulesTest extends TestCase
{
    private $CI;

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

    public function budgetLimitProvider()
    {
        $data = json_decode(file_get_contents("data/business_rule_budget_limit.json"),true);
        $testData = array();
        $testData[$data['case']] = array_slice($data, 1);
        return $testData;
    }

}
