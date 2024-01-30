<?php

class Employee
{
    public $name;
    public $position;
    public $salary;

    public function __construct($name, $position, $salary)
    {
        $this->name = $name;
        $this->position = $position;
        $this->salary = $salary;
    }

    public function calculateYearlyBonus()
    {
        return $this->salary * 0.1;
    }
}

$employee = new Employee("Alice", "Manager", 50000);

echo $employee->calculateYearlyBonus();
