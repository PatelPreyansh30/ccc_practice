<?php

class Point
{
    public $x;
    public $y;

    public function calculateDistance(Point $other)
    {
        return (pow($this->x - $other->x, 2) + pow($this->y - $other->y, 2));
    }
}

$point1 = new Point();
$point1->x = 1;
$point1->y = 2;

$point2 = new Point();
$point2->x = 4;
$point2->y = 6;

echo $point2->calculateDistance($point1);
