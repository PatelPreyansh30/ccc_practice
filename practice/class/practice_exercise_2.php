<?php
class Student
{
    public $name;
    public $age;
    public $grade;

    public function displayInfo()
    {
        echo "Name: $this->name, Age: $this->age, Grade: $this->grade";
    }
}

$student = new Student();
$student->name = "Preyansh";
$student->age = 21;
$student->grade = "O";
$student->displayInfo();
