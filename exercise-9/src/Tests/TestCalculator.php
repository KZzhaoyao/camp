<?php

// use ZhaoYao\UserSystem\Tests\Calculator;

include 'Calculator.php';
class TestCalculator extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $calculator = new Calculator();

        $result = $calculator->add(3, 3);

        $this->assertEquals(6, $result);
    }

    /**
    *@expectedException Exception
    */
    public function testAddException()
    {
        $calculator = new Calculator();
        $result = $calculator->add('a',1);
        $this->assertEquals(3,$result);
    }
}