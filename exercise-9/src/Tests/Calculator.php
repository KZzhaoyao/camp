<?php
// namespace ZhaoYao\UserSystem\Tests;

class Calculator
{
    public function add($number1, $number2)
    {
        if (!is_numeric($number1)||!is_numeric($number2)) {
            throw new Exception("111111111"); 
        }
        $result = $number1 + $number2;

        return $result;
    }
}