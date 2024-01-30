<?php

class Calculator
{
    public function add($a, $b)
    {
        return $a + $b;
    }

    public function subtract($a, $b)
    {
        return $a - $b;
    }

    public function multiply($a, $b)
    {
        return $a * $b;
    }

    public function divide($a, $b)
    {
        if ($b != 0) {
            return $a / $b;
        } else {
            return "Cannot divide by zero";
        }
    }
}

$calculator = new Calculator();
echo $calculator->add(10, 20);
echo $calculator->subtract(10, 20);
echo $calculator->multiply(10, 20);
echo $calculator->divide(10, 20);
echo $calculator->divide(10, 0);
