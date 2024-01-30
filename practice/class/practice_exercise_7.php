<?php

class Shape
{
    public function shapeMethod()
    {
        echo "This method comes from SHAPE class";
    }
}

class Circle extends Shape
{
    public $radius;
    const PI = 3.14;

    public function calculateArea()
    {
        return self::PI * pow($this->radius, 2);
    }

    public function calculatePerimeter()
    {
        return 2 * self::PI * $this->radius;
    }
}

class Rectangle extends Shape
{
    public $length, $width;

    public function calculateArea()
    {
        return $this->length * $this->width;
    }

    public function calculatePerimeter()
    {
        return 2 * ($this->length + $this->width);
    }
}

$circle = new Circle();
$circle->radius = 5;

$rectangle = new Rectangle();
$rectangle->length = 4;
$rectangle->width = 6;

echo "Circle Area: " . $circle->calculateArea() . "<br><br>";
echo "Circle Perimeter: " . $circle->calculatePerimeter() . "<br><br>";

echo "Rectangle Area: " . $rectangle->calculateArea() . "<br><br>";
echo "Rectangle Perimeter: " . $rectangle->calculatePerimeter() . "<br><br>";
